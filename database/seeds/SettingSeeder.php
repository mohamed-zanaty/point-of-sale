<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {

        DB::table('settings')->insert([
            'name' => 'هدومك',
            'email' => 'mohamed@gmail.com',
            'address' => 'مصر شبين الكوم',
            'number' => '010933831901',
            'image' => 'logo.png',
        ]);
    }
}
