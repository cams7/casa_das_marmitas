@extends('layouts.master')
@section('title', 'Cadastra funcionário')

@section('jquery_content')	
@endsection

@section('sidebar')
	@include('funcionario.menu')
@endsection

@section('content')	
  @include('layouts.errors')

	{{ Form::open(array('url' => 'funcionario', 'class' => 'form-horizontal')) }}
	    @include('funcionario.form_fields')

	    <div class="form-group">
    		<div class="col-sm-offset-2 col-sm-10">
	    		{{ Form::submit('Cadastra', array('class' => 'btn btn-primary')) }}
	    	</div>
  		</div>
	{{ Form::close() }}	
@endsection