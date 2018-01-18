<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        factory(\App\Company::class,30)->create();
        factory(\App\Company::class,30)->create([
            'argumentation' => implode("",$faker->sentences($nb = 3, $asText = false)),
        ]);
    }
}
