<?php

namespace App\Models;

use CodeIgniter\Model;

class CvModel extends Model
{
    protected $table      = 'cv';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'nombre', 'apellidos', 'pais', 'ciudad_estado', 'domicilio', 'codigo_postal', 'titulo_vacante',
        'correo', 'archivo_cv', 'telefono', 'experiencias', 'educaciones', 'habilidades','estatus', 'created_at'
    ];
}