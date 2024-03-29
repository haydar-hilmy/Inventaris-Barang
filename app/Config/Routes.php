<?php

use App\Controllers\BarangController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'Home::login');
$routes->post('/login/auth', 'Home::auth');

$routes->get('/dashboard', 'Home::home');

$routes->get('/barang', 'BarangController');
$routes->post('/barang/addbarang', 'BarangController::addBarang');
$routes->get('barang/get_data/id_barang/(:num)', 'BarangController::edit/$1');
$routes->post('/barang/update/(:num)', 'BarangController::update/$1');
$routes->post('/barang/del/(:num)', 'BarangController::delete/$1');
$routes->post('/barang/getJumlahBarang/(:num)', 'BarangController::getJumlahBarang/$1');


$routes->get('/barang_masuk', 'BarangController::barangMasuk');
$routes->get('/barang_keluar', 'BarangController::barangKeluar');

$routes->post('/barang/masuk', 'BarangController::addBarangMasuk');

// pencarian
$routes->post('/caribarang/(:any)', 'BarangController::getSearch/$1');
$routes->post('/caribarang', 'BarangController::getSearch');

$routes->get('/logout', 'Home::logout');