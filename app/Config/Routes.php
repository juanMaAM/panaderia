<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');



$routes->get('/categorias','Categorias::index');
$routes->get('/login','Usuarios::index');

$routes->get('/usuario/salir','Usuarios::salir');
$routes->post('/usuario/acceder','Usuarios::acceder');

$routes->get('/usuario/registro','Usuarios::registrar');
$routes->post('/usuario/insert','Usuarios::insert');


$routes->get('/categorias/add','Categorias::add');
$routes->post('/categorias/insert','Categorias::insert');

$routes->get('/categorias/edit/(:num)','Categorias::edit/$1');
$routes->post('/categorias/update/','Categorias::update/');

$routes->get('/categorias/delete/(:num)','Categorias::delete/$1');


$routes->get('/productos', 'Productos::index'); 

$routes->get('/producto/add', 'Productos::add');
$routes->post('/producto/insert', 'Productos::insert');

$routes->get('/producto/edit/(:num)', 'Productos::edit/$1');
$routes->post('/producto/update', 'Productos::update'); 

$routes->get('/producto/delete/(:num)', 'Productos::delete/$1');

$routes->get('/productos/visualizar', 'Productos::visualizar');


$routes->get('/locales', 'Locales::index');

$routes->get('/locales/edit/(:num)', 'Locales::edit/$1');
$routes->post('/locales/update', 'Locales::update');




$routes->get('usuariosA', 'Usuarios::index');

$routes->get('usuariosA/add', 'Usuarios::add');
$routes->post('usuariosA/inserta', 'Usuarios::inserta');

$routes->get('usuariosA/edit/(:num)', 'Usuarios::edit/$1');
$routes->post('usuariosA/update/(:num)', 'Usuarios::update/$1');

$routes->get('usuariosA/delete/(:num)', 'Usuarios::delete/$1');


