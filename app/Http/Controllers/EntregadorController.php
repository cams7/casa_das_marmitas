<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Entregador;
use App\Empresa;

class EntregadorController extends Controller
{
    //private $entregador;

    /*public function __construct(Entregador $entregador)  
    {
        $this->entregador = $entregador;
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entregadores = Entregador::getEntregadores()->paginate(10);
        return view('entregador.index')->with('entregadores', $entregadores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entregador.create')->with('entregador', null);
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
        //$empresaId = DB::table('empresas')->max('id');
        
        // store
        $entregador = new Entregador;
        $entregador->user_id = $userId;

        $empresaId = Empresa::where('nome', '=', $request->input('empresa_nome'))->value('id');;
        $entregador->empresa_id = $empresaId;

        $this->setEntregador($request, $entregador);             

        $entregador->save();

        return redirect('entregador')->with('message', 'O entregador foi cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the entregador
        $entregador = Entregador::find($id);

        return view('entregador.show')->with('entregador', $entregador);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the entregador
        $entregador = Entregador::find($id);

        return view('entregador.edit')->with('entregador', $entregador);
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

        $entregador = Entregador::find($id);

        $this->setEntregador($request, $entregador);        

        $entregador->save();

        return redirect('entregador')->with('message', 'O entregador foi atualizado com sucesso!');
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
        $entregador = Entregador::find($id);
        $entregador->delete();

        // redirect
        return redirect('entregador')->with('message', 'O entregador foi excluído com sucesso!');
    }

    private function getRoles()
    {   
        return array(
            'nome' => 'required|max:60',
            'cpf' => 'required|regex:~.*(\d{3})\.(\d{3})\.(\d{3})\-(\d{2}).*~',
            'rg' => 'required|integer|digits_between:6,10',
            'celular' => 'required|regex:~.*\((\d{2})\) (\d{5})\-(\d{4}).*~',
            'empresa_nome' => 'required|max:60',
        );
    }

    private function setEntregador(Request $request, Entregador &$entregador)
    {   
        $entregador->nome  = $request->input('nome');
        $entregador->setCpf($request->input('cpf'));
        $entregador->rg = $request->input('rg');
        $entregador->setCelular($request->input('celular'));       
    }
}
