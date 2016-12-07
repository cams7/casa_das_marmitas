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

//Route::get('pedido_item/{id}', 'PedidoItemController@show');
Route::post('pedido_item', 'PedidoItemController@store');
//Route::put('pedido_item/{id}', 'PedidoItemController@update');
//Route::delete('pedido_item/{id}', 'PedidoItemController@destroy');

Route::get('empresas/{nome}', 'EmpresaController@getEmpresas');
Route::get('clientes/{nome}', 'ClienteController@getClientes');
Route::get('produtos/{nome}', 'ProdutoController@getProdutos');
Route::get('taxas/{taxa}', 'TaxaController@getTaxas');

Route::get('pagination/clientes', 'ClienteController@getPaginacao');
Route::get('pagination/cliente_pedidos', 'ClienteController@getPedidos');
Route::get('pagination/empresas', 'EmpresaController@getPaginacao');
Route::get('pagination/empresa_entregadores', 'EmpresaController@getEntregadores');
Route::get('pagination/entregadores', 'EntregadorController@getPaginacao');
Route::get('pagination/funcionarios', 'FuncionarioController@getPaginacao');
Route::get('pagination/pedidos', 'PedidoController@getPaginacao');
Route::get('pagination/produtos', 'ProdutoController@getPaginacao');
Route::get('pagination/produto_itens', 'ProdutoController@getItens');
Route::get('pagination/taxas', 'TaxaController@getPaginacao');