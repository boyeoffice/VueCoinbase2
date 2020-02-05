<?php

use Faker\Generator as Faker;

$factory->define(App\Sale::class, function (Faker $faker) {
    return [
        'products' => $faker->randomNumber(1),
        'date' => $faker->date,
        'sum_total' => $faker->randomNumber(4)
    ];
});
