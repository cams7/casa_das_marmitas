<div class="form-group">
    {{ Form::label('nome', 'Nome:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-6">
    	{{ Form::text('nome',null, array('class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'Nome do entregador')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('cpf', 'CPF:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-2">
        {{ Form::text('cpf', $entregador != null ? $entregador->getCpf() : null, array('id' => 'cpf', 'class' => 'form-control', 'placeholder' => '999.999.999-99', 'maxlength' => '14')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('rg', 'RG:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-2">
        {{ Form::text('rg', null, array('id' => 'rg', 'class' => 'form-control', 'placeholder' => '99999999', 'maxlength' => '10')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('celular', 'Celular:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-2">
        {{ Form::text('celular', $entregador != null ? $entregador->getCelular() : null, array('id' => 'celular', 'class' => 'form-control', 'placeholder' => '(99) 99999-9999', 'maxlength' => '15')) }}
    </div>
</div>