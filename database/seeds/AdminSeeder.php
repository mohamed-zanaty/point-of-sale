<?php

use Illuminate\Database\Seeder;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\Admin::create([
            'name' => 'super admin',
            'email' => 'mohamedzanaty@gmail.com',
            'password' => bcrypt('123456789'),
        ]);
        $user->attachRole('super_admin');
    }
}
