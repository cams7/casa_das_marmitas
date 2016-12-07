<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('nome', 'Nome:', array()) }}
    	{{ Form::text('nome', null, array('class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'Nome do entregador')) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('empresa_nome', 'Empresa:', array()) }}
        {{ Form::text('empresa_nome', $entregador != null ? $entregador->empresa->nome : null, array('id' => 'empresa_nome', 'class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'Nome da empresa')) }}
        <input type="hidden" id="empresa_id" name="empresa_id" value="{{session('empresa_id') != null ? session('empresa_id') : ($entregador != null ? $entregador->empresa->id : '')}}">
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        {{ Form::label('celular', 'Celular:', array()) }}
        {{ Form::text('celular', $entregador != null ? $entregador->getCelular() : null, array('id' => 'celular', 'class' => 'form-control', 'placeholder' => '(99) 99999-9999', 'maxlength' => '15')) }}
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('cpf', 'CPF:', array()) }}
        {{ Form::text('cpf', $entregador != null ? $entregador->getCpf() : null, array('id' => 'cpf', 'class' => 'form-control', 'placeholder' => '999.999.999-99', 'maxlength' => '14')) }}
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('rg', 'RG:', array()) }}
        {{ Form::text('rg', null, array('id' => 'rg', 'class' => 'form-control', 'placeholder' => '99999999', 'maxlength' => '10')) }}
    </div>
</div>

@section('jquery_content')
    <script src="{{ URL::asset('js/casa_das_marmitas-entregador.js') }}"></script>
@endsection