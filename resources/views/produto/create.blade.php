@extends('layouts.master')
@section('title', 'Cadastra produto')

@section('jquery_content')	
@endsection

@section('sidebar')
	@include('produto.menu')
@endsection

@section('content')	
  @include('layouts.errors')

	{{ Form::open(array('url' => 'produto', 'class' => 'form-horizontal')) }}
	    @include('produto.form_fields')

	    <div class="form-group">
    		<div class="col-sm-offset-2 col-sm-10">
	    		{{ Form::submit('Cadastra', array('class' => 'btn btn-primary')) }}
	    	</div>
  		</div>
	{{ Form::close() }}	
@endsection