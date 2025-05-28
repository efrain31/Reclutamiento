<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class CrearCvController extends Controller
{
    public function cv()
    {
        return view('crear_cv');
    }
}