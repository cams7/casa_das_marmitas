$(document).ready(function($){ 
    $("#cliente_nome").autocomplete({
        source : function(request, response) {
            $.getJSON( "/clientes/" + request.term, function( data ) {                        
                response(
                    $.map(data, function (cliente, i) {
                        telefone = " < " + cliente.telefone.replace(/^(\d{2})(\d{4})(\d{4})/, "($1) $2-$3") + " >";
                        return {
                            id: cliente.id,
                            label: cliente.nome + telefone,
                            value: cliente.nome + telefone
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
            $.getJSON( "/taxas/" + request.term, function( data ) {  
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