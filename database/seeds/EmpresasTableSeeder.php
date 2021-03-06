<?php

use Illuminate\Database\Seeder;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $totalEmpresas = rand(11, 15);

        factory(App\Empresa::class, $totalEmpresas)->create()->each(function($empresa) 
        {
            $totalEntregadores = rand(1, 25);

            //$empresa->entregadores()->save(factory(App\Entregador::class, 1)->make());
            factory(App\Entregador::class, $totalEntregadores)->create([
                'empresa_id' => $empresa['id']
            ]);
        });            
    }   
}
