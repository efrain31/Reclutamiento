<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddEstatusToCv extends Migration
{
    public function up()
{
    $this->forge->addColumn('cv', [
        'estatus' => [
            'type' => 'VARCHAR',
            'constraint' => 20,
            'default' => 'En revision',
            'after' => 'habilidades' // o el último campo que tengas
        ],
    ]);
}

public function down()
{
    $this->forge->dropColumn('cv', 'estatus');
}
}