<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Registros;
use App\Controllers\Dashboard;
use App\Controllers\Inicios;
use App\Controllers\SesionController;
/**
 * @var RouteCollection $routes
 */
/*$routes->get('/', 'Home::index');*/

$routes->get('/inicio', 'Inicios::index');
$routes->get('/registro', 'Registros::registros');
$routes->post('/registro/store', 'Registros::store');
$routes->post('/inicio/store', 'Registros::store2');
$routes->get('/iniciar_session', 'SesionController::login');

$routes->get('/dashboard', 'Dashboard::dash', ['filter' => 'authGuard']);
$routes->post('/sesion/stores', 'SesionController::stores');
$routes->get('/logout', 'SesionController::logout');
$routes->get('/auth/google', 'SesionController::googleLogin');
