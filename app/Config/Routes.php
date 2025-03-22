<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Autenticacion;
use App\Controllers\Dashboard;
use App\Controllers\Inicios;
/**
 * @var RouteCollection $routes
 */
/*$routes->get('/', 'Home::index');*/

$routes->get('/inicio', 'Inicios::index');
$routes->get('/registro', 'Autenticacion::registros');
$routes->post('/registro/store', 'Autenticacion::store');
$routes->get('/login', 'Autenticacion::login');
$routes->post('/auth', 'Autenticacion::auth');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'authGuard']);
$routes->get('/logout', 'Autenticacion::logout');
