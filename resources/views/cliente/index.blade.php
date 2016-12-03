@extends('layouts.master')
@section('title', 'Lista de clientes')

@section('jquery_content')
@endsection

@section('sidebar')	
    @include('cliente.menu')
@endsection

@section('content')
	<table class="table table-striped table-bordered">
	    <thead>
	        <tr>
	            <th>Nome</th>
	            <th>Telefone</th>
	            <th>Cidade</th>
	            <th>Bairro</th>
	            <th></th>
	        </tr>
	    </thead>
	    <tbody>
	    @foreach($clientes as $i => $cliente)
	        <tr>
	            <td>{{ $cliente->nome }}</td>
	            <td>{{ $cliente->telefone }}</td>
	            <td>{{ $cliente->cidade }}</td>
	            <td>{{ $cliente->bairro }}</td>

	            <!-- we will also add show, edit, and delete buttons -->
	            <td>

	                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
	                <!-- we will add this later since its a little more complicated than the other two buttons -->
	                {{ Form::open(array('url' => 'cliente/' . $cliente->id, 'class' => 'pull-right')) }}
	                    {{ Form::hidden('_method', 'DELETE') }}
	                    {{ Form::submit('Exclui', array('class' => 'btn btn-warning')) }}
	                {{ Form::close() }}


	                <!-- show the nerd (uses the show method found at GET /cliente/{id} -->
	                <a class="btn btn-small btn-success" href="{{ URL::to('cliente/' . $cliente->id) }}">Visualiza</a>

	                <!-- edit this nerd (uses the edit method found at GET /cliente/{id}/edit -->
	                <a class="btn btn-small btn-info" href="{{ URL::to('cliente/' . $cliente->id . '/edit') }}">Altera</a>
	            </td>
	        </tr>
	    @endforeach
	    </tbody>
	</table>
@endsection