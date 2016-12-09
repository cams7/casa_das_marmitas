<div class="row">
    <div class="form-group col-md-6 {{$errors->has('nome') ? 'has-error has-danger' : ''}}">
        {{ Form::label('nome', 'Nome:', array('class' => 'control-label')) }}
    	{{ Form::text('nome', $funcionario != null ? $funcionario->user->name : null, array('class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'Nome do funcionário')) }}
        <div class="help-block with-errors">{{ $errors->first('nome') }}</div>
    </div>

    <div class="form-group col-md-4 {{$errors->has('email') ? 'has-error has-danger' : ''}}">
        {{ Form::label('email', 'E-mail:', array('class' => 'control-label')) }}
        {{ Form::text('email', $funcionario != null ? $funcionario->user->email : null, array('class' => 'form-control', 'maxlength' => '50', 'placeholder' => 'E-mail do funcionário')) }}
        <div class="help-block with-errors">{{ $errors->first('email') }}</div>
    </div>

    <div class="form-group col-md-2 {{$errors->has('cargo') ? 'has-error has-danger' : ''}}">
        {{ Form::label('cargo', 'Cargo:', array('class' => 'control-label')) }}     
        {{ Form::select('cargo', array('1'=>'Gerente', '2'=> 'Atendente'), null, array('class' => 'form-control')) }}
        <div class="help-block with-errors">{{ $errors->first('cargo') }}</div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6 {{$errors->has('senha') ? 'has-error has-danger' : ''}}">
        {{ Form::label('senha', 'Senha:', array('class' => 'control-label')) }}
        {{ Form::password('senha', array('class' => 'form-control', 'maxlength' => '20', 'placeholder' => 'Senha do funcionário')) }}
        <div class="help-block with-errors">{{ $errors->first('senha') }}</div>
    </div>
    <div class="form-group col-md-6 {{$errors->has('senha_confirmacao') ? 'has-error has-danger' : ''}}">
        {{ Form::label('senha_confirmacao', 'Confirmação:', array('class' => 'control-label')) }}
        {{ Form::password('senha_confirmacao', array('class' => 'form-control', 'maxlength' => '20', 'placeholder' => 'Confirmação da senha')) }}
        <div class="help-block with-errors">{{ $errors->first('senha_confirmacao') }}</div>
    </div>
</div>

@section('jquery_content')  
@endsection