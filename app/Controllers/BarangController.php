<?php

namespace App\Controllers;

use App\Models\UserModel;

class BarangController extends BaseController
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

        $data = [
            'title' => "Barang"
        ];

        return view('barang', $data);
    }

    public function barangMasuk(){


        $data = [
            'title' => 'Barang Masuk'
        ];

        return view('barang_masuk', $data);
    }

    public function barangKeluar(){

        $data = [
            'title' => 'Barang Keluar'
        ];

        return view('barang_keluar', $data);
    }

    
}
