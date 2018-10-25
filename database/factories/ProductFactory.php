<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'image_url' => $faker->imageUrl($width = 640, $height = 480),
        'price' => $faker->biasedNumberBetween($min = 10000, $max = 100000, $function = 'sqrt'),
        'stock' => $faker->biasedNumberBetween($min = 1, $max = 100, $function = 'sqrt'),
    ];
});
