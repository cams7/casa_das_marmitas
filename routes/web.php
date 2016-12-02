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

Route::get('funcionarios', 'FuncionarioController@index');
Route::get('clientes', 'ClienteController@index');
Route::get('empresas', 'EmpresaController@index');
Route::get('entregadores', 'EntregadorController@index');
Route::get('produtos', 'ProdutoController@index');
Route::get('taxas', 'TaxaController@index');
Route::get('pedidos', 'PedidoController@index');
