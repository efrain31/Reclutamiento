<?php

namespace App\Controllers;
use App\Models\RegistrosModel;
use CodeIgniter\Controller;

class SesionController extends Controller
{
    public function login()
    {
        return view('iniciar_session');
    }

    public function stores()
    {
        $session = session();
        $usuariosModel = new RegistrosModel();

        $correo = $this->request->getPost('correo');
        $contrasena = $this->request->getPost('contrasena');

        $usuario = $usuariosModel->where('correo', $correo)->first();

        if ($usuario) {
            if (password_verify($contrasena, $usuario['contrasena'])) {
                $session->set([
                    'usuario_id' => $usuario['id'],
                    'nombre' => $usuario['nombre'],
                    'correo' => $usuario['correo'],
                    'id_rol'     => $usuario['id_rol'],
                    'isLoggedIn' => true
                ]);

            if ($this->request->getPost('recuerdame')) {
                    setcookie('correo', $correo, time() + (86400 * 30), "/"); // Guarda el correo por 30 días
            }
                 // Redireccionar según rol   /admin/usuario
            if ($usuario['id_rol'] == 1) {
                return redirect()->to('/bolsa_empleo');
            } else {
                return redirect()->to('/bolsa_empleo'); //->with('success', 'Inicio de sesión exitoso')
            }
            } else {
                return redirect()->to('/iniciar_session')->with('error', 'Contraseña incorrecta');
            }
        } else {
            return redirect()->to('/iniciar_session')->with('error', 'Correo no registrado');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/inicio')->with('success', 'Sesión cerrada');
    }

    public function googleLogin()
    {
        // Aquí puedes integrar el inicio de sesión con Google usando la API de OAuth.
    }
}