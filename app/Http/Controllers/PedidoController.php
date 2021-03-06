<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
//use Illuminate\Support\Facades\Input;
use Validator;
use DB;

use App\Cliente;
use App\Taxa;
use App\Pedido;
use App\PedidoItem;

class PedidoController extends Controller
{
    //private $pedido;
     private static $TOTAL_PAGINACAO = 10;
     private static $TOTAL_ITENS = 5;

    /*public function __construct(Pedido $pedido)  
    {
        $this->pedido = $pedido;
    }*/

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::getPaginacaoByQuery(self::$TOTAL_PAGINACAO);
        
        return view('pedido.index')->with('pedidos', $pedidos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $itens = null;

        if($this->isPostback())
            $itens = PedidoItemController::getItensBySession($request); 
        else
            PedidoItemController::removeItensOfSession($request);         

        return view('pedido.create', ['pedido' => null, 'itens' => $itens]);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $validator = Validator::make($request->all(), $this->getRoles());
    
        $itens = PedidoItemController::getItensBySession($request);
        $pedido = PedidoItemController::getPedido($itens); 

        $this->setNomeCliente($request);
        $this->setTaxa($request, $pedido);
        $this->setQuantidadeAndCusto($request, $pedido);
        
        $validator->after(function ($validator) use (&$pedido) {

            if($pedido->quantidade_total < 1)
                $validator->errors()->add('quantidade_total', 'A quantidade total é maior que zero');

            if($pedido->total_pedido < 1)
                $validator->errors()->add('total_pedido', 'O custo total é maior que zero');
        });     
    
        if ($validator->fails()) 
            return redirect()->back()->with('cliente_id', $request->input('cliente_id'))->with('taxa_id', $request->input('taxa_id'))->withInput()->withErrors($validator);

        $userId = DB::table('users')->max('id');
        
        $pedido->user_id = $userId;             
        
        $this->setPedido($request, $pedido);

        $itens = array_reverse($itens);

        DB::beginTransaction();

        $pedido->save();

        foreach ($itens as $i => $item)
            $this->getPedidoItem($pedido->id, $item)->save();

        DB::commit();

        PedidoItemController::removeItensOfSession($request);

        return redirect('pedido')->with('message', 'O pedido foi cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the pedido
        $pedido = Pedido::find($id);

        $itens = PedidoItem::getPaginacaoByPedidoId(self::$TOTAL_ITENS, $id);

        return view('pedido.show', ['pedido' => $pedido, 'itens' => $itens]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        // get the pedido
        $pedido = Pedido::find($id);

        $itens = null;

        if($this->isPostback())
            $itens = PedidoItemController::getItensBySession($request); 
        else
            $itens = PedidoItemController::getItens($request, $id);

        return view('pedido.edit', ['pedido' => $pedido, 'itens' => $itens]);
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
        // validate
        // read more on validation at http://laravel.com/docs/validation
        
        $validator = Validator::make($request->all(), $this->getRoles());

        $itens = PedidoItemController::getItensBySession($request);
        $pedido = PedidoItemController::getPedidoById($itens, $id); 

        $this->setNomeCliente($request);
        $this->setTaxa($request, $pedido);
        $this->setQuantidadeAndCusto($request, $pedido);

        $validator->after(function ($validator) use (&$pedido) {

            if($pedido->quantidade_total < 1)
                $validator->errors()->add('quantidade_total', 'A quantidade total é maior que zero');

            if($pedido->total_pedido < 1)
                $validator->errors()->add('total_pedido', 'O custo total é maior que zero');
        });

        if ($validator->fails()) 
            return redirect()->back()->with('cliente_id', $request->input('cliente_id'))->with('taxa_id', $request->input('taxa_id'))->withInput()->withErrors($validator);

        $this->setPedido($request, $pedido);        

        $itens = array_reverse($itens);

        DB::beginTransaction();

        $pedido->save();

        foreach ($itens as $i => $item)  
            if($item->id == 0)
                $item = $this->getPedidoItem($pedido->id, $item)->save();               
            else
                $item->update(['quantidade' => $item->quantidade]); 

        $itens = PedidoItemController::getItensExcluidosBySession($request);

        foreach ($itens as $i => $item)
            $item->delete(); 

        DB::commit();

        PedidoItemController::removeItensOfSession($request);

        return redirect('pedido')->with('message', 'O pedido foi atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $pedido = Pedido::find($id);
        $pedido->delete();

        // redirect
        return redirect('pedido')->with('message', 'O pedido foi excluído com sucesso!');
    }

    public function getPaginacao(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->get('q');

            $pedidos = Pedido::getPaginacaoByQuery(self::$TOTAL_PAGINACAO, $query);

            return view('pedido.paginacao')->with('pedidos', $pedidos)->render();
        } 
            
        return response()->json(['message' => 'Método não permitido'], 405);
    }

    public function getPaginacaoItens(Request $request)
    {
        if($request->ajax())
        {
            $pedidoId = $request->get('pedido_id');

            $itens = PedidoItem::getPaginacaoByPedidoId(self::$TOTAL_ITENS, $pedidoId);

            return view('pedido.paginacao_itens')->with('itens', $itens)->render();
        } 
            
        return response()->json(['message' => 'Método não permitido'], 405);
    }
 
    public function getItens(Request $request)
    {
        if($request->ajax())
        {
            $itens = PedidoItemController::getItensBySession($request);      

            return view('pedido.itens')->with('itens', $itens)->render();
        } 
            
        return response()->json(['message' => 'Método não permitido'], 405);
    }

    private function getRoles()
    {
        return array(
            'cliente_id' => 'required|integer',
            'taxa_id' => 'required|integer',
            'quantidade_total' => 'required|integer',
            'total_pedido' => 'required',
            'situacao_pedido' => 'required|integer|between:1,4'
        );
    }

    private function setPedido(Request &$request, Pedido &$pedido)
    {   
        $pedido->cliente_id = $request->input('cliente_id');
        $pedido->taxa_id = $request->input('taxa_id');
        //$pedido->quantidade_total  = $request->input('quantidade_total');
        //$pedido->setCustoTotal($request->input('total_pedido'));
        $pedido->situacao_pedido  = $request->input('situacao_pedido');  
    }

    private function setNomeCliente(Request &$request)
    {
        $clienteId = $request->input('cliente_id');
        if($clienteId !== '')
        {   
            $cliente = Cliente::where('id', '=', $clienteId)->select('nome', 'telefone')->get()[0];
            $request->merge(['cliente_nome' => Cliente::getNomeWithTelefoneFormatado($cliente->nome, $cliente->telefone)]);
        }
    }

    private function setTaxa(Request &$request, Pedido &$pedido)
    {
        $taxaId = $request->input('taxa_id');
        if($taxaId !== '')
        {   
            $taxa = Taxa::where('id', '=', $taxaId)->select('taxa')->get()[0];
            $request->merge(['taxa' => Taxa::getTaxaFormatada($taxa->taxa)]);
            
            if($pedido->total_pedido > 0)
                $pedido->total_pedido += $taxa->taxa;
        }
    }

    private function setQuantidadeAndCusto(Request &$request, Pedido &$pedido)
    {
        //$request->replace(['quantidade_total' => $pedido->quantidade_total, 'total_pedido' => $pedido->total_pedido]);
        $request->merge(['quantidade_total' => $pedido->quantidade_total > 0 ? $pedido->quantidade_total : null, 'total_pedido' => $pedido->getCustoTotal()]);
    }

    private function getPedidoItem($pedidoId, &$i)
    {
        $item = new PedidoItem;

        $item->pedido_id = $pedidoId;        
        $item->produto_id = $i->produto_id;
        $item->quantidade = $i->quantidade;

        return $item;
    }    

    private function isPostback()
    {
        $url = url()->previous();
        //Log::info("url previous : ".$url);   

        if(strrpos($url, "/create") > -1 || strrpos($url, "/edit") > -1)        
            return true;

        return false;
    }
}