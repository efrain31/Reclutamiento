<?php

namespace App\Controllers;
use App\Models\UsuariosModel;
use CodeIgniter\Controller;

class Autenticacion extends Controller
{
    public function registros()
    {
        return view('registro');
    }

    public function store()
    {
        try{
        $usuariosModel = new UsuariosModel();
        $data = [
            'nombre'     => $this->request->getPost('nombre'),
            'correo'    => $this->request->getPost('correo'),
            'contrasena' => password_hash($this->request->getPost('contrasena'), PASSWORD_DEFAULT)
        ];
        $usuariosModel->insert($data);
        return redirect()->to('/login')->with('success', 'Registro exitoso');
    } catch (\Exception $e) {
        return redirect()->to('/register')->with('error', $e->getMessage());
    }
    }
    public function login()
    {
        return view('login');
    }

    public function auth()
    {
        $usuariosModel = new UsuariosModel();
        $correo = $this->request->getPost('correo');
        $contrasena = $this->request->getPost('contrasena');

        $usuario = $usuariosModel->where('correo', $correo)->first();

        if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
            session()->set(['usuario_id' => $usuario['id'], 'usuario_nombre' => $user['nombre'], 'logged_in' => true]);
            return redirect()->to('/dashboard');
        } else {
            return redirect()->to('/login')->with('error', 'Credenciales incorrectas');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}