@extends('layouts.master')
@section('title', 'Altera empresa')

@section('jquery_content')	
@endsection

@section('sidebar')
	@include('empresa.menu')
@endsection

@section('content')	
	@include('layouts.errors')

	{{ Form::model($empresa, array('route' => array('empresa.update', $empresa->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
	    @include('empresa.form_fields')

	    <div class="form-group">
    		<div class="col-sm-offset-2 col-sm-10">
	    		{{ Form::submit('Altera', array('class' => 'btn btn-primary')) }}
	    	</div>
  		</div>
	{{ Form::close() }}
@endsection