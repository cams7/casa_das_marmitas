<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('funcionarios')->truncate();
        DB::table('entregadores')->truncate();
        DB::table('empresas')->delete();
        DB::table('pedido_itens')->truncate();
        DB::table('pedidos')->delete();
        DB::table('clientes')->delete();
        DB::table('produtos')->delete();
        DB::table('taxas')->delete();
        DB::table('users')->delete();
                
        $this->call(UsersTableSeeder::class);
        $this->call(ClientesTableSeeder::class);
        $this->call(EmpresasTableSeeder::class);  
        $this->call(TaxasTableSeeder::class);   
        $this->call(ProdutosTableSeeder::class);        
        $this->call(PedidosTableSeeder::class);           
    }
}
