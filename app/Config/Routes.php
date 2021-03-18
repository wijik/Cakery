<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('login', 'Auth::login');
$routes->get('register', 'Auth::regsiter');

$routes->group('', ['filter' => 'auth'], function ($routes) {
	$routes->get('dashboard', 'Admin::index');
	$routes->get('/barang', 'Barang::index');
	$routes->post('/barang/beli/(:segment)', 'Barang::beli/$1');
	$routes->get('/barang/category/(:segment)', 'Barang::category/$1');

	$routes->get('/dompet/edit/(:segment)', 'Dompet::edit/$1');
	$routes->delete('/dompet/delete', 'Dompet::delete/$1');

	$routes->get('/blog', 'Blog::index');
	$routes->get('/blog/create', 'Blog::create');
	$routes->post('/blog/save', 'Blog::save');
	$routes->get('/blog/edit/(:segment)', 'Blog::edit/$1');
	$routes->delete('/blog/delete', 'Blog::delete/$1');

	$routes->delete('/notif/delete', 'Admin::delete/$1');

	$routes->get('/artikel/(:any)', 'Artikel::detail/$1');

	$routes->get('/user/', 'User::index');
	$routes->get('/user/edit', 'User::edit');

	$routes->post('/cart/create/(:segment)', 'Cart::create/$1');
	$routes->get('/cart', 'Cart::index');
	$routes->post('/cart/update/(:num)', 'Cart::update/$1');
	$routes->delete('/cart/remove/', 'Cart::delete/$1');

	$routes->get('/transaksi', 'Transaksi::index');
	$routes->post('/komentar/create/(:segment)', 'Komentar::create/$1');
	$routes->delete('/komentar/delete/(:num)', 'Komentar::delete/$1');

	$routes->get('bahan', 'Bahan::index');
	$routes->get('bahan/create', 'Bahan::create');
	$routes->get('bahan/edit/(:segment)', 'Bahan::edit/$1');
	$routes->post('/bahan/save', 'Bahan::save');
	$routes->delete('bahan/delete', 'Bahan::delete/$1');

	// $routes->get('JenisKue', 'JenisKue::index');
	// $routes->get('JenisKue/create', 'JenisKue::create');
	// $routes->get('/JenisKue/edit/(:segment)', 'JenisKue::edit/$1');
	// $routes->post('/JenisKue/save', 'JenisKue::save');
	// $routes->delete('JenisKue/delete', 'JenisKue::delete/$1');

	$routes->get('/barang/(:segment)', 'Barang::view/$1');
	$routes->get('/kue/view/(:segment)', 'Kue::view/$1');
	$routes->get('/JenisKue/view/(:segment)', 'JenisKue::view/$1');
});

/**
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
