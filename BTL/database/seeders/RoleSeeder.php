<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('role')->insert([
            'id' => 1,
            'name' => 'admin',
            'slug' => 'admin',
        ]);
        \DB::table('role')->insert([
            'id' => 2,
            'name' => 'user',
            'slug' => 'user',
        ]);
    }
}