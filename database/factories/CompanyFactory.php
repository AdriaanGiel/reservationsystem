<?php

use Faker\Generator as Faker;

$factory->define(/**
 * @param Faker $faker
 * @return array
 */
    \App\Company::class, function (Faker $faker) use ($factory) {

    return [
        'name' => $faker->company,
        'description' => implode("",$faker->sentences($nb = 3, $asText = false)),
        'street' => $faker->streetName,
        'number' => $faker->buildingNumber,
        'insertion' => $faker->streetSuffix,
        'zipcode' => $faker->postcode,
        'city' => $faker->city,
        'status_id' => \App\Status::where('type',null)->get()->random()->id,
        'company_status_id' => \App\Status::where('type','company')->get()->random()->id
    ];
});
