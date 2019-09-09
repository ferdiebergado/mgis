<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Region::class, function (Faker $faker) {
    return [
        'sequence' => $faker->randomNumber(),
        'name' => $faker->name,
        'area' => $faker->randomElement(['L', 'V', 'M']),
        'active' => $faker->numberBetween(0, 1),
    ];
});
