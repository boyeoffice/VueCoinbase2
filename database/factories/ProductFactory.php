<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'price' => $faker->randomNumber,
        'type' => $faker->randomNumber(1),
        'manufacturer' => $faker->company
    ];
});
