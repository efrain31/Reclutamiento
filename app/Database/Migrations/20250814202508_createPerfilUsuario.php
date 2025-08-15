<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class CreatePerfilUsuario extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => ['type'=> 'INT', 'constraint' => 11,'unsigned' => true, 'auto_increment' => true],
            'usuario_id'        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true,],
            'direccion'         => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'fecha_nacimiento'  => ['type' => 'DATE', 'null' => true],
            'genero'            => ['type' => 'VARCHAR', 'constraint' => 10, 'null' => true],
            'tipo_cuenta'       => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'Job Seeker'],
            'created_at'        => ['type' => 'DATETIME','null' => true],
            'updated_at'        => ['type' => 'DATETIME','null' => true ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('usuario_id', 'registros', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('perfil_usuario');
    }

    public function down()
    {
        $this->forge->dropTable('perfil_usuario');
    }
}
