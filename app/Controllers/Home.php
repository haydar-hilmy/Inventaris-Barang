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

        return view('login', $data);
    }

    public function auth(){
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        $this->userModel->auth($username, $password);
    }

    public function home(): string
    {
        $data = [
            "title" => "Dashboard"
        ];
        return view('dashboard', $data);
    }
}
