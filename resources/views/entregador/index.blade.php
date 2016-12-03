@extends('layouts.master')
@section('title', 'Lista de entregadores')

@section('jquery_content')
@endsection

@section('sidebar')	
    @include('entregador.menu')
@endsection

@section('content')
	<table class="table table-striped table-bordered">
	    <thead>
	        <tr>
	            <th>Nome</th>
	            <th>Empresa</th>
	            <th>CPF</th>
	            <th>Celular</th>
	            <th></th>
	        </tr>
	    </thead>
	    <tbody>
	    @foreach($entregadores as $i => $entregador)
	        <tr>
	            <td>{{ $entregador->nome }}</td>
	            <td>{{ $entregador->empresa->nome }}</td>
	            <td>{{ $entregador->getCpf() }}</td>
	            <td>{{ $entregador->getCelular() }}</td>

	            <!-- we will also add show, edit, and delete buttons -->
	            <td>

	                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
	                <!-- we will add this later since its a little more complicated than the other two buttons -->
	                {{ Form::open(array('url' => 'entregador/' . $entregador->id, 'class' => 'pull-right')) }}
	                    {{ Form::hidden('_method', 'DELETE') }}
	                    {{ Form::submit('Exclui', array('class' => 'btn btn-warning')) }}
	                {{ Form::close() }}


	                <!-- show the nerd (uses the show method found at GET /entregador/{id} -->
	                <a class="btn btn-small btn-success" href="{{ URL::to('entregador/' . $entregador->id) }}">Visualiza</a>

	                <!-- edit this nerd (uses the edit method found at GET /entregador/{id}/edit -->
	                <a class="btn btn-small btn-info" href="{{ URL::to('entregador/' . $entregador->id . '/edit') }}">Altera</a>
	            </td>
	        </tr>
	    @endforeach
	    </tbody>
	</table>
@endsection