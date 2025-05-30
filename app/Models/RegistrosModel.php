<?php

namespace App\Models;
use CodeIgniter\Model;

class RegistrosModel extends Model
{
    protected $table = 'registros';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nombre', 'apellido', 'correo', 'celular', 'soy', 'contrasena',
        'fecha', 'id_rol', 'created_at', 'updated_at'
    ];
    protected $useTimestamps = true;
    protected $returnType    = 'array';

    protected $validationRules = [
        'nombre'     => 'required|min_length[3]',
        'correo'     => 'required|valid_email|is_unique[registros.correo,id,{id}]',
        'contrasena' => 'required|min_length[6]'
    ];

    protected $validationMessages = [
        'correo' => [
            'is_unique' => 'Este correo ya está registrado.'
        ],
        'contrasena' => [
            'min_length' => 'La contraseña debe tener al menos 6 caracteres.'
        ]
    ];
}