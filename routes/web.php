<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/trainers', 'TrainerController@index');
$router->get('/trainers/{id}', 'TrainerController@show');
$router->post('/trainers', 'TrainerController@store');
$router->put('/trainers/{id}', 'TrainerController@update');
$router->delete('/trainers/{id}', 'ProfessionController@destroy');

$router->get('/professions', 'ProfessionController@index');
$router->get('/professions/{id}', 'ProfessionController@show');
$router->post('/professions', 'ProfessionController@store');
$router->put('/professions/{id}', 'ProfessionController@update');
$router->delete('/professions/{id}', 'ProfessionController@destroy');

$router->get('/products', 'ProductController@index');
$router->get('/products/{id}', 'ProductController@show');
$router->post('/products', 'ProductController@store');
$router->put('/products/{id}', 'ProductController@update');
$router->delete('/products/{id}', 'ProductController@destroy');
