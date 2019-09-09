<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Division::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'active' => $faker->boolean,
        'region_id' => $faker->numberBetween(1, 17),
    ];
});
