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
$routes->get('/dish2o_admin/logout', 'admin\Logout::index');
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
$routes->post('/dish2o_admin/template/deleteUnit', 'admin\template::deleteUnit');
$routes->post('/dish2o_admin/template/updateUnitPosition', 'admin\template::updateUnitPosition');

$routes->post('/dish2o_admin/template/saveModule', 'admin\template::saveModule');
$routes->post('/dish2o_admin/template/deleteModule', 'admin\template::deleteModule');
$routes->post('/dish2o_admin/template/updateModulePosition', 'admin\template::updateModulePosition');

$routes->post('/dish2o_admin/template/saveVideo', 'admin\template::saveVideo');
$routes->post('/dish2o_admin/template/deleteVideo', 'admin\template::deleteVideo');
$routes->post('/dish2o_admin/template/updateVideoPosition', 'admin\template::updateVideoPosition');
$routes->post('/dish2o_admin/template/saveVideo', 'admin\template::saveVideo');

$routes->get('/dish2o_admin/template/getUnitSuggestion', 'admin\template::getUnitSuggestion');
$routes->get('/dish2o_admin/template/getModuleSuggestion', 'admin\template::getModuleSuggestion');
$routes->get('/dish2o_admin/template/getVideoSuggestion', 'admin\template::getVideoSuggestion');
$routes->get('/dish2o_admin/template/getfalcultySuggestion', 'admin\template::getfalcultySuggestion');

$routes->post('/dish2o_admin/template/getVideoCoordinatorDetails', 'admin\template::getVideoCoordinatorDetails');
$routes->post('/dish2o_admin/template/updateVideoCoordinator', 'admin\template::updateVideoCoordinator');
$routes->post('/dish2o_admin/template/addRecordingSchedule', 'admin\template::addRecordingSchedule');
$routes->post('/dish2o_admin/template/addEditingSchedule', 'admin\template::addEditingSchedule');
$routes->post('/dish2o_admin/template/addVettingSchedule', 'admin\template::addVettingSchedule');

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
$routes->post('/dish2o_admin/faculties/addnewcollege', 'admin\Faculty::addNewCollege');
$routes->post('/dish2o_admin/faculties/deletefacultycollege', 'admin\Faculty::deleteFacultyCollege');
$routes->get('/dish2o_admin/faculties/resource', 'admin\Faculty::resource');

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

//Manage Blog
$routes->get('/dish2o_admin/blog', 'admin\Blog::index');
$routes->get('/dish2o_admin/blog/addnew', 'admin\Blog::addnew');
$routes->post('/dish2o_admin/blog/save', 'admin\Blog::save');
$routes->post('/dish2o_admin/blog/edit', 'admin\Blog::edit');
$routes->post('/dish2o_admin/blog/update', 'admin\Blog::update');
$routes->get('/dish2o_admin/blog/resource', 'admin\Blog::resource');

//Manage Vetter
$routes->get('/dish2o_admin/Programmecourse/vetter', 'admin\ProgrammeCourse::fetchvetterData');
$routes->get('/dish2o_admin/Programmecourse/vetteruploadcontentType', 'admin\ProgrammeCourse::vetterUploadContentType');

//Profile
$routes->get('/dish2o_admin/profile', 'admin\Profile::index');

/*
$routes->post('/dish2o_admin/colleges/edit', 'admin\College::edit');
$routes->post('/dish2o_admin/colleges/update', 'admin\College::update');*/