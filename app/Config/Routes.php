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
$routes->setDefaultController('Login');
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

// Display Index
$routes->add('login', 'user_auth\Login::index');
$routes->add('home', 'Dashboard::index');
$routes->add('board', 'master\Board::index');
$routes->add('list', 'master\Lists::index');

// Login Process
$routes->add('auth', 'user_auth\Login::auth');
$routes->add('logout', 'user_auth\Login::logout');

// Form
$routes->add('board/form', 'master\Board::form');

// Append List
$routes->add('board/formAddList', 'master\Board::formList');
$routes->add('board/formAddList/(:any)', 'master\Board::formList/$1');
$routes->add('list/addList', 'master\Board::addList');
$routes->add('board/editList', 'master\Board::editList');
$routes->add('board/deleteList', 'master\Board::deleteList');

// Submit Form Process
// Board
$routes->add('board/bid/(:any)', 'master\Board::goList/$1');
$routes->add('board/count', 'master\Board::countBoard');
$routes->add('board/addBoard', 'master\Board::addBoard');
$routes->add('board/switch', 'master\Board::switch');

// Select2
$routes->add('list/getList', 'master\Board::getList');
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
