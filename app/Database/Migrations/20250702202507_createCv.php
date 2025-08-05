<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class CreateCv extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'               => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nombre'           => ['type' => 'VARCHAR', 'constraint' => 100],
            'apellidos'        => ['type' => 'VARCHAR', 'constraint' => 100],
            'pais'             => ['type' => 'VARCHAR', 'constraint' => 100],
            'ciudad_estado'    => ['type' => 'VARCHAR', 'constraint' => 100],
            'domicilio'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'codigo_postal'    => ['type' => 'VARCHAR', 'constraint' => 10, 'null' => true],
            'correo'           => ['type' => 'VARCHAR', 'constraint' => 100],
            'telefono'         => ['type' => 'VARCHAR', 'constraint' => 20],
            'experiencias'     => ['type' => 'TEXT', 'null' => true],
            'educaciones'      => ['type' => 'TEXT', 'null' => true],
            'habilidades'      => ['type' => 'TEXT', 'null' => true],
            'created_at'       => ['type' => 'DATETIME', 'null' => true],
            'updated_at'       => ['type' => 'DATETIME', 'null' => true]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('cv');
    }

    public function down()
    {
        $this->forge->dropTable('cv');
    }
}