<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// <------------------------------ HALAMAN ------------------------------>

$routes->get('/', 'HalamanController::index', ['filter' => 'login']);
$routes->get('/kontak', 'HalamanController::kontak');
$routes->get('/register', 'HalamanController::register');


// <------------------------------ DASHBOARD KONTAK ------------------------------>

$routes->get('/dashboard', 'DashboardController::dashboard');
$routes->get('/index.php/dashboard', 'DashboardController::index');
$routes->get('/login/dashboard', 'DashboardController::loginDasboard');
$routes->get('/dashboard/edit/(:num)', 'DashboardController::edit/$1');
$routes->post('/dashboard/update/(:num)', 'DashboardController::update/$1');
$routes->get('/dashboard/delete/(:num)', 'DashboardController::delete/$1');
$routes->get('/dashboard/tambah', 'DashboardController::tambah');
$routes->post('/dashboard/tambah', 'DashboardController::tambahFunction');

// <------------------------------ DASHBOARD USER ------------------------------>

$routes->get('/dashboard/user', 'UserController::dashboardUser');
$routes->get('/dashboard/user/tambah', 'UserController::tambahUser');
$routes->post('/dashboard/user/tambah', 'UserController::tambahFunction');
$routes->get('/dashboard/user/delete/(:num)', 'UserController::delete/$1');
$routes->get('/dashboard/user/edit/(:num)', 'UserController::edit/$1');
$routes->post('/dashboard/user/update/(:num)', 'UserController::update/$1');

// <------------------------------ LOGIN ------------------------------>

$routes->get('/login', 'LoginController::index');
$routes->post('/login/processLogin', 'LoginController::processLogin');
$routes->get('/login/processLogin', 'LoginController::processLogin');
