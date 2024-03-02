<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangMasukModel extends Model
{
    protected $table            = 'barang_masuk';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ["id_barang", "qty", "pemasok", "modified"];

    public function getBarangMasuk($id = false){
        if (!$id) {
            $builder = $this->db->table('barang');
            $builder->select('barang.id AS id_barang, barang_masuk.id AS id_transaksi, barang.nama_barang, barang_masuk.qty, barang.harga, barang_masuk.pemasok, barang_masuk.created_at, barang_masuk.modified');
            $builder->join('barang_masuk', 'barang.id = barang_masuk.id_barang');
            $builder->orderBy('barang_masuk.id', 'ASC');
            $query = $builder->get();
            return $query->getResult();
        }
        
        return $this->where('id', $id)->first();
    }
}
