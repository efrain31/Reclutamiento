<?php

namespace App\Models;
use CodeIgniter\Model;

class ReclutamientoModel extends Model
{
    protected $table = 'reclutamiento';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nombre', 'correo', 'celular','empresa', 'municipio', 'servicio',
        'adicional', 'fecha','created_at', 'updated_at'
    ];
}