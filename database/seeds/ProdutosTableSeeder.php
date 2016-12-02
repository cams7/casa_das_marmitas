<?php

use Illuminate\Database\Seeder;

class ProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $TOTAL_MARMITAS = 12;

        factory(App\Produto::class, $TOTAL_MARMITAS)->create();            
    }    
}
