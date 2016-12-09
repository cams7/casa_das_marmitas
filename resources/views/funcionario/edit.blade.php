@extends('layouts.master')
@section('title', 'Editar Funcionário')

@section('content')
	<h3 class="page-header">{{'Editar Funcionário #'.$funcionario->id}}</h3>

	{{ Form::model($funcionario, array('route' => array('funcionario.update', $funcionario->id), 'method' => 'PUT')) }}
	    @include('funcionario.form_fields')

	    <hr />
	    <div id="actions" class="row">
	  		<div class="col-md-12">
	    		{{ Form::submit('Alterar', array('class' => 'btn btn-primary')) }}
	    		<a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
	    	</div>
  		</div>
	{{ Form::close() }}
@endsection