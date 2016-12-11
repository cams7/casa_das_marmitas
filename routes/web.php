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

Route::get('pedido_item/{id}', 'PedidoItemController@show');
Route::get('pedido_item/produto/{id}', 'PedidoItemController@show');

//Route::post('pedido_item', 'PedidoItemController@store');
Route::post('pedido_item/produto', 'PedidoItemController@store');

Route::put('pedido_item/{id}', 'PedidoItemController@update');
Route::put('pedido_item/produto/{id}', 'PedidoItemController@update');

Route::delete('pedido_item/{id}', 'PedidoItemController@destroy');
Route::delete('pedido_item/produto/{id}', 'PedidoItemController@destroy');

Route::get('empresas/{nome}', 'EmpresaController@getEmpresas');
Route::get('clientes/{nome}', 'ClienteController@getClientes');
Route::get('produtos/{nome}', 'ProdutoController@getProdutos');
Route::get('taxas/{taxa}', 'TaxaController@getTaxas');

Route::get('paginacao/clientes', 'ClienteController@getPaginacao');
Route::get('paginacao/cliente_pedidos', 'ClienteController@getPaginacaoPedidos');
Route::get('paginacao/empresas', 'EmpresaController@getPaginacao');
Route::get('paginacao/empresa_entregadores', 'EmpresaController@getPaginacaoEntregadores');
Route::get('paginacao/entregadores', 'EntregadorController@getPaginacao');
Route::get('paginacao/funcionarios', 'FuncionarioController@getPaginacao');
Route::get('paginacao/pedidos', 'PedidoController@getPaginacao');
Route::get('paginacao/pedido_itens', 'PedidoController@getPaginacaoItens');
Route::get('lista/pedido_itens', 'PedidoController@getItens');
Route::get('paginacao/produtos', 'ProdutoController@getPaginacao');
Route::get('paginacao/produto_itens', 'ProdutoController@getPaginacaoItens');
Route::get('paginacao/taxas', 'TaxaController@getPaginacao');