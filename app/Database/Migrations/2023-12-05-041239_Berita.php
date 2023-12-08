<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Berita extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id"=>[
                "type"=> "int",
                "auto_increment"=> true,
            ],
            "nama"=>[
                "type"=> "varchar",
                "constraint"=> 50,
                "null"=> true,
            ],
            "gambar"=>[
                "type"=> "varchar",
                "constraint"=> 50,
                "null"=> true,
            ],
            "deskripsi"=>[
                "type"=> "text",
                "null"=> true,
            ],
            "judul"=>[
                "type"=> "text",
                "constraint"=> 50,
                "null"=> true,
            ],
        ]);
        $this->forge->addKey("id");
        $this->forge->createTable("berita");
    }

    public function down()
    {
        $this->forge->dropTable("berita");
    }
}
