<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produto;

class ProdutoController extends Controller
{
    private $produto;

    public function __construct(Produto $produto)  
    {
        $this->produto = $produto;
    }

    public function index()
    {
        $produtos = $this->produto->all();
        return view('produto.index')->with('produtos',$produtos);
    }
}
