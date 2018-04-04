<?php

use Illuminate\Database\Seeder;

class HighscoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\highscore::class,10)->create();
    }
}
