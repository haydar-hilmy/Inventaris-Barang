<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use PHPUnit\Framework\Constraint\Constraint;

class Barang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_barang' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'deskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'harga' => [
                'type' => 'FLOAT',
                'null' => false,
            ],
            'stok' => [
                'type' => 'FLOAT',
                'null' => false,
            ],
            'modified' => [
                'type' => 'ENUM("superadmin", "admin",  "user")',
                'default' => 'admin',
            ],
            'photo' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME'
            ],
            'updated_at' => [
                'type' => 'DATETIME'
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}
