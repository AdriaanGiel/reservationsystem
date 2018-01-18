<?php

use Faker\Generator as Faker;

$factory->define(\App\Assignment::class, function (Faker $faker) use ($factory) {

    $company = $factory->create(\App\Company::class);
    $date = \Carbon\Carbon::now()->addDays(rand(1,365));
    return [
        'date' => $date->toDateString(),
        'start_time' => $faker->time(),
        'hours' => rand(1,8),
        'description' => implode("",$faker->sentences($nb = 5, $asText = false)),
        'user_id' => \App\User::all()->random()->id,
        'company_id' => $company->id,
        'assignment_type_id' => rand(1,2),
        'status_id' => 2
    ];
});
