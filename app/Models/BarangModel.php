<?php

namespace App\Models;

use CodeIgniter\Model;


class BarangModel extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'id';
    protected $useTimestamps = true;
    protected $allowedFields    = [
        'nama_barang', 'deskripsi', 'harga', 'stok', 'modified', 'photo'
    ];

    public function getBarang($id = false)
    {
        if (!$id) {
            $builder = $this->db->table('barang');
            $builder->select('*');
            $builder->select('(harga * stok) AS total_harga');
            $query = $builder->get();
            return $query->getResult();
        }
        return $this->where('id', $id)->first();
    }

    public function getJumlahBarang($id = false){
        if ($id === false) {
            return "id must be included in the parameter";
        } else {
            $builder = $this->db->table('barang');
            $builder->select('stok AS total_barang');
            $builder->where('id', $id);
            $query = $builder->get();
            return $query->getRow()->total_barang;
        }
    }
}
