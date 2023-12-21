<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Migration_Produk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'gambar_rumah' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama_rumah' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'perlengkapan_rumah' => [
                'type' => 'TEXT',
            ],
            'harga_rumah' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'nomor_rumah' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('produk');
    }

    public function down()
    {
        $this->forge->dropTable('produk');
    }
}
