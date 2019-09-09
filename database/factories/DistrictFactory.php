<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\District::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'total_schools' => $faker->randomNumber(),
        'total_teachers' => $faker->randomNumber(),
        'total_g1' => $faker->randomNumber(),
        'total_g2' => $faker->randomNumber(),
        'total_g3' => $faker->randomNumber(),
        'total_g4' => $faker->randomNumber(),
        'total_g5' => $faker->randomNumber(),
        'total_g6' => $faker->randomNumber(),
        'region_id' => $faker->numberBetween(1, 17),
        'division_id' => $faker->numberBetween(1, 215)
    ];
});
