<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CvModel;
use App\Models\PostulacionModel;
use App\Models\VacanteModel;

class CrearCvController extends Controller
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
    public function cv()
    {
        return view('vista_cv');
    }
    public function crear_cv()
    {
        return view('crear_cv');
    }
    public function guardar_cv()
    {
        helper(['form', 'url']);
        $session = session();
        $cvModel = new CvModel();
        $postulacionModel = new \App\Models\PostulacionModel();

        // Experiencias y Educaciones como JSON para almacenarlo en la BD
        $experiencias = [];
        if ($this->request->getPost('empresa')) {
            foreach ($this->request->getPost('empresa') as $key => $value) {
                $experiencias[] = [
                    'empresa'        => $value,
                    'puesto'         => $this->request->getPost('puesto')[$key],
                    'pais'           => $this->request->getPost('pais_experiencia')[$key],
                    'tipo_trabajo'   => $this->request->getPost('tipo_trabajo')[$key],
                    'mes_inicio'     => $this->request->getPost('mes_inicio')[$key],
                    'anio_inicio'    => $this->request->getPost('anio_inicio')[$key],
                    'mes_fin'        => $this->request->getPost('mes_fin')[$key],
                    'anio_fin'       => $this->request->getPost('anio_fin')[$key],
                    'trabajo_actual' => $this->request->getPost('trabajo_actual')[$key] ?? 0
                ];
            }
        }

        $educaciones = [];
        if ($this->request->getPost('nivel_academico')) {
            foreach ($this->request->getPost('nivel_academico') as $key => $value) {
                $educaciones[] = [
                    'nivel_academico'  => $value,
                    'escuela'          => $this->request->getPost('escuela')[$key],
                    'carrera'          => $this->request->getPost('carrera')[$key],
                    'anio_graduacion'  => $this->request->getPost('anio_graduacion')[$key],
                    'sigo_estudiando'  => $this->request->getPost('sigo_estudiando')[$key] ?? 0
                ];
            }
        }
        // Guardado
        $id_cv = $cvModel->insert([
        'nombre'        => $this->request->getPost('nombre'),
        'apellidos'     => $this->request->getPost('apellidos'),
        'pais'          => $this->request->getPost('pais'),
        'ciudad_estado' => $this->request->getPost('ciudad_estado'),
        'domicilio'     => $this->request->getPost('domicilio'),
        'codigo_postal' => $this->request->getPost('codigo_postal'),
        'correo'        => $this->request->getPost('correo'),
        'telefono'      => $this->request->getPost('telefono'),
        'habilidades'   => $this->procesarTextoMultiple($this->request->getPost('habilidades')),
        'experiencias'  => json_encode($experiencias),
        'educaciones'   => json_encode($educaciones)
    ]);
    // Si existe una postulación temporal, la completamos con el ID del CV creado
    if ($session->has('postulacion_temporal')) {
        $dataPostulacion = $session->get('postulacion_temporal');
        $dataPostulacion['id_cv'] = $id_cv;
        $dataPostulacion['cv'] = null; // No subió PDF

        $postulacionModel->insert($dataPostulacion);
        
        // Enviar correo de confirmación al postulante
        $email = \Config\Services::email();
        $email->setFrom('desarrollo@escarh.com', 'Bolsa de Empleo Escarh');
        $email->setTo($dataPostulacion['correo']);
        $email->setSubject('¡Postulación recibida!');
        $mensaje = view('emails/postulacion', [
        'nombre' => $dataPostulacion['nombre']
        ]);

    try {
    $email->setMessage($mensaje);
    $email->setMailType('html');

    if ($email->send()) {
        return redirect()->to('bolsa_empleo')->with('success', 'CV creado y postulación enviada con éxito. Hemos enviado un correo de confirmación.');
        //$mensajeFlash = 'CV creado y postulación enviada con éxito. Hemos enviado un correo de confirmación.';
    } else {
        log_message('error', 'Error al enviar correo desde crear CV: ' . print_r($email->printDebugger(['headers']), true));
        return redirect()->to('bolsa_empleo')->with('error', 'CV creado y postulación guardada, pero no se pudo enviar el correo de confirmación.');
    }
    } catch (\Exception $e) {
    log_message('error', 'Excepción al enviar correo desde crear CV: ' . $e->getMessage());
    return redirect()->to('bolsa_empleo')->with('error', 'CV creado y postulación guardada, pero ocurrió un error al enviar el correo.');
    }
    // Limpiar sesión temporal
    $session->remove('postulacion_temporal');
    }
    // Mensaje cuando solo se creó el CV
    return redirect()->to('bolsa_empleo')->with('success', 'CV creado correctamente.');
    
    }
    public function listado_cv()
    {
        $postulacionModel = new \App\Models\PostulacionModel();
        $cvModel = new CvModel();
        $vacanteModel = new VacanteModel();

        $cvs_creados = $cvModel->findAll();
        $postulaciones = $postulacionModel->findAll(); //orderBy('created_at', 'DESC')->
        $vacantes = $vacanteModel->findAll();
        
        // Creamos un mapa rápido de vacantes por id para acceso directo
        $mapaVacantes = [];
        foreach ($vacantes as $v) {
        $mapaVacantes[$v['id']] = $v['titulo'];
        }
        // unificamos en una sola estructura con una bandera para diferenciarlos
        $cvs = [];

    /*foreach ($cvs_creados as $cv) {
        $cvs[] = [
            'id' => $cv['id'],
            'nombre' => $cv['nombre'] ?? '',
            'apellidos' => $cv['apellidos'],
            'titulo_vacante' => $cv['puesto_trabajo'] ?? 'No especificado',
            'tipo' => 'creado',
            'estatus' => $cv['estatus'] ?? 'En revision',
            'archivo_cv' => null, // No tiene archivo subido
            'created_at' => $cv['created_at']
        ];
    }*/

    foreach ($postulaciones as $p) {
        $titulo = isset($mapaVacantes[$p['id_vacante']]) ? $mapaVacantes[$p['id_vacante']] : 'Vacante desconocida';

        $cvs[] = [
            'id' => $p['id'],
            'nombre' => $p['nombre'] ?? '',
            'apellidos' => '',
            'titulo_vacante' => $titulo,
            'tipo' => 'subido',
            'estatus' => $p['estatus'] ?? 'En revision',
            'archivo_cv' => $p['cv'],
            'created_at' => $p['created_at']
        ];
    }

     /*foreach ($vacantes as $vacante) {
        $cvs[] = [
            'id' => $vacante['id'],
            'titulo_vacante' => $vacante['titulo'],    
            'created_at' => $vacante['created_at']
        ];
    }*/

    usort($cvs, fn($a, $b) => strtotime($b['created_at']) <=> strtotime($a['created_at']));

    // Paginación manual
    $page = (int)($this->request->getGet('page') ?? 1);
    $perPage = 10;
    $total = count($cvs);
    $offset = ($page - 1) * $perPage;
    $cvsPaginados = array_slice($cvs, $offset, $perPage);

    // Configuración de paginación
    $pager = \Config\Services::pager();
    $pager->makeLinks($page, $perPage, $total, 'bootstrap_pagination'); // usa plantilla bootstrap

       return view('admin/listado_cv', [
           'cvs' => $cvsPaginados,
            'pager' => $pager,
            'totalCvs' => $total
   ]);
    }

    public function detalle_cv($id)
    {
        $cvModel = new CvModel();
        $postModel = new PostulacionModel();
        $vacanteModel = new VacanteModel();

       // Primero buscamos en postulaciones (ya que ese ID se genera al postularse)
    $cv_postulado = $postModel->find($id);

    if ($cv_postulado) {
        // ¿El tipo es un CV creado o un PDF subido?
        if (!empty($cv_postulado['id_cv'])) {
            // Es un CV creado
            $cv_creado = $cvModel->find($cv_postulado['id_cv']);

            if ($cv_creado) {
                $cv_creado['tipo'] = 'creado';
                $vacante = $vacanteModel->find($cv_postulado['id_vacante']);
                $cv_creado['titulo_vacante'] = $vacante['titulo'] ?? 'Sin título';

                $cv_creado['experiencias'] = json_decode($cv_creado['experiencias'], true);
                $cv_creado['educaciones'] = json_decode($cv_creado['educaciones'], true);
                $cv_creado['habilidades'] = !empty($cv_creado['habilidades']) ? explode(',', $cv_creado['habilidades']) : [];

                // Traer los datos adicionales desde la postulación
                $cv_creado['estatus'] = $cv_postulado['estatus'] ?? 'En revision';
                $cv_creado['id'] = $cv_postulado['id'];
                $cv_creado['created_at'] = $cv_postulado['created_at'];
                $cv_creado['titulo_vacante'] = $vacante['titulo'] ?? 'Sin título';

                return view('admin/detalle_cv', ['cv' => $cv_creado]);
            }
        } else {
            // Es un CV subido como PDF
            $cv_postulado['tipo'] = 'subido';
            $vacante = $vacanteModel->find($cv_postulado['id_vacante']);
            $cv_postulado['titulo_vacante'] = $vacante['titulo'] ?? 'Sin título';
            $cv_postulado['archivo_cv'] = $cv_postulado['cv'];
            $cv_postulado['estatus'] = $cv_postulado['estatus'] ?? 'En revision';
            $cv_postulado['id'] = $cv_postulado['id'];

            return view('admin/detalle_cv', ['cv' => $cv_postulado]);
        }
    }
    return redirect()->to('/')->with('error', 'CV no encontrado.');
    }

    public function exportar_cv($id)
    {
    $cvModel = new CvModel();
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

    $html = view('admin/cv_pdf', $data);
    generar_pdf($html, 'CV_'.$cv['nombre'].'.pdf');
    }

    public function cambiar_estatus($id)
    {
    $cvModel = new \App\Models\CvModel();
    $pdfModel = new \App\Models\PostulacionModel(); // Modelo para los CVs subidos en PDF
    $nuevoEstatus = $this->request->getPost('nuevo_estatus');

    // Primero intentamos actualizar en la tabla cv
    $cv = $cvModel->find($id);
    $pdfCv = $pdfModel->find($id);

    if ($cv) {
        $cvModel->update($id, ['estatus' => $nuevoEstatus]);
    } elseif ($pdfCv) {
        $pdfModel->update($id, ['estatus' => $nuevoEstatus]);
    } else {
        return redirect()->back()->with('error', 'CV no encontrado.');
    }
    return redirect()->to(base_url('listado_cv'))->with('success', 'Estatus actualizado correctamente.');
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
}