<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('nome', 'Nome:', array()) }}
    	{{ Form::text('nome', $funcionario != null ? $funcionario->user->name : null, array('class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'Nome do funcionário')) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('email', 'E-mail:', array()) }}
        {{ Form::text('email', $funcionario != null ? $funcionario->user->email : null, array('class' => 'form-control', 'maxlength' => '50', 'placeholder' => 'E-mail do funcionário')) }}
    </div>

    <div class="form-group col-md-2">
        {{ Form::label('cargo', 'Cargo:', array()) }}     
        {{ Form::select('cargo', array('1'=>'Gerente', '2'=> 'Atendente'), null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('senha', 'Senha:', array()) }}
        {{ Form::password('senha', null, array('class' => 'form-control', 'maxlength' => '20', 'placeholder' => 'Senha do funcionário')) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('senha_confirmacao', 'Confirmação:', array()) }}
        {{ Form::password('senha_confirmacao', null, array('class' => 'form-control', 'maxlength' => '20', 'placeholder' => 'Confirmação da senha')) }}
    </div>
</div>

@section('jquery_content')  
@endsection