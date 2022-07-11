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
$routes->add('/', 'user_auth\Login::index');
$routes->add('home', 'Dashboard::index');
$routes->add('boards', 'master\Board::index');
$routes->add('recursive', 'Recursive::index');

// Login Process
$routes->add('auth', 'user_auth\Login::auth');
$routes->add('login', 'user_auth\Login::index');
$routes->add('logout', 'user_auth\Login::logout');

// Form
$routes->add('board/form', 'master\Board::form');
// Form Process
// Board
$routes->add('board/b/(:any)', 'master\Board::goList/$1');
$routes->add('board/count', 'master\Board::countBoard');
$routes->add('board/addBoard', 'master\Board::addBoard');
$routes->add('board/editBoard', 'master\Board::editBoard');
$routes->add('board/delBoard', 'master\Board::deleteBoard');
$routes->add('board/getUser', 'master\Board::getUser');
$routes->add('board/b', 'master\Board::board');
$routes->add('board/FormViews', 'master\Board::FormViews');
$routes->add('board/EditViews/(:any)', 'master\Board::FormViews/$1');
$routes->add('board/share', 'master\Board::shareBoard');
$routes->add('board/out', 'master\Board::clean');
// Task
$routes->add('task/formAdd', 'master\Tasks::FormViews');
$routes->add('task/addTask', 'master\Tasks::addTask');
$routes->add('task/editData', 'master\Tasks::editData');
$routes->add('task/swap', 'master\Tasks::swap');
$routes->add('task/t', 'master\Tasks::task');
$routes->add('task/a', 'master\Tasks::addF');
$routes->add('task/delete', 'master\Tasks::deleteData');
// TaskList
$routes->add('list/load', 'master\Tasklist::item');
$routes->add('list/formAdd', 'master\Tasklist::FormViews');
$routes->add('list/editView/(:any)', 'master\Tasklist::FormViews/$1');
$routes->add('list/addData', 'master\Tasklist::addData');
$routes->add('list/editData', 'master\Tasklist::editData');
$routes->add('list/delete', 'master\Tasklist::deleteData');
$routes->add('list/switch', 'master\Tasklist::switch');
// TaskList-Comment
$routes->add('comment/add', 'master\Tasklist::addComment');
$routes->add('comment/reply', 'master\Tasklist::reply');
$routes->add('comment/addReply', 'master\Tasklist::addReply');
$routes->add('comment/editReply', 'master\Tasklist::editReply');
$routes->add('comment/edit', 'master\Tasklist::editComment');
$routes->add('comment/delete', 'master\Tasklist::deleteComment');
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
