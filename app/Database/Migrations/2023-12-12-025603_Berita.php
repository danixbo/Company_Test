<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Berita extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'gambar'     => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'judul'      => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'deskripsi'  => [
                'type' => 'TEXT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('berita');
    }

    public function down()
    {
        $this->forge->dropTable('berita');
    }
}
