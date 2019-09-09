<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Enrolment::class, function (Faker $faker) {
    return [
        'grade' => $faker->numberBetween(1, 6),
        'male' => $faker->numberBetween(20, 50),
        'female' => $faker->numberBetween(20, 50),
        'remarks' => $faker->word,
        'sy' => 2019,
        'region_id' => $faker->numberBetween(1, 17),
        'division_id' => $faker->numberBetween(1, 215),
        'district_id' => $faker->numberBetween(1, 500),
        'school_id' => $faker->numberBetween(1, 500),
        'teacher_id' => $faker->numberBetween(1, 500)
    ];
});
