<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'Home::login');
$routes->post('/login/auth', 'Home::auth');

$routes->get('/dashboard', 'Home::home');
$routes->get('/barang', 'BarangController');
$routes->get('/barang_masuk', 'BarangController::barangMasuk');
$routes->get('/barang_keluar', 'BarangController::barangKeluar');


$routes->get('/logout', 'Home::logout');
