<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kontak extends Migration
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
            "email"=>[
                "type"=> "varchar",
                "constraint"=> 50,
                "null"=> true,
            ],
            "subject"=>[
                "type"=> "varchar",
                "constraint"=> 50,
                "null"=> true,
            ],
            "pesan"=>[
                "type"=> "text",
                "constraint"=> 255,
                "null"=> true,
            ],
        ]);
        $this->forge->addKey("id");
        $this->forge->createTable("kontak");
    }

    public function down()
    {
        $this->forge->dropTable("kontak");
    }
}
