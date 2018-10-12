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

$router->get('/trainers', function () use ($router) {
    return [
        ["name" => "John Edisson Rodriguez", "profession" => "Personal Trainer", "image" => "john-rodriguez.jpg"],
        ["name" => "Mayra Liliana Sanabria", "profession" => "Personal Trainer", "image" => "lili.png"]
    ];
});

$router->get('/professions', function () use ($router) {
    return [
        ["name" => "Personal Trainer", "Description" => "PT"],
        ["name" => "Coach", "Description" => "C"]
    ];
});
