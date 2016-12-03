@extends('layouts.master')
@section('title', 'Cadastra cliente')

@section('jquery_content')
	<script src="{{ URL::asset('js/ui.datepicker-pt-BR.js') }}"></script>
	<script>
  	jQuery(function($){
    	$("#nascimento").datepicker();
  	});  
  	</script>
@endsection

@section('sidebar')
	@include('cliente.menu')
@endsection

@section('content')	
	@include('layouts.errors')

	{{ Form::open(array('url' => 'cliente', 'class' => 'form-horizontal')) }}
	    @include('cliente.form_fields')

	    <div class="form-group">
    		<div class="col-sm-offset-2 col-sm-10">
	    		{{ Form::submit('Cadastra', array('class' => 'btn btn-primary')) }}
	    	</div>
  		</div>
	{{ Form::close() }}


	<?php
  	/*echo Form::open(['url' => 'foo/bar']);
    echo Form::text('username','username');
    echo '<br/>';
    echo Form::text('email','yourmail@here.com');
    echo '<br/>';
    echo Form::password('password');
    echo '<br/>';
    echo Form::checkbox('name','value');
    echo '<br/>';
    echo Form::radio('name','value');
    echo '<br/>';
    echo Form::file('image');
    echo '<br/>';
    echo Form::select('Gender',['P'=>'perempuan','L'=> 'Laki-laki']);
    echo '<br/>';
    echo Form::submit('Register Now');
  	echo Form::close();*/ 
  	?>
@endsection