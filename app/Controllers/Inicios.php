<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Inicios extends Controller
{
    public function index()
    {
        $data['title'] = 'Inicio';
        return view('inicio', $data);
    }
}