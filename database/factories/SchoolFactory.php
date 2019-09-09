<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\School::class, function (Faker $faker) {
    return [
        'schid' => $faker->unique()->randomNumber(),
        'name' => $faker->name,
        'type' => $faker->word,
        'total_teachers' => $faker->randomNumber(),
        'g1' => $faker->randomNumber(),
        'g2' => $faker->randomNumber(),
        'g3' => $faker->randomNumber(),
        'g4' => $faker->randomNumber(),
        'g5' => $faker->randomNumber(),
        'g6' => $faker->randomNumber(),
        'remarks' => $faker->word,
        'region_id' => $faker->numberBetween(1, 17),
        'division_id' => $faker->numberBetween(1, 215),
        'district_id' => $faker->numberBetween(1, 500),
        'region' => $faker->word,
        'division' => $faker->word,
        'district' => $faker->word,
    ];
});
