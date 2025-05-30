<?php

namespace App\Models;
use CodeIgniter\Model;

class VacanteModel extends Model
{
    protected $table = 'vacantes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['titulo', 'descripcion', 'tipo', 'ubicacion', 'fecha', 'salario', 'logo', 
    'categoria', 'habilidades', 'detalles', 'requisitos', 'responsabilidades', 'prestaciones', 'estatus'
    ];

    protected $useTimestamps = true; // <-- activa timestamps automáticos
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}