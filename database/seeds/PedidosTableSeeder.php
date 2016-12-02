<?php

use Illuminate\Database\Seeder;

class PedidosTableSeeder extends Seeder
{
    private static $taxa; 
    private static $produtos;
    private static $pedidoItens;
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        self::setTaxa();
        self::setProdutos();

        //Log::info("-----------------------------------------------------------------");
        App\Cliente::all()->each(function($cliente) 
        {   
            //Log::info("--------------------//--------------------//--------------------");
            //Log::info("Cliente: Nome = ".$cliente['nome']);

            $totalPedidosPorCliente = rand(0, 3);

            for ($i=0; $i < $totalPedidosPorCliente; $i++) 
            {  
                self::setPedidoItens(); 

                $qtdTotal = self::getQtdTotal();
                $custoTotal = self::getCustoTotal() + self::$taxa['taxa'];

                //Log::info("Pedido: Qtd total = ".$qtdTotal.", Custo total = ".$custoTotal);
                                        
                $cliente->pedidos()->save(factory(App\Pedido::class, 1)->make([
                    'taxa_id' => self::$taxa['id'],
                    'quantidade_total' =>  $qtdTotal,
                    'total_pedido' => $custoTotal
                ]));

                $pedidoId = DB::table('pedidos')->max('id');

                foreach (self::$pedidoItens as $i => $item){
                    //Log::info("Item: Cod. produto = ".$item['produtoId'].", Qtd = ".$item['quantidade'].", Custo = ".$item['custo']);

                    factory(App\PedidoItem::class, 1)->create([
                        'pedido_id' => $pedidoId,
                        'produto_id' => $item['produtoId'],
                        'quantidade' => $item['quantidade']
                    ]);
                } 
            }  
        });    
    }

    public static function setTaxa()
    {
        $taxa = DB::table('taxas')->select('id', 'taxa')->where('tipo_taxa', '=', 2)->get();
        $taxa = json_decode(json_encode($taxa), true);
        self::$taxa = $taxa[0];
    }

    private static function setProdutos()
    {
        self::$produtos = DB::table('produtos')->select('id', 'custo')->get();
    }    

    private static function setPedidoItens()
    {
        self::$pedidoItens = array();
        $count = 0;

        foreach (self::$produtos as $p)
        {
            $totalItens = rand(1, 5);
            if (rand(0, 1) == 1 && $count++ < $totalItens)
            {
                $quantidadePorItem = rand(1, 10);
                self::$pedidoItens[] = array('produtoId'=>$p->id,'custo'=>$p->custo,'quantidade'=> $quantidadePorItem);         
            }
        }               
    }

    private static function getQtdTotal()
    {
        //return array_reduce(self::$pedidoItens, function($qtd, $p){
        //    $qtd += $p['quantidade'];
        //    return $qtd;
        //});

        $qtdTotal = 0;
        foreach (self::$pedidoItens as $i => $item) 
             $qtdTotal += $item['quantidade'];
         
        return $qtdTotal;
    }

    private static function getCustoTotal()
    {
        //return array_reduce(self::$pedidoItens, function($custo, $p){
        //    $custo += $p['custo']*$p['quantidade'];
        //    return $custo;
        //}); 

        $custoTotal = 0;
        foreach (self::$pedidoItens as $i => $item) 
             $custoTotal += $item['custo']*$item['quantidade'];

        return $custoTotal;     
    }
}
