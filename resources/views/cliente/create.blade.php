@extends('layouts.master')
@section('title', 'Cadastra novo cliente')

@section('sidebar')
	@parent
	<ul class="nav navbar-nav">
        <li><a href="{{ URL::to('cliente') }}">Lista</a></li>
        <li><a href="{{ URL::to('cliente/create') }}">Novo</a>
    </ul>
@endsection

@section('content')
	<h1>Cadastra novo cliente</h1>

	<?php
  	echo Form::open(['url' => 'foo/bar']);
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
  	echo Form::close(); 
  	?>
@endsection