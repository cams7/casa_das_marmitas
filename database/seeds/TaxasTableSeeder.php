<?php

use Illuminate\Database\Seeder;

class TaxasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $TOTAL_TAXAS = 3;

        factory(App\Taxa::class, $TOTAL_TAXAS)->create();            
    }   
}
