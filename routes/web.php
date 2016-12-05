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
Route::resource('pedido_item', 'PedidoItemController');
Route::resource('produto', 'ProdutoController');
Route::resource('empresa', 'EmpresaController');
Route::resource('entregador', 'EntregadorController');
Route::resource('taxa', 'TaxaController');
Route::resource('funcionario', 'FuncionarioController');

Route::get('ajax/empresas/{nome}', 'EmpresaController@getEmpresas');

Route::get('ajax/cliente/pagination', function () {
    $query = Request::get('q');

	$clientes = App\Cliente::getClientes($query);
    
    $clientes = $clientes->paginate(10);

    return view('cliente.pagination')->with('clientes', $clientes)->render();
});

Route::get('ajax/empresa/pagination', function () {
	$query = Request::get('q');

    $empresas = App\Empresa::getEmpresas($query);
    
    $empresas = $empresas->paginate(10);

    return view('empresa.pagination')->with('empresas', $empresas)->render();
});

Route::get('ajax/entregador/pagination', function () {
	$query = Request::get('q');

    $entregadores = App\Entregador::getEntregadores($query);

    $entregadores = $entregadores->paginate(10);

    return view('entregador.pagination')->with('entregadores', $entregadores)->render();
});

Route::get('ajax/funcionario/pagination', function () {
    $query = Request::get('q');

    $funcionarios = App\Funcionario::getFuncionarios($query);

    $funcionarios = $funcionarios->paginate(10);

    return view('funcionario.pagination')->with('funcionarios', $funcionarios)->render();
});

Route::get('ajax/pedido/pagination', function () {
	$query = Request::get('q');

    $pedidos = App\Pedido::getPedidos($query);

    $pedidos = $pedidos->paginate(10);

    return view('pedido.pagination')->with('pedidos', $pedidos)->render();
});

Route::get('ajax/produto/pagination', function () {
	$query = Request::get('q');

    $produtos = App\Produto::getProdutos($query);

    $produtos = $produtos->paginate(10);

    return view('produto.pagination')->with('produtos', $produtos)->render();
});

Route::get('ajax/taxa/pagination', function () {
	$query = Request::get('q');

    $taxas = App\Taxa::getTaxas($query);

    $taxas = $taxas->paginate(10);

    return view('taxa.pagination')->with('taxas', $taxas)->render();
});