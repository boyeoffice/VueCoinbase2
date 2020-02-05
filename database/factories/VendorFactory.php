<?php

use Faker\Generator as Faker;

$factory->define(App\Vendor::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'staff_number' => $faker->randomNumber(1)
    ];
});
