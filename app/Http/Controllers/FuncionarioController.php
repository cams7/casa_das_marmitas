<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Funcionario;
use App\User;

class FuncionarioController extends Controller
{
    //private $funcionario;

    /*public function __construct(Funcionario $funcionario)  
    {
        $this->funcionario = $funcionario;
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = Funcionario::all();
        return view('funcionario.index')->with('funcionarios', $funcionarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('funcionario.create')->with('funcionario', null);
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
            
        // store        
        $user = new User;

        $this->setUser($request, $user);

        $user->save(); 

        $userId = DB::table('users')->max('id');

        $funcionario = new Funcionario;
        $funcionario->id = $userId;       

        $this->setFuncionario($request, $funcionario);             

        $funcionario->save();

        return redirect('funcionario')->with('message', 'O funcionario foi cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the funcionario
        $funcionario = Funcionario::find($id);
        //$user = $funcionario->user;

        //$funcionario->setNome($user->name);
        //$funcionario->setEmail($user->email);

        return view('funcionario.show')->with('funcionario', $funcionario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the funcionario
        $funcionario = Funcionario::find($id);
        //$user = $funcionario->user;

        /*$funcionario->nome = $user->name;
        $funcionario->email = $user->email;*/

        return view('funcionario.edit')->with('funcionario', $funcionario);
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

        $funcionario = Funcionario::find($id);
        $user = $funcionario->user;

        $this->setUser($request, $user);

        $user->save();

        $this->setFuncionario($request, $funcionario);        

        $funcionario->save();

        return redirect('funcionario')->with('message', 'O funcionario foi atualizado com sucesso!');
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
        $funcionario = Funcionario::find($id);
        $user = $funcionario->user;

        $funcionario->delete();
        $user->delete();

        // redirect
        return redirect('funcionario')->with('message', 'O funcionario foi excluído com sucesso!');
    }

    private function getRoles()
    {
        return array(
            'nome' => 'required|max:60',
            'email' => 'required|email|max:50',
            'senha' => 'required|max:20',
            'senha_confirmacao' => 'required|max:20',  
            'cargo' => 'required|integer|between:1,2'
        );
    }

    
    private function setUser(Request $request, User &$user)
    {
        $user->name  = $request->input('nome');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('senha'));  
    }

    private function setFuncionario(Request $request, Funcionario &$funcionario)
    {   
        $funcionario->cargo = $request->input('cargo');       
    }
}