<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('settings')->insert([
            'name' => 'Habeco',
            'logo' => 'logo.png',
            'favicon' => 'favicon.png',
            'facebook' => 'facebook.com/vumanhdung.dhtl',
            'youtube' => 'youtube.com',
            'mail' => 'dungshinichi99@gmail.com',
            'zalo' => '0386132297'
        ]);
    }
}