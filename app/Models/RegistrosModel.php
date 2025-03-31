<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistrosModel extends Model
{
    protected $table = 'registros';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'apellido','correo', 'celular', 'soy', 'contrasena', 'empresa', 'municipio', 
    'servicio', 'adicional','fecha'];
}