<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
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
