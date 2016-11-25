<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Produto;

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

        $faker = Faker::create();

        foreach (range(1, 30) as $i) {
            Produto::create([
                'nome'=>$faker->word(),
                'ingredientes'=>$faker->sentence()
            ]);
        }        
    }
}
