<div class="row">
    <div class="form-group col-md-6 {{$errors->has('cliente_id') ? 'has-error has-danger' : ''}}">
        {{ Form::label('cliente_nome', 'Cliente:', array('class' => 'control-label')) }}
        {{ Form::text('cliente_nome', $pedido != null ? $pedido->cliente->nome : null, array('id' => 'cliente_nome', 'class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'Nome do cliente')) }}
        <div class="help-block with-errors">{{ $errors->first('cliente_id') }}</div>
        <input type="hidden" id="cliente_id" name="cliente_id" value="{{session('cliente_id') != null ? session('cliente_id') : ($pedido != null ? $pedido->cliente->id : '')}}">
    </div>
    <div class="form-group col-md-2 {{$errors->has('taxa_id') ? 'has-error has-danger' : ''}}">
        {{ Form::label('taxa', 'Taxa:', array('class' => 'control-label')) }}
        {{ Form::text('taxa', $pedido != null ? $pedido->taxa->getTaxa() : null, array('id' => 'taxa', 'class' => 'form-control', 'placeholder' => 'Valor da taxa')) }}
        <div class="help-block with-errors">{{ $errors->first('taxa_id') }}</div>
        <input type="hidden" id="taxa_id" name="taxa_id" value="{{session('taxa_id') != null ? session('taxa_id') : ($pedido != null ? $pedido->taxa->id : '')}}">
    </div>
    <div class="form-group col-md-4 {{$errors->has('situacao_pedido') ? 'has-error has-danger' : ''}}">    
        {{ Form::label('situacao_pedido', 'Situação:', array('class' => 'control-label')) }}        
        {{ Form::select('situacao_pedido', array('1'=>'Pendente', '2'=> 'Em trânsito', '3'=> 'Cancelado', '4'=> 'Entregue'), null, array('class' => 'form-control')) }}
        <div class="help-block with-errors">{{ $errors->first('situacao_pedido') }}</div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4 {{$errors->has('quantidade_total') ? 'has-error has-danger' : ''}}">
        {{ Form::label('quantidade_total', 'Quantidade total:', array('class' => 'control-label')) }}
        {{ Form::text('quantidade_total', null, array('readonly' => 'readonly', 'class' => 'form-control')) }}
        <div class="help-block with-errors">{{ $errors->first('quantidade_total') }}</div>
    </div>
    <div class="form-group col-md-4 {{$errors->has('total_pedido') ? 'has-error has-danger' : ''}}">
        {{ Form::label('total_pedido', 'Custo total:', array('class' => 'control-label')) }}
        {{ Form::text('total_pedido', $pedido != null ? $pedido->getCustoTotal() : null, array('readonly' => 'readonly', 'class' => 'form-control')) }}
        <div class="help-block with-errors">{{ $errors->first('total_pedido') }}</div>
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('created_at', 'Cadastro:', array('class' => 'control-label')) }}
        {{ Form::text('created_at', $pedido != null ? $pedido->getCadastro() : null, array('readonly' => 'readonly', 'class' => 'form-control')) }}
    </div>    
</div>
<input type="hidden" id="pedido_id" value="{{ $pedido != null ? $pedido->id : null }}">

@section('jquery_content')
    <script src="{{ URL::asset('js/validator.min.js') }}"></script>
    
    <script src="{{ URL::asset('js/casa_das_marmitas-pedido.js') }}"></script>
    <script src="{{ URL::asset('js/casa_das_marmitas-pedido_item.js') }}"></script>       
@endsection