<?php

namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;

class RegistrosSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nombre'    => 'Admin',
                'correo'     => 'admin@empresa.com',
                'contrasena'  => password_hash('admin123', PASSWORD_DEFAULT),
                'id_rol'    => 1, // admin
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'nombre'    => 'Usuario',
                'correo'     => 'usuario@empresa.com',
                'contrasena'  => password_hash('usuario123', PASSWORD_DEFAULT),
                'id_rol'    => 2, // usuario
                'created_at'=> date('Y-m-d H:i:s')
            ],
        ];

        $this->db->table('registros')->insertBatch($data);
    }
}