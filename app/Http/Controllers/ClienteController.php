<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Http\RedirectResponse;
//use Illuminate\Support\Facades\Log;
use DB;

use App\Cliente;
use App\Pedido;

class ClienteController extends Controller
{
    //private $cliente;
    private static $TOTAL_PAGINACAO = 10;
    private static $TOTAL_PEDIDOS = 5;

    /*public function __construct(Cliente $cliente)  
    {
        $this->cliente = $cliente;
    }*/
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::getPaginacaoByQuery(self::$TOTAL_PAGINACAO);
        return view('cliente.index')->with('clientes', $clientes);
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create')->with('cliente', null);
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
        
        // store
        $cliente = new Cliente;
        $cliente->user_id = $userId;

        $this->setCliente($request, $cliente);        

        $cliente->save();

        return redirect('cliente')->with('message', 'O cliente foi cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the cliente
        $cliente = Cliente::find($id);
        $pedidos = Pedido::getPaginacaoByClienteId(self::$TOTAL_PEDIDOS, $id);

        return view('cliente.show', ['cliente' => $cliente, 'pedidos' => $pedidos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the cliente
        $cliente = Cliente::find($id);

        return view('cliente.edit')->with('cliente', $cliente);
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

        $cliente = Cliente::find($id);

        $this->setCliente($request, $cliente);        

        $cliente->save();

        return redirect('cliente')->with('message', 'O cliente foi atualizado com sucesso!');
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
        $cliente = Cliente::find($id);
        $cliente->delete();

        // redirect
        return redirect('cliente')->with('message', 'O cliente foi excluído com sucesso!');
    }

    public function getPaginacao(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->get('q');

            $clientes = Cliente::getPaginacaoByQuery(self::$TOTAL_PAGINACAO, $query);

            return view('cliente.paginacao')->with('clientes', $clientes)->render();
        } 
            
        return response()->json(['message' => 'Método não permitido'], 405);
    }

    public function getPaginacaoPedidos(Request $request)
    {
        if($request->ajax())
        {
            $clienteId = $request->get('cliente_id');

            $pedidos = Pedido::getPaginacaoByClienteId(self::$TOTAL_PEDIDOS, $clienteId);

            return view('cliente.paginacao_pedidos')->with('pedidos', $pedidos)->render();
        } 
            
        return response()->json(['message' => 'Método não permitido'], 405);
    }

    public function getClientes(Request $request, $nome)
    {   
        if($request->ajax())
        {
            $clientes =  Cliente::getPesquisaByQuery($nome);   
            return response()->json($clientes, 200);          
        } 
            
        return response()->json(['message' => 'Método não permitido'], 405); 
    }

    private function getRoles()
    {
        return array(
            'nome' => 'required|max:60',
            'nascimento' => 'date_format:"d/m/Y"',
            'telefone' => 'required|regex:~.*\((\d{2})\) (\d{4})\-(\d{4}).*~',
            'cep' => 'required|regex:~.*(\d{5})\-(\d{3}).*~',
            'cidade' => 'required|max:60',
            'bairro' => 'required|max:60',
            'logradouro' => 'required|max:100',
            'numero_residencial' => 'required|max:30',
            'complemento_endereco' => 'max:30',
            'ponto_referencia' => 'max:30'
        );
    }

    private function setCliente(Request &$request, Cliente &$cliente)
    {   
        $cliente->nome  = $request->input('nome');
        $cliente->setNascimento($request->input('nascimento'));
        $cliente->setTelefone($request->input('telefone'));
        $cliente->setCep($request->input('cep'));
        $cliente->cidade = $request->input('cidade');
        $cliente->bairro = $request->input('bairro');
        $cliente->logradouro = $request->input('logradouro');
        $cliente->numero_residencial = $request->input('numero_residencial');
        $cliente->complemento_endereco = $request->input('complemento_endereco');
        $cliente->ponto_referencia = $request->input('ponto_referencia');        
    }
}
