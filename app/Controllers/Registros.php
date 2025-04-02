<?php

namespace App\Controllers;
use App\Models\RegistrosModel;
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
        //try{
        $registrosModel = new RegistrosModel();
        $data = [
            'nombre'     => $this->request->getPost('nombre'),
            'apellido'   => $this->request->getPost('apellido'),
            'correo'     => $this->request->getPost('correo'),
            'celular'    => $this->request->getPost('celular'),
            'soy'        => $this->request->getPost('soy'),
            'contrasena' => password_hash($this->request->getPost('contrasena'), PASSWORD_DEFAULT),
            'fecha'      => date('Y-m-d H:i:s')
        ];
        //print_r($data);exit;
        $registrosModel->insert($data);
        //print_r($id); exit;
    return redirect()->to('/inicio')->with('success', 'Registro exitoso');
    //} catch (\Exception $e) {
        //return redirect()->to('/inicio')->with('error', $e->getMessage());
    //}
    }
    public function store2()
    {
        $registrosModel = new RegistrosModel();
        $data = [
            'nombre'      => $this->request->getPost('nombre'),
            'correo'      => $this->request->getPost('correo'),
            'celular'     => $this->request->getPost('celular'),
            'empresa'     => $this->request->getPost('empresa'),
            'municipio'   => $this->request->getPost('municipio'),
            'servicio'    => $this->request->getPost('servicio'),
            'adicional'   => $this->request->getPost('adicional'),
            'fecha'       => date('Y-m-d H:i:s')
        ];
       // print_r($data);exit;
       //dd($data);
        $registrosModel->insert($data);
        //print_r($id); exit;
        // Enviar correo
       /* $email = \Config\Services::email();
        $email->setFrom('lectoras@geovoy.com', 'escarh');
        $email->setTo('brizeidarosales@geovoy.com'); // Cambia por el correo al que quieres enviarlo
        $email->setSubject('Nueva Solicitud de Reclutamiento');
        // Construir el mensaje en HTML
        $mensaje = "
            <h2>Solicitud de Reclutamiento</h2>
            <p><strong>Nombre:</strong> {$data['nombre']}</p>
            <p><strong>Correo:</strong> {$data['correo']}</p>
            <p><strong>Teléfono:</strong> {$data['celular']}</p>
            <p><strong>Empresa:</strong> {$data['empresa']}</p>
            <p><strong>Municipio:</strong> {$data['municipio']}</p>
            <p><strong>Servicio:</strong> {$data['servicio']}</p>
            <p><strong>Información Adicional:</strong> {$data['adicional']}</p>
            <p><strong>Fecha:</strong> {$data['fecha']}</p>
        ";
        $email->setMessage($mensaje);
        $email->setMailType('html');

      if (!$email->send()) {
        echo $email->printDebugger(['headers']);
       exit;*/
        return redirect()->to('/inicio')->with('success', 'Registro exitoso');
        //return redirect()->to('/inicio')->with('success', 'Registro exitoso y correo enviado');
        //} else {
            //echo "Correo enviado con éxito";
           // exit;
          //  return redirect()->to('/inicio')->with('error', 'Registro exitoso, pero el correo no se envió');
        //}
    }
    public function login()
    {
        return view('inicio');
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