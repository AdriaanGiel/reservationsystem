<?php

use Illuminate\Database\Seeder;

class AllTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Role::create([
            'name' => 'user'
        ]);

        \App\Role::create([
            'name' => 'admin'
        ]);

        DB::table('assignment_type')->insert([
            [
                'name' => 'Werving',
                'created_at' => now()
            ],
            [
                'name' => 'Promo',
                'created_at' => now()
            ]
        ]);

        \App\User::create([
            'name' => 'TEster',
            'email' => 'test@test.com',
            'password' => bcrypt('password'),
            'role_id' => 2
        ]);

        \App\User::create([
            'name' => 'TEstert',
            'email' => 'test2@test.com',
            'password' => bcrypt('password'),
            'role_id' => 1
        ]);
    }
}
