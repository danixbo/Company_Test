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

$routes->get('/dashboard/kontak', 'DashboardController::dashboard');
$routes->get('/index.php/dashboard/kontak', 'DashboardController::index');
$routes->get('/login/kontak/dashboard', 'DashboardController::loginDasboard');
$routes->get('/dashboard/kontak/edit/(:num)', 'DashboardController::edit/$1');
$routes->post('/dashboard/kontak/update/(:num)', 'DashboardController::update/$1');
$routes->get('/dashboard/kontak/delete/(:num)', 'DashboardController::delete/$1');
$routes->get('/dashboard/kontak/tambah', 'DashboardController::tambah');
$routes->post('/dashboard/kontak/tambah', 'DashboardController::tambahFunction');

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

// <------------------------------ LOGOUT ------------------------------>

$routes->get('/logout', 'Logout::logout_haha');
