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
    $query = Request::get('q');

	$clientes = App\Cliente::orderBy('id', 'desc');

    if($query !== '') 
    {
        $query = "%". trim($query) ."%";
        $clientes =  $clientes->where('nome', 'ILIKE', $query);
    }
    
    $clientes = $clientes->paginate(10);

    return view('cliente.pagination')->with('clientes', $clientes)->render();
});

Route::get('/ajax/empresa/pagination', function () {
	$query = Request::get('q');

    $empresas = App\Empresa::orderBy('id', 'desc');

    if($query !== '')
    {
        $query = "%". trim($query) ."%";
        $empresas =  $empresas->where('nome', 'ilike', $query);
    }

    $empresas = $empresas->paginate(10);

    return view('empresa.pagination')->with('empresas', $empresas)->render();
});

Route::get('/ajax/entregador/pagination', function () {
	$query = Request::get('q');

    $entregadores = App\Entregador::orderBy('id', 'desc');

    if($query !== '')
    {
        $query = "%". trim($query) ."%";
        $entregadores =  $entregadores->where('nome', 'ilike', $query);
    }

    $entregadores = $entregadores->paginate(10);

    return view('entregador.pagination')->with('entregadores', $entregadores)->render();
});

Route::get('/ajax/funcionario/pagination', function () {
    $query = Request::get('q');

    $funcionarios = App\Funcionario::orderBy('funcionarios.id', 'desc');

    if($query !== '') 
    {
        $query = "%". trim($query) ."%";
        $funcionarios =  $funcionarios->leftJoin('users', 'funcionarios.id', '=', 'users.id');
        $funcionarios =  $funcionarios->where('users.name', 'ilike', $query);
    }

    $funcionarios = $funcionarios->paginate(10);

    return view('funcionario.pagination')->with('funcionarios', $funcionarios)->render();
});

Route::get('/ajax/pedido/pagination', function () {
	$query = Request::get('q');

    $pedidos = App\Pedido::orderBy('pedidos.id', 'desc');

    if($query !== '') 
    {
        $query = "%". trim($query) ."%";
        $pedidos =  $pedidos->leftJoin('clientes', 'pedidos.cliente_id', '=', 'clientes.id');
        $pedidos =  $pedidos->where('clientes.nome', 'ilike', $query);
    }

    $pedidos = $pedidos->paginate(10);

    return view('pedido.pagination')->with('pedidos', $pedidos)->render();
});

Route::get('/ajax/produto/pagination', function () {
	$query = Request::get('q');

    $produtos = App\Produto::orderBy('id', 'desc');

    if($query !== '')
    {
        $query = "%". trim($query) ."%";
        $produtos =  $produtos->where('nome', 'ilike', $query);
    }

    $produtos = $produtos->paginate(10);

    return view('produto.pagination')->with('produtos', $produtos)->render();
});

Route::get('/ajax/taxa/pagination', function () {
	$query = Request::get('q');

    $taxas = App\Taxa::orderBy('id', 'desc');

    if($query !== '')
    {
        $query = trim($query);
        $query = str_replace(',', '.', $query);
        $query = preg_replace('/[^\d,\.]/', '', $query);        
        
        if(is_numeric($query))
            $taxas =  $taxas->where('taxa', '>=', $query);
    }

    $taxas = $taxas->paginate(10);

    return view('taxa.pagination')->with('taxas', $taxas)->render();
});