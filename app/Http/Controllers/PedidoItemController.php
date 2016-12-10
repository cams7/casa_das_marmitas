<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Pedido;
use App\PedidoItem;
use App\Produto;

class PedidoItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //405 Método não permitido
        if (!$request->isMethod('post') || !$request->ajax() || !$request->format() == 'json' || !$request->wantsJson())
            return response()->json(['message' => 'Método não permitido'], 405);
           
        if($this->isAdicionaPedido($request))
        {
            $item = $this->getNewPedidoItem($request);

            $itens = self::getItensBySession($request);
            
            if(count(
                array_filter($itens, function($i) use (&$item) {
                    return $i->produto_id == $item->produto_id;
                })
            ) == 0)
                array_unshift($itens, $item);
            else
                $itens = array_map(function($i) use (&$item) {
                    if($i->produto_id == $item->produto_id)
                        $i->quantidade += $item->quantidade;        

                    return $i;
                }, $itens);

            $request->session()->put('pedido_itens', $itens);
            
            //200 OK
            return response()->json(self::getPedido($itens), 200);
        } else
        {   
            //200 OK         
            return response()->json(['id' => 0], 200);           
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //405 Método não permitido
        if (!$request->isMethod('get') || !$request->ajax())
            return response()->json(['message' => 'Método não permitido'], 405);
        
        if($this->isAdicionaPedido($request))
        {

            $itens = self::getItensBySession($request);

            //404 Não encontrado
            if(count($itens) == 0) 
                return response()->json(['message' => 'Itens não encontrado na sessão do usuário'], 404);
            
            $itens = array_filter($itens, function($i) use ($id){
                return $i->produto_id == $id;
            });

            //404 Não encontrado
            if(count($itens) == 0)
                return response()->json(['message' => 'O item de pedido foi excluído anteriormente'], 404);

            $item = array_values($itens)[0];

           //200 OK
           return response()->json($item, 200);            
        } else
        {   
            //200 OK       
            return response()->json(['id' => $id], 200);    
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //405 Método não permitido
        if (!$request->isMethod('put') || !$request->ajax() || !$request->format() == 'json' || !$request->wantsJson())
            return response()->json(['message' => 'Método não permitido'], 405);
        
        if($this->isAdicionaPedido($request))
        {
            $itens = self::getItensBySession($request);

            //404 Não encontrado
            if(count($itens) == 0) 
                return response()->json(['message' => 'Itens não encontrado na sessão do usuário'], 404);
            
            //404 Não encontrado
            if(count(
                array_filter($itens, function($i) use ($id){
                    return $i->produto_id == $id;
                })) == 0)
                return response()->json(['message' => 'O item de pedido foi excluído anteriormente'], 404);

            $item = $this->getNewPedidoItem($request);
            
            $itens = array_map(function($i) use (&$item) {
                if($i->produto_id == $item->produto_id)
                    return $item;        

                return $i;
            }, $itens);

            $request->session()->put('pedido_itens', $itens);
            
            //200 OK
            return response()->json(self::getPedido($itens), 200);
        }
        else
        {
            //200 OK
            return response()->json(['id' => $id], 200);
        }    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //405 Método não permitido
        if (!$request->isMethod('delete') || !$request->ajax() || !$request->format() == 'json' || !$request->wantsJson())
            return response()->json(['message' => 'Método não permitido'], 405);
        
        if($this->isAdicionaPedido($request))
        {
            $itens = self::getItensBySession($request);

            //404 Não encontrado
            if(count($itens) == 0) 
                return response()->json(['message' => 'Itens não encontrado na sessão do usuário'], 404);

            $itens = array_filter($itens, function($i) use ($id){
                return $i->produto_id != $id;
            });

            $request->session()->put('pedido_itens', $itens);
            
            //200 OK
            return response()->json(self::getPedido($itens), 200);
        } else
        {
            //200 OK
            return response()->json(['id' => $id], 200);  
        } 
    }

    private function getNewPedidoItem(Request &$request)
    {
        $item = new PedidoItem;

        $item->id = null;
        $item->produto_id = $request->input('produto_id');
        $item->quantidade = $request->input('quantidade');
        $item->produto = Produto::find($request->input('produto_id'));

        return $item;
    }

    private function isAdicionaPedido(Request &$request) {
        $uri = $request->path();

        if(strrpos($uri, "/produto") > -1)        
            return true;

        return false;
    }

    public static function getItensBySession(Request &$request)
    {
        $itens = [];
        if($request->session()->has('pedido_itens'))
            $itens = $request->session()->get('pedido_itens'); 

        return $itens;
    } 

    public static function getPedido(&$itens)
    {
        $pedido = new Pedido;

        $pedido->quantidade_total = array_reduce($itens, function($carry, $i){
            $carry += $i->quantidade; 
            return $carry;
        }, 0);

        $pedido->total_pedido = array_reduce($itens, function($carry, $i){
            $carry += $i->quantidade * $i->produto->custo; 
            return $carry;
        }, 0);

        return $pedido;
    }      
}
