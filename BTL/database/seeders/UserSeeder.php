<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'role_id' => '1',
            'photo' => '',
            'status' => 0,
        ]);
        \DB::table('users')->insert([
            'name' => 'users',
            'email' => 'users@gmail.com',
            'password' => bcrypt('12345678'),
            'role_id' => '2',
            'photo' => '',
            'status' => 0,
        ]);
    }
}