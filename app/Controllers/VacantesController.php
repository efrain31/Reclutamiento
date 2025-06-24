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
            $busqueda = $this->request->getGet('busqueda');
            $pagina = $this->request->getGet('page_vacantes') ?? 1;
            
            $porPagina = 5;

            $vacantesQuery = $this->vacanteModel->where('estatus', 'activo');
    
            if (!empty($busqueda)) {
                $vacantesQuery->groupStart()
                    ->like('LOWER(titulo)', $busqueda)
                    ->orLike('LOWER(salario)', $busqueda)
                    ->orLike('LOWER(detalles)', $busqueda) // o 'empresa' si tienes ese campo
                    ->groupEnd();
            }
    
            $data['vacantes'] = $vacantesQuery 
            ->orderBy('fecha', 'DESC') //ASC
            ->paginate($porPagina, 'vacantes', $pagina);
    
            $data['pager'] = $this->vacanteModel->pager;
    
             // Si es AJAX, solo devuelve parcial
            if ($this->request->isAJAX()) {

             return view('partials/lista_vacantes_ajax', $data);

            }

            return view('bolsa_empleo', $data);
            
    } catch (\Exception $e) {
        echo 'Error: ' . $e->getMessage();
       // return view('errors/html/error_500', ['message' => 'Ocurrió un error al cargar las vacantes']);
    }
    }

    public function crear()
    {
        return view('crear_vacante');
    }

    public function guardar()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'titulo' => 'required',
            'descripcion' => 'required',
            'tipo' => 'required',
            'ubicacion' => 'required',
            'salario' => 'required',
            'categoria' => 'required'
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $logoName = $this->subirLogo();

        /*$logo = $this->request->getFile('logo');
        if ($logo->isValid() && !$logo->hasMoved()) {
            $logoName = $logo->getRandomName();
            $logo->move('vacantes', $logoName);
        } else {
            $logoName = '';
        }*/
        // Procesar campos multivalor
        /*$habilidades = $this->procesarTextoMultiple($this->request->getPost('habilidades'));
        $requisitos = $this->procesarTextoMultiple($this->request->getPost('requisitos'));
        $responsabilidades = $this->procesarTextoMultiple($this->request->getPost('responsabilidades'));
        $prestaciones = $this->procesarTextoMultiple($this->request->getPost('prestaciones'));*/

        $this->vacanteModel->save([
             'titulo' => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion'),
            'tipo' => $this->request->getPost('tipo'),
            'ubicacion' => $this->request->getPost('ubicacion'),
            'fecha' => date('Y-m-d'),
            'salario' => $this->request->getPost('salario'),
            'logo' => $logoName,
            'categoria' => $this->request->getPost('categoria'),
            'habilidades' => $this->procesarTextoMultiple($this->request->getPost('habilidades')),
            'detalles' => $this->request->getPost('detalles'),
            'requisitos' => $this->procesarTextoMultiple($this->request->getPost('requisitos')),
            'responsabilidades' => $this->procesarTextoMultiple($this->request->getPost('responsabilidades')),
            'prestaciones' => $this->procesarTextoMultiple($this->request->getPost('prestaciones')),
            'estatus' => 'activo'
        ]);

        return redirect()->to('/bolsa_empleo');
    }

    public function editar($id)
    {
        $vacante = $this->vacanteModel->find($id);
        if (!$vacante) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Vacante no encontrada');
        }
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
        $validation = \Config\Services::validation();
        $validation->setRules([
            'titulo' => 'required',
            'descripcion' => 'required',
            'tipo' => 'required',
            'ubicacion' => 'required',
            'salario' => 'required',
            'categoria' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
         // Procesar campos multivalor
    /*$habilidades = $this->procesarTextoMultiple($this->request->getPost('habilidades'));
    $requisitos = $this->procesarTextoMultiple($this->request->getPost('requisitos'));
    $responsabilidades = $this->procesarTextoMultiple($this->request->getPost('responsabilidades'));
    $prestaciones = $this->procesarTextoMultiple($this->request->getPost('prestaciones'));*/

    $data = [
        'titulo' => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion'),
            'tipo' => $this->request->getPost('tipo'),
            'ubicacion' => $this->request->getPost('ubicacion'),
            'salario' => $this->request->getPost('salario'),
            'categoria' => $this->request->getPost('categoria'),
            'habilidades' => $this->procesarTextoMultiple($this->request->getPost('habilidades')),
            'detalles' => $this->request->getPost('detalles'),
            'requisitos' => $this->procesarTextoMultiple($this->request->getPost('requisitos')),
            'responsabilidades' => $this->procesarTextoMultiple($this->request->getPost('responsabilidades')),
            'prestaciones' => $this->procesarTextoMultiple($this->request->getPost('prestaciones')),
    ];

    $logoName = $this->subirLogo($id);
        if ($logoName) {
            $data['logo'] = $logoName;
        }

        $this->vacanteModel->update($id, $data);

        return redirect()->to('/bolsa_empleo');
    }

    public function eliminar($id)
    {
       // $this->vacanteModel->delete($id);
       $this->vacanteModel->update($id, ['estatus' => 'eliminado']);
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
    /*$vacante['requisitos'] = $this->separarTexto($vacante['requisitos']);
        $vacante['responsabilidades'] = $this->separarTexto($vacante['responsabilidades']);
        $vacante['prestaciones'] = $this->separarTexto($vacante['prestaciones']);
        $vacante['habilidades'] = $this->separarTexto($vacante['habilidades']);
        $vacante['categorias'] = explode(',', $vacante['categoria']);*/
    return view('ver_vacante', ['vacante' => $vacante]);
    }
    private function subirLogo($id = null)
    {
        $logo = $this->request->getFile('logo');
        if ($logo && $logo->isValid() && !$logo->hasMoved()) {
            $logoName = $logo->getRandomName();
            $logo->move('vacantes', $logoName);

            // Si se actualiza una vacante, borrar logo anterior
            if ($id) {
                $vacanteActual = $this->vacanteModel->find($id);
                if (!empty($vacanteActual['logo']) && file_exists('vacantes/' . $vacanteActual['logo'])) {
                    unlink('vacantes/' . $vacanteActual['logo']);
                }
            }
            return $logoName;
        }
        return null;
    }
    private function procesarTextoMultiple($texto, $separador = ',')
    {
    $items = preg_split('/[\r\n,]+/', $texto, -1, PREG_SPLIT_NO_EMPTY);
    $items = array_map('trim', $items);
    $items = array_unique($items);
    return implode($separador, $items);
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
    private function separarTexto($texto)
    {
        return !empty($texto) ? explode(',', $texto) : [];
    }
}