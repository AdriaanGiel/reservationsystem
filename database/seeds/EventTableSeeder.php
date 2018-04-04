<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\event::create([
            'name' => 'Koningsdag',
            'difficulty' => 'Super moeilijk',
            'points' => 'x3',
            'date' => '27-04-2018'
        ]);

        \App\event::create([
            'name' => 'Pasen',
            'difficulty' => 'Moeilijk',
            'points' => 'x1.5',
            'date' => '01-04-2018'
        ]);

        \App\event::create([
            'name' => 'Kerst',
            'difficulty' => 'Makkelijk',
            'points' => 'x1.25',
            'date' => '25-12-2018'
        ]);
    }
}
