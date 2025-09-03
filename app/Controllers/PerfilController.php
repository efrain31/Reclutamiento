<?php

namespace App\Controllers;

use App\Models\RegistrosModel;
use CodeIgniter\Controller;

class PerfilController extends Controller
{
    /*public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Siempre llamar al initController padre
        parent::initController($request, $response, $logger);

        helper('url');

        // Evitar cache del navegador
        $this->response->setHeader("Cache-Control", "no-store, no-cache, must-revalidate, max-age=0");
        $this->response->setHeader("Cache-Control", "post-check=0, pre-check=0", false);
        $this->response->setHeader("Pragma", "no-cache");

        // Validar sesión
        $session = session();
        if (!$session->get('isLoggedIn')) {
            redirect()->to(base_url('iniciar_session'))->send();
            exit;
        }
    }*/
    public function index()
    {
    $session = session();
    $db = \Config\Database::connect();
 
    $builder = $db->table('registros r');
    $builder->select('r.*, p.direccion, p.fecha_nacimiento, p.tipo_cuenta, p.genero');
    $builder->join('perfil_usuario p', 'p.usuario_idcv = r.id', 'left');
    $builder->where('r.id', $session->get('usuario_id'));

    $data['usuario'] = $builder->get()->getRowArray() ?? [
    'nombre'           => '',
    'apellido'         => '',
    'celular'          => '',
    'correo'           => '',
    'direccion'        => '',
    'fecha_nacimiento' => '',
    'genero'           => '',
    'tipo_cuenta'      => '',
];
  
    return view('perfil/index', $data);
    }
    public function actualizar()
{
    $session = session();
    $usuarioId = $session->get('usuario_id');

    $registrosModel = new \App\Models\RegistrosModel();
    $perfilModel = new \App\Models\PerfilUsuarioModel();

    // Actualizar tabla registros
    $registrosData = [
        'nombre'   => $this->request->getPost('nombre'),
        'apellido' => $this->request->getPost('apellido'),
        'celular'  => $this->request->getPost('celular'),
        'correo'   => $this->request->getPost('correo')
    ];

    $registrosModel->skipValidation()->update($usuarioId, $registrosData);
    
     // Datos del perfil
    $perfilData = [
        'usuario_idcv'       => $usuarioId,
        'direccion'        => $this->request->getPost('direccion'),
        'fecha_nacimiento' => $this->request->getPost('fecha_nacimiento'),
        'genero'           => $this->request->getPost('genero'),
        'tipo_cuenta'      => $this->request->getPost('tipo_cuenta'),
    ];

    // Verificar si ya tiene perfil
    $existePerfil = $perfilModel->where('usuario_idcv', $usuarioId)->first();

    if ($existePerfil) {
        // Actualizar perfil existente
        $perfilModel->update($existePerfil['id'], $perfilData);
    } else {
        // Crear nuevo perfil
        $perfilModel->insert($perfilData);
    }

    return redirect()->to('perfil')->with('success', 'Perfil actualizado correctamente');
}

}
