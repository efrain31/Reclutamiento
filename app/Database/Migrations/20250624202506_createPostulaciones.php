<?php 

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class CreatePostulaciones extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_vacante'  => ['type' => 'INT', 'constraint' => 11],
            'nombre'      => ['type' => 'VARCHAR', 'constraint' => 100],
            'correo'      => ['type' => 'VARCHAR', 'constraint' => 100],
            'telefono'    => ['type' => 'VARCHAR', 'constraint' => 20],
            'trabajo'     => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'linkedin'    => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'portfolio'   => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'informacion' => ['type' => 'TEXT', 'null' => true],
            'cv'          => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('postulaciones');
    }

    public function down()
    {
        $this->forge->dropTable('postulaciones');
    }
}