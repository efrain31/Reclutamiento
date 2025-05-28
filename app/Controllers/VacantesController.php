<?php

namespace App\Controllers;
use App\Models\VacanteModel;

class VacantesController extends BaseController
{
    protected $vacanteModel;

    public function __construct()
    {
        $this->vacanteModel = new VacanteModel();
    }

    public function bolsa_emp()
    {
        try {
        $data['vacantes'] = $this->vacanteModel->where('estatus', 'activo')->findAll();
        return view('bolsa_empleo', $data);
    } catch (\Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
    }

    public function crear()
    {
        return view('crear_vacante');
    }

    public function guardar()
    {
        $logo = $this->request->getFile('logo');
        if ($logo->isValid() && !$logo->hasMoved()) {
            $logoName = $logo->getRandomName();
            $logo->move('vacantes', $logoName);
        } else {
            $logoName = 'default.png';
        }
        // Procesar campos multivalor
        $habilidades = $this->procesarTextoMultiple($this->request->getPost('habilidades'));
        $requisitos = $this->procesarTextoMultiple($this->request->getPost('requisitos'));
        $responsabilidades = $this->procesarTextoMultiple($this->request->getPost('responsabilidades'));
        $prestaciones = $this->procesarTextoMultiple($this->request->getPost('prestaciones'));

        $this->vacanteModel->save([
            'titulo' => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion'),
            'tipo' => $this->request->getPost('tipo'),
            'ubicacion' => $this->request->getPost('ubicacion'),
            'fecha' => date('Y-m-d'),
            'salario' => $this->request->getPost('salario'),
            'logo' => $logoName,
            'categoria' => $this->request->getPost('categoria'),
            'habilidades' => $habilidades,
            'detalles' => $this->request->getPost('detalles'),
            'requisitos' => $requisitos,
            'responsabilidades' => $responsabilidades,
            'prestaciones' => $prestaciones,
            'estatus' => 'activo'
        ]);

        return redirect()->to('/bolsa_empleo');
    }

    public function editar($id)
    {
        $vacante = $this->vacanteModel->find($id);

        // Convertir comas a saltos de línea para los textarea
        $vacante['habilidades'] = $this->convertirComasSaltos($vacante['habilidades']);
        $vacante['requisitos'] = $this->convertirComasSaltos($vacante['requisitos']);
        $vacante['responsabilidades'] = $this->convertirComasSaltos($vacante['responsabilidades']);
        $vacante['prestaciones'] = $this->convertirComasSaltos($vacante['prestaciones']);
    
        $data['vacante'] = $vacante;
        return view('editar_vacante', $data);
    }

    public function actualizar($id)
    {
         // Procesar campos multivalor
    $habilidades = $this->procesarTextoMultiple($this->request->getPost('habilidades'));
    $requisitos = $this->procesarTextoMultiple($this->request->getPost('requisitos'));
    $responsabilidades = $this->procesarTextoMultiple($this->request->getPost('responsabilidades'));
    $prestaciones = $this->procesarTextoMultiple($this->request->getPost('prestaciones'));

    $data = [
        'titulo' => $this->request->getPost('titulo'),
        'descripcion' => $this->request->getPost('descripcion'),
        'tipo' => $this->request->getPost('tipo'),
        'ubicacion' => $this->request->getPost('ubicacion'),
        'salario' => $this->request->getPost('salario'),
        'categoria' => $this->request->getPost('categoria'),
        'habilidades' => $habilidades,
        'detalles' => $this->request->getPost('detalles'),
        'requisitos' => $requisitos,
        'responsabilidades' => $responsabilidades,
        'prestaciones' => $prestaciones,
    ];

    $logo = $this->request->getFile('logo');
    if ($logo->isValid() && !$logo->hasMoved()) {
    $logoName = $logo->getRandomName();
    $logo->move('vacantes', $logoName);
    $data['logo'] = $logoName;
}
    $this->vacanteModel->update($id, $data);
        return redirect()->to('/bolsa_empleo');
    }

    public function eliminar($id)
    {
        $this->vacanteModel->delete($id);
        return redirect()->to('/bolsa_empleo');
    }

    public function cerrar($id)
    {
        $this->vacanteModel->update($id, ['estatus' => 'cerrado']);
        return redirect()->to('/bolsa_empleo');
    }

    public function ver($id)
    {
    $vacante = $this->vacanteModel->find($id);
    //print_r($vacante); exit;
    if (!$vacante) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Vacante no encontrada');
    }

    $vacante['requisitos'] = !empty($vacante['requisitos']) ? explode(',', $vacante['requisitos']) : [];
    $vacante['responsabilidades'] = !empty($vacante['responsabilidades']) ? explode(',', $vacante['responsabilidades']) : [];
    $vacante['prestaciones'] = !empty($vacante['prestaciones']) ? explode(',', $vacante['prestaciones']) : [];
    $vacante['categorias'] = explode(',', $vacante['categoria']); // Porque categoría es VARCHAR, separada por coma
    $vacante['habilidades'] = !empty($vacante['habilidades']) ? explode(',', $vacante['habilidades']) : [];
    //print_r($vacante); exit;
    
    return view('ver_vacante', ['vacante' => $vacante]);
    }

    private function procesarTextoMultiple($texto)
    {
    $items = preg_split('/[\r\n,]+/', $texto, -1, PREG_SPLIT_NO_EMPTY);
    $items = array_map('trim', $items);
    return implode(',', $items);
    }
    private function convertirComasSaltos($texto)
    {
    if (empty($texto)) { 
        return '';
    }
    $items = explode(',', $texto);
    $items = array_map('trim', $items);
    return implode("\n", $items);
    }
}