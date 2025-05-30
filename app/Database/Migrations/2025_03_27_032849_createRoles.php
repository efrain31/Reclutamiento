<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class CreateRoles extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'  => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'rol' => [
                'type'       => 'VARCHAR',
                'constraint' => 50
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('roles');

        // Insertar los roles básicos
        $this->db->table('roles')->insertBatch([
            ['rol' => 'Administrador'],
            ['rol' => 'Usuario']
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('roles');
    }
}