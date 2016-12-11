getNomeProduto = function (nome, tamanho) {
    var PRODUTO_TAMANHOS = ['Grande', 'Média', 'Pequena']; 
    return nome + ' < ' + PRODUTO_TAMANHOS[tamanho - 1] + ' >';
}

loadItens = function () {
    $.get('/lista/pedido_itens', data => {
        //console.log(data);
        $('.content').html(data);
    });
}

setPedido = function(data) {
    //console.log(data);

    $('#quantidade_total').val(data.quantidade_total > 0 ? data.quantidade_total : '');

    if(data.total_pedido > 0) {
        taxa = $('#taxa').val().trim();
        taxa = taxa != '' ? Number(taxa.replace(/[,]/g, '.').replace(/[\R\$]/g, '')) : 0;

        $('#total_pedido').val(Number(data.total_pedido + taxa).formatMoney());
    } else
        $('#total_pedido').val('');
}

$(document).ready(function() {
    $('#produto_nome').autocomplete({
        source : function(request, response) {
           $.getJSON( '/produtos/' + request.term, data => {                                      
                response(
                    $.map(data, function (produto, i) {
                        return {                            
                            label: getNomeProduto(produto.nome, produto.tamanho),
                            value: getNomeProduto(produto.nome, produto.tamanho),
                            id: produto.id
                        };
                    })
                );
            });
        }, 
        select: function (event, ui) {
            $("#item_form :input[name='produto_id']").val(ui.item.id);
        },
        open: function(event, ui) {
            $('.ui-autocomplete').css('z-index', '1050');
        },
        close: function (event, ui) {                   
            $('.ui-autocomplete').css('z-index', '0');
        },
        minLength : 1
    });  

    $('#itens_refresh').click(event => {
        loadItens(); 
    }); 

    //display modal form for creating new task
    $('#item_add').click(event => {
        $('#item_form').trigger('reset');
        $("#item_form :input[name='produto_nome']").prop('readonly', false);
        $('#modal_state').val('add');        
        $('#item_modal').modal('show');
    });
 
    //display modal form for task editing
    $(document).on('click', '.item-updade', event => {
        event.preventDefault();

        $('#item_form').trigger('reset');
        $("#item_form :input[name='produto_nome']").prop('readonly', true);

        var id = event.target.value;

        var url = $('#item_form').attr('action');
        url = url + '/' + id;
        //console.log('GET ' + url);

        $.ajax({
            url: url,
            type: 'GET',
            success: data => { 
                //console.log('Sucess:');
                //console.log(data);

                $("#item_form :input[name='produto_id']").val(data.produto_id);
                $("#item_form :input[name='produto_nome']").val(getNomeProduto(data.produto.nome, data.produto.tamanho));
                $("#item_form :input[name='item_id']").val(data.id);
                $("#item_form :input[name='quantidade']").val(data.quantidade);

                $('#modal_state').val('update');
                $('#item_modal').modal('show');
            },
            error: data => {
                console.log('Error:');
                console.log(data);
            }
        });        
    });   

    //delete task and remove it from list
    $(document).on('click', '.item-delete', event => {
        event.preventDefault();

        var id = event.target.value;
        var token = $('meta[name="_token"]').attr('content');
        
        var url = $('#item_form').attr('action') + '/' + id;
        //console.log('DELETE ' + url);

        $.ajax({
            url: url,
            type: 'DELETE',            
            dataType: 'JSON',
             data: {
                'id': id,
                '_method': 'DELETE',
                '_token': token
            },
            success: data => {
                //console.log('Sucess:');
                //console.log(data);
                setPedido(data);                

                loadItens();
            },
            error: data => {
                console.log('Error:');
                console.log(data);
            }
        });
    });

    $('#item_form').validator().on('submit', event => {      
        if (event.isDefaultPrevented()) 
            return; 
    //$('#item_form').on('submit', event => {
        event.preventDefault();

        var form = event.target;

        if($(form.produto_id).val() == '' || $(form.quantidade).val() < 1)
            return;

        $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
        })

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#modal_state').val();
        
        var type = 'POST'; //for creating new resource      
        
        var url = form.action;

        if(state == 'add' || $(form.item_id).val() == '')
            url = url + "/produto";    

        if (state == 'update'){
            type = 'PUT'; //for updating existing resource
            url += '/' + ($(form.item_id).val() != '' ? $(form.item_id).val() : $(form.produto_id).val());
        }

        //console.log(type + ' ' + url);

        $.ajax({
            type: type,
            url: url,
            data: $(form).serialize(),
            dataType: 'JSON',
            cache: false,          
            success: data => {
                //console.log('Sucess:');
                //console.log(data);
                setPedido(data);               

                loadItens();

                //$('#item_modal').modal('hide');
                $('#item_modal').modal('toggle');
            },
            error: data => {
                console.log('Error:');
                console.log(data);
            }
        })
    }); 
});