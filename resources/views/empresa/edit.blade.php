@extends('layouts.master')
@section('title', 'Editar Empresa')

@section('jquery_content')	
@endsection

@section('content')
	<h3 class="page-header">{{'Editar Empresa #'.$empresa->id}}</h3>

	@include('layouts.errors')

	{{ Form::model($empresa, array('route' => array('empresa.update', $empresa->id), 'method' => 'PUT')) }}
	    @include('empresa.form_fields')

	    <hr />
	    <div id="actions" class="row">
	  		<div class="col-md-12">
	    		{{ Form::submit('Alterar', array('class' => 'btn btn-primary')) }}
	    		<a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
	    	</div>
  		</div>
	{{ Form::close() }}
@endsection