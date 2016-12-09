<!-- Modal -->
<div class="modal fade" id="item_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
  			<div class="modal-header">
    			<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
    			<h4 class="modal-title" id="modalLabel">Adicionar Item</h4>
  			</div>
  			{{ Form::open(array('id' => 'item_form', 'url' => 'pedido_item', 'data-toggle' => 'validator', 'role' => 'form')) }}
      			<div class="modal-body">
      				<div class="row">
					    <div class="form-group col-md-8">
					        {{ Form::label('produto_nome', 'Produto:', array('class' => 'control-label')) }}
					        {{ Form::text('produto_nome', null, array('id' => 'produto_nome', 'class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'Nome da marmita', 'required')) }}
					        <div class="help-block with-errors"></div>
					        <input type="hidden" id="produto_id" name="produto_id" value="">
					    </div>
					    <div class="form-group col-md-4">
					        {{ Form::label('quantidade', 'Quantidade:', array('class' => 'control-label')) }}
					        {{ Form::text('quantidade', null, array('id' => 'quantidade', 'class' => 'form-control', 'placeholder' => 'Qtd de marmitas', 'pattern' => '^\d+$', 'required')) }}
					        <div class="help-block with-errors"></div>
					    </div>
					</div>
      			</div>
      			<div class="modal-footer">
        			{{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
     	 		</div>
 	 		{{ Form::close() }}
		</div>
		</div>
</div>
<input type="hidden" id="modal_state" value="add">
<meta name="_token" content="{{ csrf_token() }}" /> 