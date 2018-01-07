<?php

use Faker\Generator as Faker;

$factory->define(\App\Company::class, function (Faker $faker) use ($factory) {

    $place = $factory->create(\App\Place::class);

    return [
        'name' => $faker->company,
        'description' => implode("",$faker->sentences($nb = 3, $asText = false)),
        'street' => $faker->streetName,
        'number' => $faker->buildingNumber,
        'insertion' => $faker->streetSuffix,
        'zipcode' => $faker->postcode,
        'place_id' => $place->id
    ];
});
