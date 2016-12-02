<?php

use Illuminate\Database\Seeder;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $totalClientes = rand(300, 500);
        //$totalClientes = rand(1, 5);

        factory(App\Cliente::class, $totalClientes)->create();            
    }   
}
