<div class="form-group">
    {{ Form::label('nome', 'Nome:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-6">
    	{{ Form::text('nome', $funcionario != null ? $funcionario->user->name : null, array('class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'Nome do funcionário')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('email', 'E-mail:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-6">
        {{ Form::text('email', $funcionario != null ? $funcionario->user->email : null, array('class' => 'form-control', 'maxlength' => '50', 'placeholder' => 'E-mail do funcionário')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('senha', 'Senha:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-4">
        {{ Form::password('senha', null, array('class' => 'form-control', 'maxlength' => '20', 'placeholder' => 'Senha do funcionário')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('senha_confirmacao', 'Confirmação:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-4">
        {{ Form::password('senha_confirmacao', null, array('class' => 'form-control', 'maxlength' => '20', 'placeholder' => 'Confirmação da senha')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('cargo', 'Cargo:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-2">        
        {{ Form::select('cargo', array('1'=>'Gerente', '2'=> 'Atendente'), null, array('class' => 'form-control')) }}
    </div>
</div>