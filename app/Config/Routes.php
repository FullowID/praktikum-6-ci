<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
	
$routes->get('/', 'Home::index',);
$routes->get('/about', 'Page::about',);
$routes->get('/contact', 'Page::contact',);
$routes->get('/faqs', 'Page::faqs',);
$routes->get('/tos', 'Page::tos',);
$routes->get('/news', 'News::index',);
$routes->get('/news/(:any)', 'News::viewNews/$1',);

$routes->group('admin',['filter' => 'authenticate'], function($routes){
	$routes->get('news', 'NewsAdmin::index');
	$routes->get('news/(:segment)/preview', 'NewsAdmin::preview/$1');
    $routes->add('news/new', 'NewsAdmin::create');
	$routes->add('news/(:segment)/edit', 'NewsAdmin::edit/$1');
	$routes->get('news/(:segment)/delete', 'NewsAdmin::delete/$1');
});


$routes->group('register', function($routes){
    $routes->get('/', 'RegisterController::index');
    $routes->post('/', 'RegisterController::store');
});

$routes->group('login', ['filter' => 'redirectIfAuthenticated'], function ($routes) {
    $routes->get('/', 'LoginController::index');
    $routes->post('/', 'LoginController::login');
});


$routes->group('logout', function ($routes) {
    $routes->get('/', 'LogoutController::index');
});
