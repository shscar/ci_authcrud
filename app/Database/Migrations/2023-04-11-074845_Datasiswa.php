<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Datasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nisn' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM("Laki-laki", "Perempuan")',
                'null' => true
            ],
            'kelas' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
            'jurusan' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'no_tlp' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
            'created_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
                'after' => 'created_at',
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('datasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('datasiswa');
    }
}