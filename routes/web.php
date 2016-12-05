<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('cliente', 'ClienteController');
Route::resource('pedido', 'PedidoController');
Route::resource('produto', 'ProdutoController');
Route::resource('empresa', 'EmpresaController');
Route::resource('entregador', 'EntregadorController');
Route::resource('taxa', 'TaxaController');
Route::resource('funcionario', 'FuncionarioController');

Route::get('/ajax/cliente/pagination', function () {
	$clientes = App\Cliente::paginate(10);
    return view('cliente.pagination')->with('clientes', $clientes)->render();
});

Route::get('/ajax/empresa/pagination', function () {
	$empresas = App\Empresa::paginate(10);
    return view('empresa.pagination')->with('empresas', $empresas)->render();
});

Route::get('/ajax/entregador/pagination', function () {
	$entregadores = App\Entregador::paginate(10);
    return view('entregador.pagination')->with('entregadores', $entregadores)->render();
});

Route::get('/ajax/funcionario/pagination', function () {
	$funcionarios = App\Entregador::paginate(10);
    return view('funcionario.pagination')->with('funcionarios', $funcionarios)->render();
});

Route::get('/ajax/pedido/pagination', function () {
	$pedidos = App\Pedido::paginate(10);
    return view('pedido.pagination')->with('pedidos', $pedidos)->render();
});

Route::get('/ajax/produto/pagination', function () {
	$produtos = App\Produto::paginate(10);
    return view('produto.pagination')->with('produtos', $produtos)->render();
});

Route::get('/ajax/taxa/pagination', function () {
	$taxas = App\Taxa::paginate(10);
    return view('taxa.pagination')->with('taxas', $taxas)->render();
});