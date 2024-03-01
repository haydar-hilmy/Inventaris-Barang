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
}
