<?php

use Illuminate\Database\Seeder;
use App\User;
use App\User_Detail;

class UserAccounts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 1;

        for ($i = 0; $i < $limit; $i++) 
        {
        	$user = new User();
        	$user->email = $faker->unique()->email;
        	$user->activated = 1;
        	$user->password = bcrypt('Hello101!');
        	$user->save();

        	$user_detail = new User_Detail();
        	$user_detail->firstname = $faker->firstNameFemale;
        	$user_detail->lastname = $faker->lastName;
        	$user_detail->user_id = $user->id;
        	$user_detail->save();

        }
    }
}
