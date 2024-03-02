<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangMasuk extends Migration
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
            'id_barang' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
            'qty' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
            'pemasok' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'modified' => [
                'type' => 'ENUM("superadmin", "admin",  "user")',
                'default' => 'admin',
            ],
            'created_at' => [
                'type' => 'DATETIME'
            ],
            'updated_at' => [
                'type' => 'DATETIME'
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('barang_masuk');
    }

    public function down()
    {
        $this->forge->dropTable('barang_masuk');
    }
}
