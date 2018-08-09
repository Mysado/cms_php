<?php

$router->get('', 'PageController@home');

$router->get('login', 'PageController@login');
$router->post('login', 'LoginController@validate');

$router->get('recovery', 'PageController@recovery');
$router->post('recovery', 'RecoveryController@recover');

$router->get('register', 'PageController@register');
$router->post('register', 'RegisterController@validate');

$router->get('dashboard', 'PageController@dashboard');
$router->get('company', 'CompanyController@company');
$router->get('addCompany', 'CompanyController@addCompany');
$router->post('addCompany', 'CompanyController@validateAdd');


$router->get('editCompany', 'CompanyController@editCompany');
$router->post('editCompany', 'CompanyController@validateEdit');

$router->post('deleteCompany', 'CompanyController@deleteCompany');

$router->get('sellers', 'SellerController@sellers');
$router->get('addSeller', 'SellerController@addSeller');
$router->post('addSeller', 'SellerController@validateAdd');

$router->get('editSeller', 'SellerController@editSeller');
$router->post('editSeller', 'SellerController@validateEdit');

$router->post('deleteSeller', 'SellerController@deleteSeller');

$router->get('contacts', 'ContactController@contacts');
$router->get('addContact', 'ContactController@addContact');
$router->post('addContact', 'ContactController@validateAdd');

$router->get('editContact', 'ContactController@editContact');
$router->post('editContact', 'ContactController@validateEdit');

$router->post('deleteContact', 'ContactController@deleteContact');

$router->get('photos', 'FilesController@photos');
$router->post('photos', 'FilesController@uploadPhoto');
$router->post('deletePhotos', 'FilesController@deletePhoto');


$router->post('logout', 'LoginController@logout');
$router->get('dashboardSeller', 'PageController@dashboardSeller');

$router->get('questions', 'QuestionController@questions');
$router->get('addQuestion', 'QuestionController@addQuestion');
$router->post('addQuestion', 'QuestionController@validateAdd');
$router->get('editQuestion', 'QuestionController@editQuestion');
$router->post('editQuestion', 'QuestionController@validateEdit');

$router->post('deleteQuestion', 'QuestionController@deleteQuestion');
$router->get('questionary', 'QuestionController@questionary');

$router->post('answerQuestion', 'QuestionController@answerQuestion');

