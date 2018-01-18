<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        factory(\App\User::class,40)->create()->each(function($user) use ($faker){
            $user->profile()->create([
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'phonenumber' => $faker->phoneNumber,
                'hours' => rand(1,32),
            ]);
        });
    }
}
