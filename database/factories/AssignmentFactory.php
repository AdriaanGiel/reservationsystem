<?php

use Faker\Generator as Faker;

$factory->define(\App\Assignment::class, function (Faker $faker) use ($factory) {

    $company = $factory->create(\App\Company::class);
    $user = $factory->create(\App\User::class);

    return [
        'date' => $faker->dateTime($max = 'now', $timezone = null),
        'hours' => rand(1,8),
        'argumentation' => implode("",$faker->sentences($nb = 5, $asText = false)),
        'user_id' => $user->id,
        'company_id' => $company->id,
        'assignment_type_id' => rand(1,2)
    ];
});
