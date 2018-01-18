<?php

use Faker\Generator as Faker;

$factory->define(\App\Comment::class, function (Faker $faker) {
    return [
        'argumentation' => implode("", $faker->sentences($nb = 5, $asText = false)),
        'user_id' => \App\User::admins()->random()->id
    ];
});
