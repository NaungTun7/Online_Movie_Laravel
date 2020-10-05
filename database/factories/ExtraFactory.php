<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Extra;
use Faker\Generator as Faker;

$factory->define(Extra::class, function (Faker $faker) {
    return [
        'rating' => $faker->text($nbWords = 3),
        'duration' => $faker->text($nbWords = 3),
        'review' => $faker->sentence($nbWords = 3),
        'type' => $faker->sentence($nbWords = 3),
    ];
});
