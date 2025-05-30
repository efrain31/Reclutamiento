<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class CreateVacantes extends Migration
{
    public function up()
    {
    $this->forge->addField([
    'id'          => ['type' => 'INT', 'auto_increment' => true],
    'titulo'      => ['type' => 'VARCHAR', 'constraint' => 255],
    'descripcion' => ['type' => 'TEXT'],
    'tipo'        => ['type' => 'VARCHAR', 'constraint' => 100],
    'ubicacion'   => ['type' => 'VARCHAR', 'constraint' => 255],
    'fecha'       => ['type' => 'DATE'],
    'salario'     => ['type' => 'VARCHAR', 'constraint' => 100],
    'logo'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
    'categoria'   => ['type' => 'VARCHAR', 'constraint' => 100],
    'habilidades' => ['type' => 'TEXT', 'null' => true],
    'detalles'    => ['type' => 'TEXT', 'null' => true],
    'requisitos'  => ['type' => 'TEXT', 'null' => true],
    'responsabilidades' => ['type' => 'TEXT', 'null' => true],
    'prestaciones' => ['type' => 'TEXT', 'null' => true],
    'estatus' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'activo'],
    'created_at'  => ['type' => 'DATETIME', 'null' => true],
    'updated_at'  => ['type' => 'DATETIME', 'null' => true],
    ]);
        
        $this->forge->addKey('id', true);
        $this->forge->createTable('vacantes');
    }

    public function down()
    {
        $this->forge->dropTable('vacantes');
    }
}