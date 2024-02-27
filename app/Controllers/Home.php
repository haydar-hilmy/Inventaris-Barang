<?php

namespace App\Controllers;

class Home extends BaseController
{
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
        return view('index', $data);
    }

    public function home(): string
    {
        $data = [
            "title" => "Dashboard"
        ];
        return view('dashboard', $data);
    }
}
