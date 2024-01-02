<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


/**
 * Website routes
 */
$routes->get('/', 'Home::index');

/**
 * Admin panel routes
 */
$routes->get('/dish2o_admin', 'admin\Login::index');
$routes->post('/dish2o_admin/login', 'admin\Login::index');
$routes->post('/dish2o_admin/validatelogin', 'admin\Login::validatelogin');
$routes->get('/dish2o_admin/home', 'admin\Home::index', ['as' => 'adminhome']);

//Manage Colleges
$routes->get('/dish2o_admin/colleges', 'admin\College::index');
$routes->get('/dish2o_admin/colleges/addnew', 'admin\College::addnew');
$routes->post('/dish2o_admin/colleges/save', 'admin\College::save');
$routes->post('/dish2o_admin/colleges/edit', 'admin\College::edit');
$routes->post('/dish2o_admin/colleges/update', 'admin\College::update');

//Manage Template
$routes->get('/dish2o_admin/template', 'admin\Template::index');
$routes->post('/dish2o_admin/template/saveUnit', 'admin\template::saveUnit');
$routes->get('/dish2o_admin/template/deleteUnit', 'admin\template::deleteUnit');


//Manage Programmes
$routes->get('/dish2o_admin/programmes', 'admin\Programme::index');
$routes->get('/dish2o_admin/programmes/addnew', 'admin\Programme::addnew');
$routes->post('/dish2o_admin/programmes/save', 'admin\Programme::save');
$routes->post('/dish2o_admin/programmes/edit', 'admin\Programme::edit');
$routes->post('/dish2o_admin/programmes/update', 'admin\Programme::update');

//Manage Faculty
$routes->get('/dish2o_admin/faculties', 'admin\Faculty::index');
$routes->get('/dish2o_admin/faculties/addnew', 'admin\Faculty::addnew');
$routes->post('/dish2o_admin/faculties/save', 'admin\Faculty::save');
$routes->post('/dish2o_admin/faculties/facultypersonaldetails', 'admin\Faculty::fetchfacultypersonalDetails');
$routes->post('/dish2o_admin/faculties/update', 'admin\Faculty::update');
$routes->post('/dish2o_admin/faculties/deleteProfile', 'admin\Faculty::deleteProfile');
/*
$routes->post('/dish2o_admin/colleges/edit', 'admin\College::edit');
$routes->post('/dish2o_admin/colleges/update', 'admin\College::update');*/