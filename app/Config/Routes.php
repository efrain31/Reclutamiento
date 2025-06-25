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
$routes->get('/inicio', 'Inicios::index');

$routes->get('/registro', 'Registros::registros');
$routes->post('/registro/store', 'Registros::store');
$routes->post('/inicio/store', 'Registros::store2');

$routes->get('/iniciar_session', 'SesionController::login');
$routes->post('/sesion/stores', 'SesionController::stores');
$routes->get('/logout', 'SesionController::logout');
//$routes->get('/auth/google', 'SesionController::googleLogin');

// crear cv
$routes->get('/crear_cv', 'CrearCvController::cv');

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
$routes->post('/vacantes/eliminar', 'VacantesController::eliminar');
$routes->post('/vacantes/cerrar', 'VacantesController::cerrar');
$routes->get('ver_vacante/(:num)', 'VacantesController::ver/$1');
$routes->get('postularse/(:num)', 'VacantesController::postularse/$1');