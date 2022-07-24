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
$routes->setDefaultController('Dashboard');
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

//ci membuat jalur ketika akses method req adl get
//alamatnya adl / berarti route(uml utama)
//arahkan ke controller Dashboard yang methodnya index
$routes->get('/', 'Dashboard::index');
$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/login', 'Authentikasi::index');
$routes->post('/login', 'Authentikasi::do_login');
$routes->get('/register', 'Authentikasi::register');
$routes->post('/register', 'Authentikasi::do_register');
$routes->get('/logout', 'Authentikasi::logout');

$routes->get('/produk', 'Produk::index');
$routes->get('/produk/add', 'Produk::add');
$routes->get('/produk/edit/(:segment)', 'Produk::edit/$1');
$routes->delete('/produk/(:num)', 'Produk::delete/$1');

$routes->get('/supplier', 'Supplier::index');
$routes->add('/supplier/add', 'Supplier::add');
$routes->get('/supplier/edit/(:segment)', 'Supplier::edit/$1');
$routes->delete('/supplier/(:num)', 'Supplier::delete/$1');

$routes->get('/detailpenjualan', 'DetailPenjualan::index');
$routes->get('/detailpenjualan/add', 'DetailPenjualan::add');

$routes->post('/getdetailproduk', 'DetailPenjualan::getdetailproduk');


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
