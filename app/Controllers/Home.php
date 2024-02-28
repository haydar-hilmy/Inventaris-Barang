<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{

    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {

        if (!session('login')) {
            return redirect()->to(site_url('/login'));
        }

        return redirect()->to('/dashboard');
    }

    public function login(){
        $data = [
            "title" => "App - Login"
        ];

        if (session('login')) {
            return redirect()->to(site_url('/dashboard'));
        }

        return view('login', $data);
    }

    public function auth(){
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        $dataUser = $this->userModel->auth($username, $password);

        if(!$dataUser){
            return redirect()->to('/login')->withInput()->with("error", "Username atau Password salah!");
        }

        session()->set('login', true);
        return redirect()->to('/dashboard');
    }

    public function home(): string
    {
        $data = [
            "title" => "Dashboard"
        ];
        return view('dashboard', $data);
    }
}
