<?php

use Faker\Generator as Faker;

$factory->define(/**
 * @param Faker $faker
 * @return array
 */
    App\User::class, function (Faker $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'role_id' => rand(1,2)
    ];
});
