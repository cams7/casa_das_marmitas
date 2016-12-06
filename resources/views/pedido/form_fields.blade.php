<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('cliente_nome', 'Cliente:', array()) }}
        {{ Form::text('cliente_nome', $pedido != null ? $pedido->cliente->nome : null, array('id' => 'cliente_nome', 'class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'Nome do cliente')) }}
        <input type="hidden" id="cliente_id" name="cliente_id" value="{{session('cliente_id') != null ? session('cliente_id') : ($pedido != null ? $pedido->cliente->id : '')}}">
    </div>
    <div class="form-group col-md-2">
        {{ Form::label('taxa', 'Taxa:', array()) }}
        {{ Form::text('taxa', $pedido != null ? $pedido->taxa->getTaxa() : null, array('id' => 'taxa', 'class' => 'form-control', 'placeholder' => 'Valor da taxa')) }}
        <input type="hidden" id="taxa_id" name="taxa_id" value="{{session('taxa_id') != null ? session('taxa_id') : ($pedido != null ? $pedido->taxa->id : '')}}">
    </div>
    <div class="form-group col-md-4">    
        {{ Form::label('situacao_pedido', 'Situação:', array()) }}        
        {{ Form::select('situacao_pedido', array('1'=>'Pendente', '2'=> 'Em trânsito', '3'=> 'Cancelado', '4'=> 'Entregue'), null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4">
        {{ Form::label('quantidade_total', 'Quantidade total:', array()) }}
        {{ Form::text('quantidade_total', null, array('readonly' => 'readonly', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('total_pedido', 'Custo total:', array()) }}
        {{ Form::text('total_pedido', $pedido != null ? $pedido->getCustoTotal() : null, array('readonly' => 'readonly', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('created_at', 'Cadastro:', array()) }}
        {{ Form::text('created_at', $pedido != null ? $pedido->getCadastro() : null, array('readonly' => 'readonly', 'class' => 'form-control')) }}
    </div>    
</div>

@section('jquery_content')  
    <script>   
        $(document).ready(function($){ 
            $("#cliente_nome").autocomplete({
                source : function(request, response) {
                    $.getJSON( "/ajax/clientes/"+ request.term, function( data ) {                        
                        response(
                            $.map(data, function (cliente, i) {
                                return {
                                    id: cliente.id,
                                    label: cliente.nome,
                                    value: cliente.nome
                                };
                            })
                        );
                    });
                }, 
                select: function (event, ui) {
                    $("#cliente_id").val(ui.item.id);
                },
                minLength : 1
            });

            $("#taxa").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});            

            $("#taxa").autocomplete({
                source : function(request, response) {
                    $.getJSON( "/ajax/taxas/"+ request.term, function( data ) {  
                        response(
                            $.map(data, function (taxa, i) {
                                return {
                                    id: taxa.id,
                                    label: Number(taxa.taxa).formatMoney(),
                                    value: Number(taxa.taxa).formatMoney()
                                };
                            })
                        );
                    });
                },
                select: function (event, ui) {
                    $("#taxa_id").val(ui.item.id);
                },
                minLength : 1
            });
        });  
    </script>
@endsection