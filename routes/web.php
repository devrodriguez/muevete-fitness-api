<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

$router->post('/auth/login', 'AuthController@userAuthenticate');
$router->post('/auth/forgotten', 'AuthController@passwordForgotten');

$router->get('/appkey', function() {
    return str_random(32);
});

$router->get('/hash/{pass}', function($pass) {
    return Hash::make($pass);
});

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

// Customers
$router->get('/customers', 'CustomerController@index');
$router->get('/customers/{id}', 'CustomerController@show');
$router->post('/customers', 'CustomerController@store');
$router->post('/customers/update', 'CustomerController@update');

//Routines
// $router->group(['middleware' => 'jwt.auth'], function() use ($router) {
//     $router->get('/routines', 'RoutineController@index');
// });

$router->get('/routines', 'RoutineController@index');
$router->get('/routines/bycategory', 'RoutineController@getRoutineCategories');
$router->post('/routines/bycategory/create', 'RoutineController@createRoutineCategory');
$router->post('/routines/bycategory/remove', 'RoutineController@removeRoutineCategory');
$router->get('/routines/bycategory/{id}', 'RoutineController@byCategory');
$router->post('/routines', 'RoutineController@store');
$router->post('/routines/update', 'RoutineController@update');
$router->get('/routines/schedule', 'RoutineController@getScheduleRoutine');
$router->get('/routines/availableDay', 'RoutineController@getRoutineAvailabilities');
$router->get('/routines/{id}', 'RoutineController@show');
$router->get('/routines/reports/scheduled', 'RoutineController@scheduled');
$router->post('/routines/schedule/remove', 'RoutineController@removeScheduleRoutine');
$router->post('/routines/schedule/create', 'RoutineController@createScheduleRoutine');
$router->post('/routines/availableDay/remove', 'RoutineController@removeRoutineAvailabilities');
$router->post('/routines/availableDay/create', 'RoutineController@createRoutineAvailability');

//Sessions
$router->get('/sessions', 'SessionController@index');
$router->post('/sessions', 'SessionController@store');
$router->post('/sessions/update', 'SessionController@update');
$router->post('/sessions/schedule', 'SessionController@schedule');
$router->get('/sessions/scheduled', 'SessionController@scheduled');
$router->get('/sessions/{id}', 'SessionController@show');
$router->post('/sessions/scheduled/cancel', 'SessionController@cancelScheduled');

//Calendar
$router->get('/calendars', 'CalendarController@index');

//Category
$router->get('/categories', 'CategoryController@index');
$router->get('/categories/routines', 'CategoryController@routines');
$router->get('/categories/routinesbyday', 'CategoryController@routinesByDay');
$router->get('/categories/{id}', 'CategoryController@show');
$router->get('/categories/{id}/routines', 'CategoryController@routinesByCategory');

//Available days
$router->get('/availableDays', 'AvailableDayController@index');

//Util
$router->post('/uploadFile', 'UtilController@uploadFile');
$router->get('/downloadFile', 'UtilController@downloadFile');
