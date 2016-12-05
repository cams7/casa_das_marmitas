<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Taxa;

class TaxaController extends Controller
{
    //private $taxa;

    /*public function __construct(Taxa $taxa)  
    {
        $this->taxa = $taxa;
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxas = Taxa::paginate(10);
        return view('taxa.index')->with('taxas', $taxas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('taxa.create')->with('taxa', null);
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
        $taxa = new Taxa;
        $taxa->user_id = $userId;

        $this->setTaxa($request, $taxa);        

        $taxa->save();

        return redirect('taxa')->with('message', 'A taxa foi cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the taxa
        $taxa = Taxa::find($id);

        return view('taxa.show')->with('taxa', $taxa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the taxa
        $taxa = Taxa::find($id);

        return view('taxa.edit')->with('taxa', $taxa);
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

        $taxa = Taxa::find($id);

        $this->setTaxa($request, $taxa);        

        $taxa->save();

        return redirect('taxa')->with('message', 'A taxa foi atualizada com sucesso!');
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
        $taxa = Taxa::find($id);
        $taxa->delete();

        // redirect
        return redirect('taxa')->with('message', 'A taxa foi excluída com sucesso!');
    }

    private function getRoles()
    {
        return array(
            'taxa' => 'required',
            'tipo_taxa' => 'required|integer|between:1,3'
        );
    }

    private function setTaxa(Request $request, Taxa &$taxa)
    {   
        $taxa->setTaxa($request->input('taxa'));
        $taxa->tipo_taxa = $request->input('tipo_taxa');       
    }
}
