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

        DB::table('produtos')->truncate();
        
        factory(App\Produto::class, 30)->create();     
    }
}
