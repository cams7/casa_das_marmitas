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
        //$totalClientes = rand(300, 500);
        $totalClientes = rand(11, 15);

        factory(App\Cliente::class, $totalClientes)->create();            
    }   
}
