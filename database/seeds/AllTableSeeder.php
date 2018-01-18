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


        \App\Status::create([
            'name' => 'pending'
        ]);

        \App\Status::create([
            'name' => 'approved'
        ]);

        \App\Status::create([
            'name' => 'rejected'
        ]);


        \App\Status::create([
            'name' => 'recruitment',
            'type' => 'company'
        ]);

        \App\Status::create([
            'name' => 'promotion',
            'type' => 'company'
        ]);

        \App\Status::create([
            'name' => 'rounded',
            'type' => 'company'
        ]);

        $norm1 = \App\User::create([
            'name' => 'TEster',
            'email' => 'test@test.com',
            'password' => bcrypt('password'),
            'role_id' => 2
        ]);

        $test = \App\User::create([
           'name' => 'dfssdfsd',
           'email' => 'a3aan_g@live.nl',
           'password' => bcrypt('password'),
           'role_id' => 1
        ]);

        $test->profile()->create([
           'firstname' => 'Adriaan',
           'lastname' => 'Giel',
           'phonenumber' => '12314695',
           'hours'      => 8
        ]);

        $norm1->profile()->create([
            'firstname' => 'Norm',
            'lastname' => 'nn',
            'phonenumber' => '123456987',
            'hours' => 6,
        ]);

        $admin1 = \App\User::create([
            'name' => 'TEstert',
            'email' => 'test2@test.com',
            'password' => bcrypt('password'),
            'role_id' => 1
        ]);

        $admin1->profile()->create([
            'firstname' => 'Admin',
            'lastname' => 'nn',
            'phonenumber' => '123456987',
            'hours' => 5,
        ]);

    }
}
