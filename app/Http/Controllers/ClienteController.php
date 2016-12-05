<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Http\RedirectResponse;
//use Illuminate\Support\Facades\Log;
use DB;

use App\Cliente;

class ClienteController extends Controller
{
    //private $cliente;

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
        $clientes = Cliente::paginate(10);
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

        return view('cliente.show')->with('cliente', $cliente);
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

    private function setCliente(Request $request, Cliente &$cliente)
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
