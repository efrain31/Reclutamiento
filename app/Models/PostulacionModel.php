<?php namespace App\Models;

use CodeIgniter\Model;

class PostulacionModel extends Model
{
    protected $table      = 'postulaciones';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_vacante', 'nombre', 'correo', 'telefono', 'trabajo', 'linkedin', 'portfolio',
        'informacion', 'cv','estatus', 'archivo_cv', 'id_cv', 'created_at'
    ];
    protected $useTimestamps = true;
}

