@extends('layouts.master')
@section('title', 'Editar Taxa')

@section('content')
	<h3 class="page-header">{{'Editar Taxa #'.$taxa->id}}</h3>

	{{ Form::model($taxa, array('route' => array('taxa.update', $taxa->id), 'method' => 'PUT')) }}
	    @include('taxa.form_fields')

	    <hr />
	    <div id="actions" class="row">
	  		<div class="col-md-12">
	    		{{ Form::submit('Alterar', array('class' => 'btn btn-primary')) }}
	    		<a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
	    	</div>
  		</div>
	{{ Form::close() }}
@endsection