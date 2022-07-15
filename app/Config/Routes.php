<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */
$routes->set404Override(function(){
	return view('error404');
  });
// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
// about us route
$routes->get('about', 'Home::about');
// contact us routen9-mo=0
$routes->get('contact', 'Home::contact');


$routes->group('', ['namespace' => 'App\Controllers'], function($routes) {
	// Registration
	$routes->get('register', 'Auth\Register::index');
	$routes->post('register', 'Auth\Register::save',['as'=>'register']);
   
    // Login
    $routes->get('admin/login', 'Auth\Login::index');
    $routes->post('login', 'Auth\Login::login');
});

$routes->group('customer', ['namespace' => 'App\Controllers'], function($routes) {
	//Customer Registration
	$routes->get('payment', 'Customer\Register::index',['as'=>'signup']);
	$routes->post('payment/store', 'Customer\Register::store',['as'=>'store']);
	// $routes->get('register/(:num)', 'Register::index/$1');
   
    // Login
    $routes->get('customer/login', 'Auth\Login::index');
    $routes->post('login', 'Auth\Login::login');
});


$routes->group('admin', ['namespace' => 'App\Controllers\Admin',"filter" => "auth"], function($routes) {

	// ADMIN DASHBOARD
	$routes->get('dashboard', 'Admin::index',['as'=>'dashboard']);
	$routes->get('users', 'Admin::users',['as'=>'users']);
	$routes->get('payments', 'Admin::payments',['as'=>'payments']);

  });


$routes->group('customer', ['namespace' => 'App\Controllers\Customer',"filter" => "auth"], function($routes) {

	// Customer DASHBOARD
	$routes->get('dashboard', 'Customer::index',['as'=>'customer']);

	// $routes->get('users', 'Admin::users',['as'=>'users']);

  });

$routes->group('', ['namespace' => 'App\Controllers',"filter" => "auth"], function($routes) {

	// ADMIN DASHBOARD
$routes->get('logout', 'Auth\Login::logout');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
