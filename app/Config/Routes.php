<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// <------------------------------ HALAMAN ------------------------------>

$routes->get('/', 'HalamanController::login', ['filter' => 'login']);
$routes->get('/beranda', 'HalamanController::index');
$routes->post('/beranda', 'HalamanController::index');
$routes->get('/kontak', 'HalamanController::kontak');
$routes->post('/kontak/tambah', 'HalamanController::tambahFunction');
$routes->get('/register', 'HalamanController::register');
$routes->post('/register/prosesRegister', 'HalamanController::tambahUser');
$routes->get('/produk', 'HalamanController::produk');

// <------------------------------ DASHBOARD ------------------------------>

$routes->get('/dashboard', 'UtamaController::index');

// <------------------------------ DASHBOARD KONTAK ------------------------------>

$routes->get('/dashboard/kontak', 'DashboardController::dashboard');
$routes->post('/dashboard/kontak', 'DashboardController::dashboard');
$routes->get('/dashboard/kontak/edit/(:num)', 'DashboardController::edit/$1');
$routes->post('/dashboard/kontak/update/(:num)', 'DashboardController::update/$1');
$routes->get('/dashboard/kontak/delete/(:num)', 'DashboardController::delete/$1');
$routes->get('/dashboard/kontak/tambah', 'DashboardController::tambah');
$routes->post('/dashboard/kontak/tambah', 'DashboardController::tambahFunction');

// <------------------------------ DASHBOARD USER ------------------------------>

$routes->get('/dashboard/user', 'UserController::dashboardUser');
$routes->post('/dashboard/user', 'UserController::dashboardUser');
$routes->get('/dashboard/user/delete/(:num)', 'UserController::delete/$1');
$routes->get('/dashboard/user/edit/(:num)', 'UserController::edit/$1');
$routes->post('/dashboard/user/update/(:num)', 'UserController::update/$1');
$routes->get('/dashboard/user/tambah', 'UserController::tambahUser');
$routes->post('/dashboard/user/tambah', 'UserController::tambahFunction');

// <------------------------------ DASHBOARD BERITA ------------------------------>

$routes->get('/dashboard/berita', 'BeritaController::dashboardBerita');
$routes->post('/dashboard/berita', 'BeritaController::dashboardBerita');
$routes->get('/dashboard/berita/delete/(:num)', 'BeritaController::delete/$1');
$routes->get('/dashboard/berita/edit/(:num)', 'BeritaController::edit/$1');
$routes->post('/dashboard/berita/update/(:num)', 'BeritaController::update/$1');
$routes->get('/dashboard/berita/tambah', 'BeritaController::tambahBerita');
$routes->post('/dashboard/berita/tambah', 'BeritaController::tambahFunction');

// <------------------------------ DASHBOARD PRODUK ------------------------------>

$routes->get('/dashboard/produk', 'ProdukController::index');
$routes->post('/dashboard/produk', 'ProdukController::index');
$routes->get('/dashboard/produk/tambah', 'ProdukController::tambahProduk');
$routes->post('/dashboard/produk/tambah', 'ProdukController::tambahFunction');
$routes->get('/dashboard/produk/delete/(:num)', 'ProdukController::delete/$1');
$routes->get('/dashboard/produk/edit/(:num)', 'ProdukController::edit/$1');
$routes->post('/dashboard/produk/update/(:num)', 'ProdukController::update/$1');

// <------------------------------ PROFILE ------------------------------>

$routes->get('/dashboard/profile', 'ProfileController::index');
$routes->post('/dashboard/profile/update', 'ProfileController::dataUpdate');

// <------------------------------ LOGIN ------------------------------>

$routes->get('/login', 'LoginController::index');
$routes->post('/login/processLogin', 'LoginController::processLogin');
$routes->get('/login/processLogin', 'LoginController::processLogin');

// <------------------------------ LOGOUT ------------------------------>

$routes->get('/logout', 'Logout::logout_haha');
