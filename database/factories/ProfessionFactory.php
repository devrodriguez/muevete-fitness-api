<?php

use Faker\Generator as Faker;

$factory->define(App\Profession::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});
