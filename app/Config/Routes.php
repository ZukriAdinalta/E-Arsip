<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
// $routes->get('/home', 'Home::index',['filter' => 'Login']);

$routes->group('/', ['filter' => 'Login'], function($routes) {
    $routes->get('home', 'Home::index');
    $routes->get('user', 'User::index');
    $routes->get('arsip', 'Arsip::index');
    $routes->get('departemen', 'Departemen::index');
    $routes->get('kategori', 'Kategori::index');

});

$routes->group('login', function ($routes) {
    $routes->get('/', 'Login::index');
    $routes->post('/', 'Login::login');
});

$routes->group('user', function ($routes) {
    $routes->get('/add', 'User::add');
    $routes->post('/save', 'User::save');
    $routes->post('/update', 'User::update');
    $routes->get('/edit/(:segment)', 'User::edit/$1');
    $routes->delete('/delete/(:num)', 'User::delete/$1');
});

$routes->group('arsip', function ($routes) {
    $routes->get('/add', 'Arsip::add');
    $routes->post('/save', 'Arsip::save');
    $routes->get('/edit/(:num)', 'Arsip::edit/$1');
    $routes->get('/viewpdf/(:num)', 'Arsip::viewpdf/$1');
    $routes->delete('/delete/(:num)', 'Arsip::delete/$1');
});


$routes->group('logout', function ($routes) {
    $routes->get('/', 'Login::logout');
});
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}