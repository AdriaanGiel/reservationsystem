<?php

use Faker\Generator as Faker;

$factory->define(\App\highscore::class, function (Faker $faker) {
    return [
        'username' => $faker->company,
        'points' => rand(1,10000)
    ];
});
