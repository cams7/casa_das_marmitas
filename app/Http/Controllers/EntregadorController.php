<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Validator;
use DB;

use App\Entregador;
use App\Empresa;

class EntregadorController extends Controller
{
    //private $entregador;
    private static $TOTAL_PAGINACAO = 10;

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
        $entregadores = Entregador::getPaginacaoByQuery(self::$TOTAL_PAGINACAO);
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

        $validator = Validator::make($request->all(), $this->getRoles());
        
        $this->setNomeEmpresa($request);      

        /*$validator->after(function ($validator) {
            //if ($this->somethingElseIsInvalid()) {
                $validator->errors()->add('field', 'Something is wrong with this field!');
            //}
        });*/ 
              

        if ($validator->fails()) 
            return redirect()->back()->with('empresa_id', $request->input('empresa_id'))->withInput()->withErrors($validator);
        
        $userId = DB::table('users')->max('id');
        
        // store
        $entregador = new Entregador;
        $entregador->user_id = $userId;

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
        
        $validator = Validator::make($request->all(), $this->getRoles());

        $this->setNomeEmpresa($request);

        /*$validator->after(function ($validator) {
            //if ($this->somethingElseIsInvalid()) {
                $validator->errors()->add('field', 'Something is wrong with this field!');
            //}
        });*/

        if ($validator->fails())
            return redirect()->back()->with('empresa_id', $request->input('empresa_id'))->withInput()->withErrors($validator);
        
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

    public function getPaginacao(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->get('q');

            $entregadores = Entregador::getPaginacaoByQuery(self::$TOTAL_PAGINACAO, $query);

            return view('entregador.paginacao')->with('entregadores', $entregadores)->render();
        } 
            
        return response()->json(['message' => 'Método não permitido'], 405);
    }

    private function getRoles()
    {   
        return array(
            'empresa_id' => 'required|integer',
            'nome' => 'required|max:60',
            'cpf' => 'required|regex:~.*(\d{3})\.(\d{3})\.(\d{3})\-(\d{2}).*~',
            'rg' => 'required|integer|digits_between:6,10',
            'celular' => 'required|regex:~.*\((\d{2})\) (\d{5})\-(\d{4}).*~'
        );
    }

    private function setEntregador(Request &$request, Entregador &$entregador)
    {   
        $entregador->empresa_id = $request->input('empresa_id');        
        $entregador->nome  = $request->input('nome');
        $entregador->setCpf($request->input('cpf'));
        $entregador->rg = $request->input('rg');
        $entregador->setCelular($request->input('celular'));       
    }

    private function setNomeEmpresa(Request &$request)
    {
        $empresaId = $request->input('empresa_id');
        if($empresaId !== '')
        {   
            $empresa = Empresa::where('id', '=', $empresaId)->select('nome', 'cnpj')->get()[0];
            $request->merge(['empresa_nome' => Empresa::getNomeWithCnjpFormatado($empresa->nome, $empresa->cnpj)]);
        }
    }
}