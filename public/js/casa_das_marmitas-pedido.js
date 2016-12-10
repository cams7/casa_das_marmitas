$(document).ready(function($){ 
    $("#cliente_nome").autocomplete({
        source : function(request, response) {
            $.getJSON( "/clientes/" + request.term, data => {                        
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
            $.getJSON( "/taxas/" + request.term, data => {  
                response(
                    $.map(data, function (taxa, i) {
                        id = taxa.id;
                        taxa = Number(taxa.taxa).formatMoney();
                        return {
                            id: id,
                            label: taxa,
                            value: taxa
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