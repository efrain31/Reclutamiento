<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Registros;
use App\Controllers\Dashboard;
use App\Controllers\Inicios;
/**
 * @var RouteCollection $routes
 */
/*$routes->get('/', 'Home::index');*/

$routes->get('/inicio', 'Inicios::index');
$routes->get('/registro', 'Registros::registros');
$routes->post('/registro/store', 'Registros::store');
$routes->post('/inicio/store', 'Registros::store2');
$routes->get('/inicio', 'Registros::login');
$routes->post('/auth', 'Registros::auth');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'authGuard']);
$routes->get('/logout', 'Registros::logout');
