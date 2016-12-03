@extends('layouts.master')
@section('title', 'Lista de funcionários')

@section('jquery_content')
@endsection

@section('sidebar')	
    @include('funcionario.menu')
@endsection

@section('content')
	<table class="table table-striped table-bordered">
	    <thead>
	        <tr>
	            <th>Nome</th>
	            <th>E-mail</th>
	            <th>Cargo</th>
	            <th></th>
	        </tr>
	    </thead>
	    <tbody>
	    @foreach($funcionarios as $i => $funcionario)
	        <tr>
	            <td>{{ $funcionario->user->name }}</td>
	            <td>{{ $funcionario->user->email }}</td>
	            <td>{{ $funcionario->getCargo() }}</td>

	            <!-- we will also add show, edit, and delete buttons -->
	            <td>

	                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
	                <!-- we will add this later since its a little more complicated than the other two buttons -->
	                {{ Form::open(array('url' => 'funcionario/' . $funcionario->id, 'class' => 'pull-right')) }}
	                    {{ Form::hidden('_method', 'DELETE') }}
	                    {{ Form::submit('Exclui', array('class' => 'btn btn-warning')) }}
	                {{ Form::close() }}


	                <!-- show the nerd (uses the show method found at GET /funcionario/{id} -->
	                <a class="btn btn-small btn-success" href="{{ URL::to('funcionario/' . $funcionario->id) }}">Visualiza</a>

	                <!-- edit this nerd (uses the edit method found at GET /funcionario/{id}/edit -->
	                <a class="btn btn-small btn-info" href="{{ URL::to('funcionario/' . $funcionario->id . '/edit') }}">Altera</a>
	            </td>
	        </tr>
	    @endforeach
	    </tbody>
	</table>
@endsection