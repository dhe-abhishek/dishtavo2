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
$routes->get('/dish2o_admin/login', 'admin\Login::index');
$routes->post('/dish2o_admin/validatelogin', 'admin\Login::validatelogin');
$routes->get('/dish2o_admin/home', 'admin\Home::index', ['as' => 'adminhome']);

//Manage Colleges
$routes->get('/dish2o_admin/colleges', 'admin\College::index');
$routes->get('/dish2o_admin/colleges/addnew', 'admin\College::addnew');
$routes->post('/dish2o_admin/colleges/save', 'admin\College::save');
$routes->post('/dish2o_admin/colleges/edit', 'admin\College::edit');
$routes->post('/dish2o_admin/colleges/update', 'admin\College::update');

//Manage Template
$routes->post('/dish2o_admin/template', 'admin\Template::index');

$routes->post('/dish2o_admin/template/saveUnit', 'admin\template::saveUnit');
$routes->post('/dish2o_admin/template/deleteUnit', 'admin\template::deleteUnit');
$routes->post('/dish2o_admin/template/updateUnitPosition', 'admin\template::updateUnitPosition');

$routes->post('/dish2o_admin/template/saveModule', 'admin\template::saveModule');
$routes->post('/dish2o_admin/template/deleteModule', 'admin\template::deleteModule');
$routes->post('/dish2o_admin/template/updateModulePosition', 'admin\template::updateModulePosition');

$routes->post('/dish2o_admin/template/saveVideo', 'admin\template::saveVideo');
$routes->post('/dish2o_admin/template/deleteVideo', 'admin\template::deleteVideo');
$routes->post('/dish2o_admin/template/updateVideoPosition', 'admin\template::updateVideoPosition');
$routes->post('/dish2o_admin/template/saveVideo', 'admin\template::saveVideo');

$routes->post('/dish2o_admin/template/getVideoSuggestion', 'admin\template::getVideoSuggestion');
$routes->post('/dish2o_admin/template/getUnitSuggestion', 'admin\template::getUnitSuggestion');
$routes->post('/dish2o_admin/template/getNonAddedLanguageVideos', 'admin\template::getNonAddedLanguageVideos');
$routes->post('/dish2o_admin/template/getNonAddedLanguages', 'admin\template::getNonAddedLanguages');


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

//Manage Video
$routes->get('/dish2o_admin/videos', 'admin\Video::index');
$routes->get('/dish2o_admin/videos/addnew', 'admin\Video::addnew');
$routes->post('/dish2o_admin/videos/save', 'admin\Video::save');
$routes->post('/dish2o_admin/videos/edit', 'admin\Video::edit');
$routes->post('/dish2o_admin/videos/videodetails', 'admin\Video::fetchvideoDetails');
$routes->post('/dish2o_admin/videos/update', 'admin\Video::update');
$routes->post('/dish2o_admin/videos/deleteVideo', 'admin\Video::deleteVideo');

//Manage Modules
$routes->get('/dish2o_admin/modules', 'admin\Module::index');
$routes->get('/dish2o_admin/modules/addnew', 'admin\Module::addnew');
$routes->post('/dish2o_admin/modules/save', 'admin\Module::save');
$routes->post('/dish2o_admin/modules/edit', 'admin\Module::edit');
$routes->post('/dish2o_admin/modules/moduledetails', 'admin\Module::fetchmoduleDetails');
$routes->post('/dish2o_admin/modules/update', 'admin\Module::update');
$routes->post('/dish2o_admin/modules/deletemodule', 'admin\Module::deletemodule');


//Manage ProgrammeCourse
$routes->get('/dish2o_admin/Programmecourse', 'admin\ProgrammeCourse::index');
$routes->get('/dish2o_admin/Programmecourse/addnew', 'admin\ProgrammeCourse::addnew');
$routes->post('/dish2o_admin/Programmecourse/save', 'admin\ProgrammeCourse::save');
$routes->post('/dish2o_admin/Programmecourse/edit', 'admin\ProgrammeCourse::edit');
$routes->post('/dish2o_admin/Programmecourse/update', 'admin\ProgrammeCourse::update');
$routes->get('/dish2o_admin/Programmecourse/quaddata', 'admin\ProgrammeCourse::fetchquadData');
$routes->post('/dish2o_admin/Programmecourse/assignfacultytomodule', 'admin\ProgrammeCourse::assignFacultyToModule');
$routes->post('/dish2o_admin/Programmecourse/detachfacultytomodule', 'admin\ProgrammeCourse::detachFacultyToModule');
$routes->post('/dish2o_admin/Programmecourse/uploadquaddata', 'admin\ProgrammeCourse::uploadQuadData');
$routes->get('/dish2o_admin/Programmecourse/showquadfile', 'admin\ProgrammeCourse::showQuadFile');

//Manage UEA
$routes->get('/dish2o_admin/Programmecourse/uea', 'admin\ProgrammeCourse::fetchuea');
$routes->post('/dish2o_admin/Programmecourse/uploaduea', 'admin\ProgrammeCourse::uploadUEA');
$routes->get('/dish2o_admin/Programmecourse/showueafile', 'admin\ProgrammeCourse::showUEAFile');
$routes->post('/dish2o_admin/Programmecourse/deleteuea', 'admin\ProgrammeCourse::deleteUEA');

//Manage Vetter
$routes->get('/dish2o_admin/Programmecourse/vetter', 'admin\ProgrammeCourse::fetchvetterData');

/*
$routes->post('/dish2o_admin/colleges/edit', 'admin\College::edit');
$routes->post('/dish2o_admin/colleges/update', 'admin\College::update');*/