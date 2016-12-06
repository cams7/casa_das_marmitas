@extends('layouts.master')
@section('title', 'Adicionar Pedido')

@section('content')
	<h3 class="page-header">Adicionar Pedido</h3>

  	@include('layouts.errors')

	{{ Form::open(array('url' => 'pedido')) }}
	    @include('pedido.form_fields')

	    <hr />
	    <div id="actions" class="row">
	  		<div class="col-md-12">
	  			<a href="#" class="btn btn-success" data-toggle="modal" data-target="#item-modal">Novo Item</a>
	    		{{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}
	    		<a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
	    	</div>
  		</div>
	{{ Form::close() }}

	<!-- Modal -->
	<div class="modal fade" id="item-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
        			<h4 class="modal-title" id="modalLabel">Adicionar Item</h4>
      			</div>
      			{{ Form::open(array('id' => 'item_form', 'url' => 'pedido_item')) }}
	      			<div class="modal-body">
	      				<div class="row">
						    <div class="form-group col-md-8">
						        {{ Form::label('produto_nome', 'Produto:', array()) }}
						        {{ Form::text('produto_nome', null, array('id' => 'produto_nome', 'class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'Nome da marmita')) }}
						        <input type="hidden" id="produto_id" name="produto_id" value="">
						    </div>
						    <div class="form-group col-md-4">
						        {{ Form::label('quantidade', 'Quantidade:', array()) }}
						        {{ Form::text('quantidade', null, array('id' => 'quantidade', 'class' => 'form-control', 'placeholder' => 'Qtd de marmitas')) }}
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
	<script>
		$(document).ready(function($){
			$("#produto_nome").autocomplete({
                source : function(request, response) {
                    $.getJSON( "/ajax/produtos/"+ request.term, function( data ) {                        
                        response(
                            $.map(data, function (produto, i) {
                                return {
                                    id: produto.id,
                                    label: produto.nome,
                                    value: produto.nome
                                };
                            })
                        );
                    });
                }, 
                select: function (event, ui) {
                    $("#produto_id").val(ui.item.id);
                },
                open: function(event, ui) {
                    $(".ui-autocomplete").css("z-index", "10000");
                },
                close: function (event, ui) {                	
    				$(".ui-autocomplete").css("z-index", "0");
				},
                minLength : 1
            });	


            $( "#item_form" ).submit(function( event ) { 
			  	// Stop form from submitting normally
			  	event.preventDefault();
			 
			  	// Get some values from elements on the page:
			  	var $form = $( this );
			    term = $form.find( "input[name='s']" ).val();
			    var url = $form.attr( "action" );
			 
			  	// Send the data using post
			  	$.post( url, { s: term } ).done(function( data ) {
			    	//var content = $( data ).find( "#content" );
			    	//$( "#result" ).empty().append( content );
			    	console.log(data);
			  	});
			});            
       	});		
	</script>
@endsection