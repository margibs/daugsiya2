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
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'rumargibs@gmail.com',
            'activated' => 1,
            'is_admin' => 1,
            'password' => bcrypt('Hello101!'),
        ]);
    }
}
