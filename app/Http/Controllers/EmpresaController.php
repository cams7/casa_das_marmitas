<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Empresa;

class EmpresaController extends Controller
{
    //private $empresa;

    /*public function __construct(Empresa $empresa)  
    {
        $this->empresa = $empresa;
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::paginate(10);
        return view('empresa.index')->with('empresas', $empresas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresa.create')->with('empresa', null);
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
        $empresa = new Empresa;
        $empresa->user_id = $userId;

        $this->setEmpresa($request, $empresa);        

        $empresa->save();

        return redirect('empresa')->with('message', 'A empresa foi cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the empresa
        $empresa = Empresa::find($id);

        return view('empresa.show')->with('empresa', $empresa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the empresa
        $empresa = Empresa::find($id);

        return view('empresa.edit')->with('empresa', $empresa);
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

        $empresa = Empresa::find($id);

        $this->setEmpresa($request, $empresa);        

        $empresa->save();

        return redirect('empresa')->with('message', 'A empresa foi atualizada com sucesso!');
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
        $empresa = Empresa::find($id);
        $empresa->delete();

        // redirect
        return redirect('empresa')->with('message', 'A empresa foi excluída com sucesso!');
    }

    private function getRoles()
    {
        return array(
            'nome' => 'required|max:60',
            'cnpj' => 'required|regex:~.*(\d{2})\.(\d{3})\.(\d{3})\/(\d{4})\-(\d{2}).*~',
            'email' => 'required|email|max:50',
            'telefone' => 'required|regex:~.*\((\d{2})\) (\d{4})\-(\d{4}).*~',
            'cep' => 'required|regex:~.*(\d{5})\-(\d{3}).*~',
            'cidade' => 'required|max:60',
            'bairro' => 'required|max:60',
            'logradouro' => 'required|max:100',
            'numero_imovel' => 'required|max:30',
            'complemento_endereco' => 'max:30',
            'ponto_referencia' => 'max:30'
        );
    }

    private function setEmpresa(Request $request, Empresa &$empresa)
    {   
        $empresa->nome = $request->input('nome');
        $empresa->setCnpj($request->input('cnpj'));
        $empresa->email = $request->input('email');
        $empresa->setTelefone($request->input('telefone'));
        $empresa->setCep($request->input('cep'));
        $empresa->cidade = $request->input('cidade');
        $empresa->bairro = $request->input('bairro');
        $empresa->logradouro = $request->input('logradouro');
        $empresa->numero_imovel = $request->input('numero_imovel');
        $empresa->complemento_endereco = $request->input('complemento_endereco');
        $empresa->ponto_referencia = $request->input('ponto_referencia');       
    }
}
