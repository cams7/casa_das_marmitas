@extends('layouts.master')
@section('title', 'Lista de empresas')

@section('jquery_content')
@endsection

@section('sidebar')	
    @include('empresa.menu')
@endsection

@section('content')
	<table class="table table-striped table-bordered">
	    <thead>
	        <tr>
	            <th>Nome</th>
	            <th>CNPJ</th>
	            <th>E-mail</th>
	            <th>Telefone</th>
	            <th>Cidade</th>
	            <th>Bairro</th>
	            <th></th>
	        </tr>
	    </thead>
	    <tbody>
	    @foreach($empresas as $i => $empresa)
	        <tr>
	            <td>{{ $empresa->nome }}</td>
	            <td>{{ $empresa->getCnpj() }}</td>
	            <td>{{ $empresa->email }}</td>
	            <td>{{ $empresa->getTelefone() }}</td>
	            <td>{{ $empresa->cidade }}</td>
	            <td>{{ $empresa->bairro }}</td>

	            <!-- we will also add show, edit, and delete buttons -->
	            <td>

	                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
	                <!-- we will add this later since its a little more complicated than the other two buttons -->
	                {{ Form::open(array('url' => 'empresa/' . $empresa->id, 'class' => 'pull-right')) }}
	                    {{ Form::hidden('_method', 'DELETE') }}
	                    {{ Form::submit('Exclui', array('class' => 'btn btn-warning')) }}
	                {{ Form::close() }}


	                <!-- show the nerd (uses the show method found at GET /empresa/{id} -->
	                <a class="btn btn-small btn-success" href="{{ URL::to('empresa/' . $empresa->id) }}">Visualiza</a>

	                <!-- edit this nerd (uses the edit method found at GET /empresa/{id}/edit -->
	                <a class="btn btn-small btn-info" href="{{ URL::to('empresa/' . $empresa->id . '/edit') }}">Altera</a>
	            </td>
	        </tr>
	    @endforeach
	    </tbody>
	</table>
@endsection