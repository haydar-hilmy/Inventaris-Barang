<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'nama_barang', 'deskripsi', 'harga', 'stok', 'modified', 'photo'
    ];

    public function getBarang($id = false){
        if(!$id){
            return $this->findAll();
        }
        return $this->where('id', $id)->first();
    }

}
