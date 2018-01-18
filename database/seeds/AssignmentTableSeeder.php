<?php

use Illuminate\Database\Seeder;

class AssignmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Assignment::class,40)->create([
            'user_id' => \App\User::workers()->random()->id
        ]);
    }
}
