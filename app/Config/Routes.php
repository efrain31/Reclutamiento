<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Registros;
use App\Controllers\Dashboard;
use App\Controllers\Inicios;
use App\Controllers\SesionController;
use App\Controllers\BolsaEmpleoController;
/**
 * @var RouteCollection $routes
 */
//pagina de inicio
$routes->get('/', 'Inicios::index');

//registros
$routes->get('/registro', 'Registros::registros');
$routes->post('/registro/store', 'Registros::store');
$routes->post('/inicio/store', 'Registros::store2');

//inicio de sesiones
$routes->get('/iniciar_session', 'SesionController::login');
$routes->post('/sesion/stores', 'SesionController::stores');
$routes->get('/logout', 'SesionController::logout');
//$routes->get('/auth/google', 'SesionController::googleLogin');

// crear cv
$routes->get('/vista_cv', 'CrearCvController::cv');
$routes->get('/crear_cv', 'CrearCvController::crear_cv');
$routes->post('/guardar_cv', 'CrearCvController::guardar_cv');
$routes->get('listado_cv', 'CrearCvController::listado_cv');
$routes->get('detalle_cv/(:num)', 'CrearCvController::detalle_cv/$1');
$routes->get('exportar_cv/(:num)', 'CrearCvController::exportar_cv/$1');
$routes->post('cambiar_estatus/(:num)', 'CrearCvController::cambiar_estatus/$1');
//$routes->get('cambiar_estatus/(:num)/(:any)', 'CrearCvController::cambiar_estatus/$1/$2');

//Recuperar contraseña
$routes->get('recuperar-contrasena', 'RecuperarContrasenaController::recuperarContrasena');
$routes->post('enviar-recuperacion', 'RecuperarContrasenaController::enviarRecuperacion');
$routes->get('reestablecer-contrasena', 'RecuperarContrasenaController::restablecerContrasena');
$routes->post('actualizar-contrasena', 'RecuperarContrasenaController::actualizarContrasena');

// crear vacante
$routes->get('bolsa_empleo', 'VacantesController::bolsa_emp');
$routes->get('/crear_vacante', 'VacantesController::crear');
$routes->post('/vacantes/guardar', 'VacantesController::guardar');
$routes->get('/editar_vacante/(:num)', 'VacantesController::editar/$1');
$routes->post('/vacantes/actualizar/(:num)', 'VacantesController::actualizar/$1');
//$routes->post('/vacantes/eliminar', 'VacantesController::eliminar');
//$routes->post('/vacantes/cerrar', 'VacantesController::cerrar');
$routes->get('ver_vacante/(:num)', 'VacantesController::ver/$1');

//postulaciones
$routes->get('/postulacion/(:num)', 'VacantesController::postularse/$1');
$routes->post('guardar_postulacion', 'VacantesController::guardar_postulacion');
//$routes->get('admin/ver_postulacion/(:num)', 'VacantesController::ver_postulacion/$1');
//$routes->get('admin/cv_pdf/(:num)', 'VacantesController::cv_pdf/$1');
$routes->get('descargar_postulacion/(:num)', 'VacantesController::descargar_postulacion/$1');
$routes->post('guardar_postulacion_temporal', 'VacantesController::guardar_postulacion_temporal');
