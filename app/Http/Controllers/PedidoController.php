<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
//use Illuminate\Support\Facades\Input;
use Validator;
use DB;

use App\Pedido;

class PedidoController extends Controller
{
    //private $pedido;
     private static $TOTAL_PAGINACAO = 10;

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
            $request->session()->forget('pedido_itens');            

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
        // validate
        // read more on validation at http://laravel.com/docs/validation
        
        $validator = Validator::make($request->all(), $this->getRoles());

        /*$validator->after(function ($validator) {
            //if ($this->somethingElseIsInvalid()) {
                $validator->errors()->add('field', 'Something is wrong with this field!');
            //}
        });*/
    
        if ($validator->fails()) 
            return redirect()->back()->with('cliente_id', $request->input('cliente_id'))->with('taxa_id', $request->input('taxa_id'))->withInput()->withErrors($validator);

        $userId = DB::table('users')->max('id');
        
        // store
        $pedido = new Pedido;
        $pedido->user_id = $userId;             
        
        $this->setPedido($request, $pedido);        

        $pedido->save();

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

        return view('pedido.show')->with('pedido', $pedido);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the pedido
        $pedido = Pedido::find($id);

        return view('pedido.edit')->with('pedido', $pedido);
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

        /*$validator->after(function ($validator) {
            //if ($this->somethingElseIsInvalid()) {
                $validator->errors()->add('field', 'Something is wrong with this field!');
            //}
        });*/

        if ($validator->fails()) 
            return redirect()->back()->with('cliente_id', $request->input('cliente_id'))->with('taxa_id', $request->input('taxa_id'))->withInput()->withErrors($validator);

        $pedido = Pedido::find($id);

        $this->setPedido($request, $pedido);        

        $pedido->save();

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

            return view('pedido.pagination')->with('pedidos', $pedidos)->render();
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
        $pedido->quantidade_total  = $request->input('quantidade_total');
        $pedido->setCustoTotal($request->input('total_pedido'));
        $pedido->situacao_pedido  = $request->input('situacao_pedido');  
    }    

    private function isPostback()
    {
        $url = url()->previous();
        //Log::info("url previous : ".$url);   

        if(strrpos($url, "/create") > -1)        
            return true;

        return false;
    }
}
