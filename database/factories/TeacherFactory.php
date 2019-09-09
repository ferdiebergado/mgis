<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Teacher::class, function (Faker $faker) {
    return [
        'last_name' => $faker->lastName,
        'first_name' => $faker->firstName,
        'mi' => $faker->randomLetter,
        'sex' => $faker->randomElement(['M', 'F']),
        'birth_date' => $faker->date(),
        'years_mg' => $faker->randomNumber(),
        'region_id' => $faker->numberBetween(1, 17),
        'division_id' => $faker->numberBetween(1, 215),
        'district_id' => $faker->numberBetween(1, 500),
        'school_id' => $faker->numberBetween(1, 500),
    ];
});
