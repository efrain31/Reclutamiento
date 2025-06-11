<?php

namespace App\Controllers;
use App\Models\RegistrosModel;
use App\Models\ReclutamientoModel;
use CodeIgniter\Controller;
use CodeIgniter\Email\Email;

class Registros extends Controller
{
    public function registros()
    {
        return view('registro');
    }

    public function store()
    {
        $registrosModel = new RegistrosModel();
        date_default_timezone_set("America/Mexico_City");

        $correo_usuario = $this->request->getPost('correo');
        $password_plana = $this->request->getPost('contrasena'); // SIN hash para enviar

        $data = [
            'nombre'     => $this->request->getPost('nombre'),
            'apellido'   => $this->request->getPost('apellido'),
            'correo'     => $correo_usuario,
            'celular'    => $this->request->getPost('celular'),
            'soy'        => $this->request->getPost('soy'),
            'contrasena' => password_hash($password_plana, PASSWORD_DEFAULT),
            'fecha'      => date('Y-m-d H:i:s')
        ];
        //print_r($data);exit;  
        // Enviar correo
    $email = \Config\Services::email();
    $email->setFrom('desarrollo@geovoy.com', 'ESCARH');
    $email->setTo($correo_usuario);
    $email->setSubject('Registro exitoso en ESCARH');

   // Plantilla HTML
   $mensaje = view('emails/registros', [
    'nombre'     => $data['nombre'],
    'apellido'   => $data['apellido'],
    'correo'     => $correo_usuario,
    'contrasena' => $password_plana
]);

   try {
    $email->setMessage($mensaje);
    $email->setMailType('html');

    if ($email->send()) {
        $registrosModel->insert($data);  
        return redirect()->to('iniciar_session')->with('success', 'Registro exitoso. Revisa tu correo.');
    } else {
        log_message('error', 'Error al enviar correo: ' . print_r($email->printDebugger(['headers']), true));
        return redirect()->to('inicio')->with('error', 'No se pudo enviar el correo.');
    }
} catch (\Exception $e) {
    log_message('error', 'Excepción al enviar correo: ' . $e->getMessage());
    return redirect()->to('inicio')->with('error', 'Ocurrió un error al enviar el correo.'); //, '#formulario'
}   
    }
    
    public function store2()
    {
    // Definir reglas de validación
    $validacionReglas = [
        'nombre'     => 'required',
        'correo'     => 'required|valid_email',
        'celular'    => 'required|numeric|min_length[10]|max_length[10]',
        'empresa'    => 'required',
        'municipio'  => 'required',
        'servicio'   => 'required|not_in_list[Selecciona]',
    ];
    // Mensajes personalizados en español
    $validacionMensajes = [
        'nombre' => [
            'required' => 'El campo nombre es obligatorio.',
        ],
        'correo' => [
            'required'    => 'El campo correo es obligatorio.',
            'valid_email' => 'El correo debe ser válido.',
        ],
        'celular' => [
            'required'    => 'El campo teléfono es obligatorio.',
            'numeric'     => 'El teléfono debe contener solo números.',
            'min_length'  => 'El teléfono debe tener exactamente 10 dígitos.',
            'max_length'  => 'El teléfono debe tener exactamente 10 dígitos.',
        ],
        'empresa' => [
            'required' => 'El campo empresa es obligatorio.',
        ],
        'municipio' => [
            'required' => 'El campo municipio es obligatorio.',
        ],
        'servicio' => [
            'required'      => 'Selecciona un servicio.',
            'not_in_list'   => 'Selecciona un servicio válido.',
        ],
    ];

    if (! $this->validate($validacionReglas, $validacionMensajes)) {
        return redirect()->back()
                         ->withInput()
                         ->with('errors', $this->validator->getErrors())
                         ->with('error_anchor', true); // Anclar al formulario
    }
        // Verificación del reCAPTCHA
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
    // Guardar los datos y enviar correo
    $reclutamientoModel = new ReclutamientoModel();
    date_default_timezone_set("America/Mexico_City");

    $data = [
        'nombre'      => $this->request->getPost('nombre'),
        'correo'      => $this->request->getPost('correo'),
        'celular'     => $this->request->getPost('celular'),
        'empresa'     => $this->request->getPost('empresa'),
        'municipio'   => $this->request->getPost('municipio'),
        'servicio'    => $this->request->getPost('servicio'),
        'adicional'   => $this->request->getPost('adicional'),
        'fecha'       => date('Y-m-d  H:i:s')
    ];

    $email = \Config\Services::email();
    $email->setFrom('desarrollo@geovoy.com', 'Escarh');
    $email->setTo('brizeidarosales@geovoy.com, raquel_magana@escarh.com'); //
    $email->setSubject('Nueva Solicitud de Servicios');

    $mensaje = "
    <div style='font-family: Arial, sans-serif; max-width: 600px; margin: auto; padding: 20px; border: 1px solid #e0e0e0; border-radius: 10px;'>
        <h2 style='color: #004080; text-align: center;'>Solicitud de Servicios</h2>
        <table style='width: 100%; border-collapse: collapse;'>
            <tr style='background-color: #f0f8ff;'><td style='padding: 8px; font-weight: bold;'>Nombre:</td><td style='padding: 8px;'>{$data['nombre']}</td></tr>
            <tr><td style='padding: 8px; font-weight: bold;'>Correo:</td><td style='padding: 8px;'>{$data['correo']}</td></tr>
            <tr style='background-color: #f0f8ff;'><td style='padding: 8px; font-weight: bold;'>Teléfono:</td><td style='padding: 8px;'>{$data['celular']}</td></tr>
            <tr><td style='padding: 8px; font-weight: bold;'>Empresa:</td><td style='padding: 8px;'>{$data['empresa']}</td></tr>
            <tr style='background-color: #f0f8ff;'><td style='padding: 8px; font-weight: bold;'>Municipio:</td><td style='padding: 8px;'>{$data['municipio']}</td></tr>
            <tr><td style='padding: 8px; font-weight: bold;'>Servicio:</td><td style='padding: 8px;'>{$data['servicio']}</td></tr>
            <tr style='background-color: #f0f8ff;'><td style='padding: 8px; font-weight: bold;'>Información Adicional:</td><td style='padding: 8px;'>{$data['adicional']}</td></tr>
            <tr><td style='padding: 8px; font-weight: bold;'>Fecha:</td><td style='padding: 8px;'>{$data['fecha']}</td></tr>
        </table>
        <p style='text-align: center; margin-top: 20px; font-size: 12px; color: #888;'>Este mensaje fue generado automáticamente por el sistema de contacto de Escarh.</p>
    </div>";

    try {
        $email->setMessage($mensaje);
        $email->setMailType('html');

        if ($email->send()) {
            $reclutamientoModel->insert($data);
            return redirect()->to('inicio')->with('success', 'El correo fue enviado correctamente.');
        } else {
            log_message('error', 'Error al enviar correo: ' . print_r($email->printDebugger(['headers']), true));
            return redirect()->to('inicio')->with('error', 'No se pudo enviar el correo.');
        }
    } catch (\Exception $e) {
        log_message('error', 'Excepción al enviar correo: ' . $e->getMessage());
        return redirect()->to('inicio')->with('error', 'Ocurrió un error al enviar el correo.'); //, '#formulario'
    }
    
    }
}