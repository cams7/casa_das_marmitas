<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Produto;
use App\PedidoItem;

class ProdutoController extends Controller
{
    //private $produto;
    private static $TOTAL_PAGINACAO = 10;
    private static $TOTAL_ITENS = 5;

    /*public function __construct(Produto $produto)  
    {
        $this->produto = $produto;
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::getPaginacaoByQuery(self::$TOTAL_PAGINACAO);
        return view('produto.index')->with('produtos', $produtos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produto.create')->with('produto', null);
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
        $produto = new Produto;
        $produto->user_id = $userId;

        $this->setProduto($request, $produto);        

        $produto->save();

        return redirect('produto')->with('message', 'O produto foi cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the produto
        $produto = Produto::find($id);
        $itens = PedidoItem::getPaginacaoByProdutoId(self::$TOTAL_ITENS, $id);

        return view('produto.show', ['produto' => $produto, 'itens' => $itens]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the produto
        $produto = Produto::find($id);

        return view('produto.edit')->with('produto', $produto);
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

        $produto = Produto::find($id);

        $this->setProduto($request, $produto);        

        $produto->save();

        return redirect('produto')->with('message', 'O produto foi atualizado com sucesso!');
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
        $produto = Produto::find($id);
        $produto->delete();

        // redirect
        return redirect('produto')->with('message', 'O produto foi excluído com sucesso!');
    }

    public function getPaginacao(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->get('q');

            $produtos = Produto::getPaginacaoByQuery(self::$TOTAL_PAGINACAO, $query);

            return view('produto.paginacao')->with('produtos', $produtos)->render();
        } 
            
        return response()->json(['message' => 'Método não permitido'], 405);
    }

    public function getPaginacaoItens(Request $request)
    {
        if($request->ajax())
        {
            $produtoId = $request->get('produto_id');

            $itens = PedidoItem::getPaginacaoByProdutoId(self::$TOTAL_ITENS, $produtoId);

            return view('produto.paginacao_itens')->with('itens', $itens)->render();
        } 
            
        return response()->json(['message' => 'Método não permitido'], 405);
    }

    public function getProdutos(Request $request, $nome)
    {          
        if($request->ajax())
        {
            $produtos = Produto::getPesquisaByQuery($nome);   
            return response()->json($produtos, 200);          
        } 
            
        return response()->json(['message' => 'Método não permitido'], 405); 
    }

    private function getRoles()
    {
        return array(
            'nome' => 'required|max:60',            
            'ingredientes' => 'required|min:20',
            'custo' => 'required',
            'tamanho' => 'required|integer|between:1,3'
        );
    }

    private function setProduto(Request &$request, Produto &$produto)
    {   
        $produto->nome  = $request->input('nome');
        $produto->ingredientes = $request->input('ingredientes');
        $produto->setCusto($request->input('custo'));
        $produto->tamanho = $request->input('tamanho');       
    }
}