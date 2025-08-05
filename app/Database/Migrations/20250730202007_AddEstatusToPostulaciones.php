<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddEstatusToPostulaciones extends Migration
{
    public function up()
    {
        $this->forge->addColumn('postulaciones', [
            'estatus' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => 'En revision',
                'after'      => 'cv'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('postulaciones', 'estatus');
    }
}