<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\BarangModel;

class BarangController extends BaseController
{

    protected $userModel;
    protected $barangModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->barangModel = new BarangModel();
    }

    public function index()
    {

        if (!session('login')) {
            return redirect()->to(site_url('/login'));
        }

        $getBarang = $this->barangModel;

        $data = [
            'title' => "Barang",
            'barang' => $getBarang->getBarang()
        ];

        return view('barang', $data);
    }

    public function addbarang(){

        $data = [
            "nama_barang" => $this->request->getVar('nama_barang'),
            "deskripsi" => $this->request->getVar('deskripsi'),
            "harga" => $this->request->getVar('harga_barang'),
            "modified" => session('login')
        ];

        $this->barangModel->save($data);

        return redirect()->to('/barang');
    }
    
    public function edit($id = false){

        $data = [
            "barang" => $this->barangModel->find($id)
        ];
        
        return view('template/editData', $data);
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
