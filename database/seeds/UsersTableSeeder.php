<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->truncate();

        $faker = Faker::create();

        foreach (range(1, 10) as $i) {
            User::create([
                'name'=>$faker->name(),
                'email'=>$faker->email(),
                'password'=>Hash::make($faker->word())
            ]);
        }        
    }
}
