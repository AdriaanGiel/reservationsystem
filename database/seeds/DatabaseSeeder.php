<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AllTableSeeder::class,
            UserTableSeeder::class,
            PlaceTableSeeder::class,
            CompanyTableSeeder::class,
            AssignmentTableSeeder::class
        ]);
    }
}
