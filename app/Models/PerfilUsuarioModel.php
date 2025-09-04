<?php

namespace App\Models;
use CodeIgniter\Model;

class PerfilUsuarioModel extends Model
{
    protected $table = 'perfil_usuario';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
         'usuario_idcv', 'fecha_nacimiento', 'genero', 'tipo_cuenta', 'direccion', 'created_at', 'updated_at'
    ];
    protected $returnType = 'array';
}