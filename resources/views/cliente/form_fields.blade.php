<div class="form-group">
    {{ Form::label('nome', 'Nome:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-6">
    	{{ Form::text('nome',null, array('class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'Nome do cliente')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('nascimento', 'Nascimento:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-2">
    	{{ Form::date('nascimento', $cliente != null ? $cliente->getNascimento() : null, array('id' => 'nascimento','class' => 'form-control', 'placeholder' => '99/99/9999', 'maxlength' => '10')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('telefone', 'Telefone:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-2">
    	{{ Form::text('telefone', $cliente != null ? $cliente->getTelefone() : null, array('id' => 'telefone', 'class' => 'form-control', 'placeholder' => '(99) 9999-9999', 'maxlength' => '14')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('cep', 'CEP:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-2">
    	{{ Form::text('cep', $cliente != null ? $cliente->getCep() : null, array('id' => 'cep', 'class' => 'form-control', 'placeholder' => '99.999.999', 'maxlength' => '10')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('cidade', 'Cidade:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-6">
    	{{ Form::text('cidade',null, array('id' => 'cidade', 'class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'Nome da cidade')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('bairro', 'Bairro:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-6">
    	{{ Form::text('bairro',null, array('id' => 'bairro', 'class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'Nome do bairro')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('logradouro', 'Logradouro:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-8">
    	{{ Form::text('logradouro',null, array('id' => 'logradouro', 'class' => 'form-control', 'maxlength' => '100', 'placeholder' => 'Nome do logradouro')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('numero_residencial', 'Número:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-4">
    	{{ Form::text('numero_residencial',null, array('id' => 'numero_residencial', 'class' => 'form-control', 'maxlength' => '30', 'placeholder' => 'Número residencial')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('complemento_endereco', 'Complemento:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-4">
    	{{ Form::text('complemento_endereco',null, array('id' => 'complemento_endereco', 'class' => 'form-control', 'maxlength' => '30', 'placeholder' => 'Complemento do endereço')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('ponto_referencia', 'Ponto de referência:', array('class' => 'control-label col-sm-2')) }}
    <div class="col-sm-4">
    	{{ Form::text('ponto_referencia',null, array('id' => 'ponto_referencia', 'class' => 'form-control', 'maxlength' => '30', 'placeholder' => 'Ponto de referência')) }}
    </div>
</div>