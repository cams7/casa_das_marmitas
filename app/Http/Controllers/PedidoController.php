<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Pedido;

class PedidoController extends Controller
{
    //private $pedido;

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
        $pedidos = Pedido::paginate(10);
        return view('pedido.index')->with('pedidos', $pedidos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pedido.create')->with('pedido', null);
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
        
        $this->validate($request, $this->getRoles());

        $userId = DB::table('users')->max('id');
        $clienteId = DB::table('clientes')->max('id');
        $taxaId = DB::table('taxas')->max('id') - 1;
        
        // store
        $pedido = new Pedido;
        $pedido->user_id = $userId;
        $pedido->cliente_id = $clienteId;
        $pedido->taxa_id = $taxaId;

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
        
        $this->validate($request, $this->getRoles());

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

    private function getRoles()
    {
        return array(
            'quantidade_total' => 'required|integer',
            'total_pedido' => 'required',
            'situacao_pedido' => 'required|integer|between:1,4'
        );
    }

    private function setPedido(Request $request, Pedido &$pedido)
    {   
        $pedido->quantidade_total  = $request->input('quantidade_total');
        $pedido->setCustoTotal($request->input('total_pedido'));
        $pedido->situacao_pedido  = $request->input('situacao_pedido');  
    }
}
