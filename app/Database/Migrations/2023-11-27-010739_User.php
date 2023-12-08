<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id"=>[
                "type"=> "int",
                "auto_increment"=> true,
                "null"=> true,
            ],
            "username"=>[
                "type"=> "varchar",
                "constraint"=> 50,
                "null"=> true,
            ],
            "password"=>[
                "type"=> "varchar",
                "constraint"=> 50,
                "null"=> true,
            ],
            "nama"=>[
                "type"=> "varchar",
                "constraint"=> 50,
                "null"=> true,
            ],
            "level"=>[
                "type"=> "enum",
                "constraint"=> ["admin","writer","member"],
                "default"=> "admin",
            ],
        ]);
        $this->forge->addKey("id");
        $this->forge->createTable("user");
    }

    public function down()
    {
        $this->forge->dropTable("user");
    }
}
