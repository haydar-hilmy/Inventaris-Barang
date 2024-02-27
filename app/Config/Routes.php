<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'Home::login');
$routes->post('/login/auth', 'Home::auth');

$routes->get('/dashboard', 'Home::home');
