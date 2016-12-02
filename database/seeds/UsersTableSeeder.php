<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $totalUsuarios = rand(3, 10);

        factory(App\User::class, $totalUsuarios)->create()->each(function($user) 
        {
            factory(App\Funcionario::class)->create([
                'id' => $user['id']
            ]);                 
        });       
    }    
}