<?php

use Faker\Generator as Faker;

$factory->define(App\Trainer::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'profession' => $faker->jobTitle,
        'image_url' => $faker->imageUrl($width = 640, $height = 480)
    ];
});
