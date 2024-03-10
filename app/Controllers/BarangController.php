<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\BarangModel;
use App\Models\BarangMasukModel;
use App\Models\BarangKeluarModel;

class BarangController extends BaseController
{

    protected $userModel;
    protected $barangModel;
    protected $barangMasukModel;
    protected $barangKeluarModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->barangModel = new BarangModel();
        $this->barangMasukModel = new BarangMasukModel();
        $this->barangKeluarModel = new BarangKeluarModel();
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

        $dataAdd = [
            "nama_barang" => $this->request->getVar('nama_barang'),
            "deskripsi" => $this->request->getVar('deskripsi'),
            "harga" => $this->request->getVar('harga_barang'),
            "modified" => session('login')
        ];

        $this->barangModel->save($dataAdd);

        $data = [
            "barang" => $this->barangModel->getBarang()
        ];

        return view('template/tabel_barang', $data);
    }
    
    public function edit($id = false){

        $data = [
            "barang" => $this->barangModel->find($id)
        ];
        
        return view('template/editData', $data);
    }

    public function update($id){
        $dataAdd = [
            "id" => $this->request->getVar("id"),
            "nama_barang" => $this->request->getVar("nama_barang"),
            "deskripsi" => $this->request->getVar("deskripsi"),
            "harga" => $this->request->getVar("harga_barang")
        ];

        $this->barangModel->save($dataAdd);

        $data = [
            "barang" => $this->barangModel->getBarang()
        ];

        return view('template/tabel_barang', $data);
    }

    public function delete($id){
        $namaImg = $this->barangModel->find($id);
        
        $this->barangModel->delete($id);
        $data = [
            "barang" => $this->barangModel->getBarang()
        ];

        return view('template/tabel_barang', $data);
    }

    public function getJumlahBarang($id){
        $data["jumlah"] = $this->barangModel->getJumlahBarang($id);

        return view('template/ajax/inputJumlahBarang', $data);
    }

    public function barangMasuk(){


        $data = [
            'title' => 'Barang Masuk',
            'barang' => $this->barangModel->getBarang(),
            'barangMasuk' => $this->barangMasukModel->getBarangMasuk()
        ];

        return view('barang_masuk', $data);
    }

    public function addBarangMasuk(){
        $dataAdd = [
            "id_barang" => $this->request->getVar('id_barang'),
            "qty" => $this->request->getVar('jumlah'),
            "pemasok" => $this->request->getVar('pemasok'),
            "created_at" => $this->request->getVar('tanggal'),
            "modified" => session('login')
        ];

        $this->barangMasukModel->save($dataAdd);

        $data = [
            "barangMasuk" => $this->barangMasukModel->getBarangMasuk()
        ];

        return view('template/tabel_barangMasuk', $data);
    }

    public function barangKeluar(){

        $data = [
            'title' => 'Barang Keluar'
        ];

        return view('barang_keluar', $data);
    }

    
}
