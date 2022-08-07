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
$routes->set404Override(function () {
	return view('error404');
});
// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
// about us route
$routes->get('about', 'Home::about');
// contact us route 
$routes->get('contact', 'Home::contact');
// Post route
$routes->get('post/(:any)', 'Home::post/$1');
$routes->get('posts/category/(:any)', 'Home::category_post/$1');


// General Controller :: No Auth 
$routes->group('auth', ['namespace' => 'App\Controllers'], function ($routes) {
	// Registration 
	$routes->get('register', 'Auth\Register::index');
	$routes->post('register', 'Auth\Register::register');


	//Login
	$routes->get('login', 'Auth\Login::index');
	$routes->post('login', 'Auth\Login::login');

});


$routes->group('admin', ['namespace' => 'App\Controllers\Admin', "filter" => "auth"], function ($routes) {

	// ADMIN DASHBOARD
	$routes->get('dashboard', 'Admin::index', ['as' => 'dashboard']);
	// $routes->get('users', 'Admin::users', ['as' => 'users']);

	// User payment route
	$routes->get('payments', 'Admin::payments', ['as' => 'payments']);
	$routes->get('payment/(:any)', 'Admin::payment/$1');
	$routes->post('payment/approve', 'Admin::approve_payment');

	// Post  & Category Route
	$routes->get('post/create', 'Post::create', ['as' => 'create']);
	$routes->get('post/category/create', 'Post::create_category', ['as' => 'create_category']);
	$routes->post('post/category/update', 'Post::category_update', ['as' => 'category_update']);
	$routes->post('post/category/destroy', 'Post::category_destroy', ['as' => 'category_destroy']);
	$routes->post('post/category/save', 'Post::store_category', ['as' => 'store_category']);
	$routes->get('post', 'Post::index', ['as' => 'index']);
	$routes->post('post/save', 'Post::post_store', ['as' => 'post_store']);
	$routes->get('post/edit/(:any)', 'Post::edit/$1');
	$routes->post('post/update_post/(:any)', 'Post::update_post/$1', ['as' => 'update_post']);
	$routes->post('post/destroy', 'Post::destroy');


	// Announcement Route
	$routes->get('announcement', 'AnnouncementController::announce', ['as' => 'announce']);
	$routes->get('announcement/create', 'AnnouncementController::create_page', ['as' => 'create_page']);
	$routes->post('announcement/store', 'AnnouncementController::store_annoucement', ['as' => 'store_annoucement']);
	$routes->post('announcement/destroy', 'AnnouncementController::delete_annoucement', ['as' => 'delete_annoucement']);
	$routes->get('announcement/edit/(:any)', 'AnnouncementController::edit_annoucement/$1', ['as' => 'edit_annoucement']);
	$routes->post('announcement/update/(:any)', 'AnnouncementController::update_annoucement/$1', ['as' => 'update_annoucement']);

	//Prgram Route
	$routes->get('programs', 'ProgramsController::view');
	$routes->get('programs/create', 'ProgramsController::create');
	$routes->post('programs/store', 'ProgramsController::store');
	$routes->get('program/edit/(:any)', 'ProgramsController::edit/$1');
	$routes->post('program/update', 'ProgramsController::update');
	$routes->get('program/destroy/(:any)', 'ProgramsController::destroy/$1');
	
	// Manage Users
	$routes->get('users', 'ManageUsers::index');
	$routes->get('user/create', 'ManageUsers::create');
	$routes->post('user/store', 'ManageUsers::store');
	$routes->get('user/edit/(:any)', 'ManageUsers::edit/$1');
	$routes->post('user/update', 'ManageUsers::update');
	$routes->post('user/destroy', 'ManageUsers::destroy');

});


// Customer Route 
$routes->group('user', ['namespace' => 'App\Controllers\Customer', "filter" => "auth"], function ($routes) {
	$routes->get('dashboard', 'Dashboard::index');
	$routes->post('biodata/update', 'Dashboard::update_biodata');
	$routes->get('announcement', 'Dashboard::announcement');
	$routes->get('payments', 'Dashboard::payments');
	$routes->get('settings', 'Dashboard::settings');
	$routes->get('program/apply/(:any)', 'Dashboard::apply/$1');
	$routes->post('program/apply', 'Dashboard::apply_program');
	$routes->get('posts', 'Dashboard::posts');
	$routes->post('profile/update', 'Dashboard::profile');
	$routes->post('password/update', 'Dashboard::update_password');
});

$routes->group('', ['namespace' => 'App\Controllers', "filter" => "auth"], function ($routes) {

	// ADMIN DASHBOARD
	$routes->get('logout', 'Auth\Login::logout');
	$routes->get('user/logout', 'Auth\Login::userLogout');
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
