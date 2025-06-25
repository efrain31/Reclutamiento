<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\Email\Email;
use App\Models\RegistrosModel;

class RecuperarContrasenaController extends Controller
{
    public function recuperarContrasena()
    {
        return view('recuperar-contrasena');
    }
    
    public function enviarRecuperacion()
    {

    //Verificar reCAPTCHA
    $recaptcha = $this->request->getPost('g-recaptcha-response');
    if (!$recaptcha) {
        return redirect()->back()->withInput()->with('error', 'Por favor verifica el reCAPTCHA')->with('error_anchor', true);
    }

    $secret = '6Leo_BQrAAAAADwwbYZvkszk9JJGuzgu7QwrgUM2';
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$recaptcha}");
    $responseKeys = json_decode($response, true);

    if (!$responseKeys["success"]) {
        return redirect()->back()->withInput()->with('error', 'Falló la verificación de reCAPTCHA')->with('error_anchor', true);
    }

    // Validar correo ingresado
    $correo = $this->request->getPost('correo');

    if (empty($correo)) {
        return redirect()->back()->with('error', 'Debes ingresar un correo válido.');
    }

    // Verificar usuario existente
    $registrosModel = new \App\Models\RegistrosModel();
    $usuario = $registrosModel->where('correo', $correo)->first();

    if (!$usuario) {
        return redirect()->back()->with('error', 'El correo no está registrado.');
    }

    // Generar token y enlace
    $token = bin2hex(random_bytes(16));
    $enlace = base_url("reestablecer-contrasena?token=$token&correo=$correo");

    // Configurar Email
    $email = \Config\Services::email();
    $email->setFrom('desarrollo@escarh.com', 'ESCARH');
    $email->setTo($correo);
    $email->setSubject('Recuperación de contraseña');

    //  Cargar vista con datos
    $mensaje = view('emails/recuperacion', [
        'nombre'   => $usuario['nombre'],
        'apellido' => $usuario['apellido'],
        'enlace'   => $enlace
    ]);

    $email->setMessage($mensaje);
    $email->setMailType('html');

    //Enviar correo
    if ($email->send()) {
        return redirect()->to('recuperar-contrasena')->with('success', 'Te hemos enviado un enlace de recuperación a tu correo.');
    } else {
        return redirect()->back()->with('error', 'No se pudo enviar el correo. Intenta más tarde.');
    }
    }
    public function restablecerContrasena()
{
    $correo = $this->request->getGet('correo');
    $token  = $this->request->getGet('token');

    if (!$correo || !$token) {
        return redirect()->to('iniciar_session')->with('error', 'Solicitud inválida.');
    }

    return view('reestablecer-contrasena', ['correo' => $correo, 'token' => $token]);
}

public function actualizarContrasena()
{
    $correo   = $this->request->getPost('correo');
    $token    = $this->request->getPost('token');
    $contrasena = $this->request->getPost('contrasena');
    $confirmar = $this->request->getPost('confirmar_contrasena');

    // Verificar campos obligatorios
    if (empty($contrasena) || empty($confirmar)) {
        return redirect()->back()->with('error', 'Debes completar todos los campos.');
    }

    // Validar coincidencia de contraseñas
    if ($contrasena !== $confirmar) {
        return redirect()->back()->with('error', 'Las contraseñas no coinciden.');
    }
    // Validar longitud mínima
    if (strlen($contrasena) < 6) {
        return redirect()->back()->with('error', 'La contraseña debe tener al menos 6 caracteres.');
    }

    // Validar existencia de usuario
    $registrosModel = new \App\Models\RegistrosModel();
    $usuario = $registrosModel->where('correo', $correo)->first();

    if (!$usuario) {
        return redirect()->to('recuperar-contrasena')->with('error', 'El correo no está registrado.');
    }

    // Actualizar contraseña
    $registrosModel->update($usuario['id'], [
        'contrasena' => password_hash($contrasena, PASSWORD_DEFAULT)
    ]);

    // Si se seleccionó cerrar sesiones activas (opcional si manejas sesiones en BD)
    if ($this->request->getPost('cerrar_sesiones')) {
        // Aquí puedes eliminar registros de sesión relacionados en BD
        // $this->db->table('user_sessions')->where('user_id', $usuario['id'])->delete();
    }
    return redirect()->to('iniciar_session')->with('success', 'Tu contraseña se actualizó correctamente.');
}




}