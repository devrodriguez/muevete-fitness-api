<?php

use Faker\Generator as Faker;

$factory->define(App\Routine::class, function(Faker $faker) {
    return [
        "name" => "Kick Boxing",
        "description" => "Fight doing excersice"
    ];
});