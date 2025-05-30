<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class CreateReclutamiento extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nombre'      => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'null'       => true
            ],
            'correo'      => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true
            ],
            'celular'     => [
                'type'       => 'VARCHAR',
                'constraint' => 15,
                'null'       => true
            ],
            'empresa'     => [
                'type'       => 'VARCHAR',
                'constraint' => 60,
                'null'       => true
            ],
            'municipio'   => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true
            ],
            'servicio'    => [
                'type'       => 'VARCHAR',
                'constraint' => 40,
                'null'       => true
            ],
            'adicional'   => [
                'type'       => 'TEXT',
                'null'       => true
            ],
            'fecha'       => [
                'type'       => 'DATE',
                'null'       => true
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('reclutamiento');
    }

    public function down()
    {
        $this->forge->dropTable('reclutamiento');
    }
}