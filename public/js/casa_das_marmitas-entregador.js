$(document).ready(function($){
    $("#celular").mask("(99) 99999-9999");
    $("#cpf").mask("999.999.999-99");

    $("#empresa_nome").autocomplete({
        source : function(request, response) {
            $.getJSON( "/empresas/" + request.term, function( data ) {                        
                response(
                    $.map(data, function (empresa, i) {
                        cnpj = " < " + empresa.cnpj.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, "$1.$2.$3/$4-$5") + " >";
                        return {
                            id: empresa.id,
                            label: empresa.nome + cnpj,
                            value: empresa.nome + cnpj
                        };
                    })
                );
            });
        }, 
        select: function (event, ui) {
            $("#empresa_id").val(ui.item.id);
        },
        minLength : 1
    });           
});