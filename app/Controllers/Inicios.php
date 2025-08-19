<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Inicios extends Controller
{
     public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
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
            return redirect()->to(base_url('iniciar_session'))->send();
            exit;
        }
    }
    public function index()
    {
        $data['title'] = 'Inicio';
        return view('inicio', $data);
    }
}