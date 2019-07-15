<?php

use Faker\Generator as Faker;

$factory->define(App\Session::class, function(Faker $faker) {
    return [
        "name" => "5 a 6",
        "startHour" => 5,
        "finalHour" => 6,
        "period" => "am"
    ];
});