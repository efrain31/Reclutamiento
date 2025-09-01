<?php

namespace App\Controllers;
use App\Models\VacanteModel;
use CodeIgniter\Email\Email;
use CodeIgniter\Controller;
use Dompdf\Dompdf;

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
            
            $porPagina = 10;

            $vacantesQuery = $this->vacanteModel->where('estatus', 'activo');
    
            if (!empty($busqueda)) {
                $vacantesQuery->groupStart()
                    ->like('LOWER(titulo)', $busqueda)
                    ->orLike('LOWER(salario)', $busqueda)
                    ->orLike('LOWER(detalles)', $busqueda) 
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
    public function postularse($id) {

    $vacante = $this->vacanteModel->find($id);
    //print_r($vacante); exit;
    if (!$vacante) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Vacante no encontrada');
    }
    return view('postulacion', ['vacante' => $vacante]);
    }
    public function guardar_postulacion()
    {
    helper(['form', 'url']);
    $session = session();

    // Validación
    $validation = \Config\Services::validation();
    $validation->setRules([
        'nombre'    => 'required|min_length[3]',
        'correo'    => 'required|valid_email',
        'telefono'  => 'required'
       // 'cv'        => 'uploaded[cv]|ext_in[cv,pdf,doc,docx]|max_size[cv,2048]'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
       // return redirect()->back()->withInput()->with('error', $validation->getErrors());
        $errores = implode("\n", $validation->getErrors());
        return redirect()->back()->withInput()->with('error', $errores);
    }

    // Cargar archivo
    $file = $this->request->getFile('cv');

    if ($file && $file->isValid() && !$file->hasMoved()) {
        $newName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/uploads/cv_postulados', $newName);
    
    // Guardar en DB
    $postulacionModel = new \App\Models\PostulacionModel();
    
    $postulacionModel->insert([
        'id_vacante'  => $this->request->getPost('id_vacante'),
        'nombre'      => $this->request->getPost('nombre'),
        'correo'      => $this->request->getPost('correo'),
        'telefono'    => $this->request->getPost('telefono'),
        'trabajo'     => $this->request->getPost('trabajo'),
        'linkedin'    => $this->request->getPost('linkedin'),
        'portfolio'   => $this->request->getPost('portfolio'),
        'informacion' => $this->request->getPost('informacion'),
        'cv'          => $newName,
        'estatus'     => 'En revision'
    ]);

    // Enviar correo de confirmación al postulante
    $email = \Config\Services::email();
    $email->setFrom('desarrollo@escarh.com', 'Bolsa de Empleo Escarh');
    $email->setTo($this->request->getPost('correo'));
    $email->setSubject('¡Postulación recibida!');

    $mensaje = view('emails/postulacion', [
     'nombre'     => $this->request->getPost('nombre')
     ]);

try {
    $email->setMessage($mensaje);
    $email->setMailType('html');

    if ($email->send()) {
       return redirect()->to('bolsa_empleo')->with('success', 'Tu postulación fue enviada correctamente. Hemos enviado un correo de confirmación.');
    } else {
        log_message('error', 'Error al enviar correo: ' . print_r($email->printDebugger(['headers']), true));
        return redirect()->to('bolsa_empleo')->with('error', 'Tu postulación fue guardada, pero no se pudo enviar el correo de confirmación.');
    }
    } catch (\Exception $e) {
        log_message('error', 'Excepción al enviar correo: ' . $e->getMessage());
        return redirect()->to('bolsa_empleo')->with('error', 'Ocurrió un error al enviar el correo.'); //, '#formulario'
    }
}

// Si NO subió archivo, redirigimos a crear_cv y guardamos datos en sesión
$session->set('postulacion_temporal', [
    'id_vacante'  => $this->request->getPost('id_vacante'),
    'nombre'      => $this->request->getPost('nombre'),
    'correo'      => $this->request->getPost('correo'),
    'telefono'    => $this->request->getPost('telefono'),
    'trabajo'     => $this->request->getPost('trabajo'),
    'linkedin'    => $this->request->getPost('linkedin'),
    'portfolio'   => $this->request->getPost('portfolio'),
    'informacion' => $this->request->getPost('informacion'),
    'estatus'     => 'En revision'
]);
$session->setFlashdata('info', 'Por favor completa tu CV para finalizar tu postulación.');

return redirect()->to('/crear_cv');

}

public function cv_pdf($id)
{
    helper('text');

    $cvModel = new \App\Models\CvModel();
    $cv = $cvModel->find($id);

    if (!$cv) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('CV no encontrado.');
    }

    $experiencias = json_decode($cv['experiencias'], true);
    $educaciones  = json_decode($cv['educaciones'], true);
    $habilidades  = json_decode($cv['habilidades'], true);


    $data = [
        'cv'           => $cv,
        'experiencias' => $experiencias,
        'educaciones'  => $educaciones,
        'habilidades'  => $habilidades
    ];

    $html = view('admin/ver_postulacion', $data);

    // Genera el PDF con Dompdf
    $dompdf = new \Dompdf\Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

     return $this->response
        ->setContentType('application/pdf')
        ->setBody($dompdf->output());

   }
public function descargar_postulacion($archivo)
{
    $ruta = WRITEPATH . '../public/uploads/cv/' . $archivo;

    if (!file_exists($ruta)) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Archivo no encontrado.');
    }

    return $this->response->download($ruta, null);
}
public function guardar_postulacion_temporal()
{
    $session = session();
    $session->set('postulacion_temporal', [
        'id_vacante'  => $this->request->getPost('id_vacante'),
        'nombre'      => $this->request->getPost('nombre'),
        'correo'      => $this->request->getPost('correo'),
        'telefono'    => $this->request->getPost('telefono'),
        'trabajo'     => $this->request->getPost('trabajo'),
        'linkedin'    => $this->request->getPost('linkedin'),
        'portfolio'   => $this->request->getPost('portfolio'),
        'informacion' => $this->request->getPost('informacion'),
        'estatus'    => 'En revision',
    ]);
    return $this->response->setStatusCode(200); // OK
}
}