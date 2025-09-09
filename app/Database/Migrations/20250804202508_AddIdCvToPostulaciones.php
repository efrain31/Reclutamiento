<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIdCvToPostulaciones extends Migration
{
    public function up()
    {
        $this->forge->addColumn('postulaciones', [
            'id_cv' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
                'after'      => 'id'
            ]
        ]);

        $this->db->query('ALTER TABLE postulaciones ADD CONSTRAINT fk_postulacion_cv FOREIGN KEY (id_cv) REFERENCES cv(id) ON DELETE SET NULL');
    }

    public function down()
    {
        // Eliminar la clave foránea antes de borrar la columna
        $this->db->query('ALTER TABLE postulaciones DROP CONSTRAINT fk_postulacion_cv');


        $this->forge->dropColumn('postulaciones', 'id_cv');
    }
}
