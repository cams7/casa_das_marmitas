$(document).ready(function(){

    var PRODUTO_TAMANHOS = ["Grande", "Média", "Pequena"]; 

    $("#produto_nome").autocomplete({
        source : function(request, response) {
           $.getJSON( "/produtos/" + request.term, function( data ) {   
           //$.get('/produtos/' + request.term, function (data) {                                     
                response(
                    $.map(data, function (produto, i) {
                        tamanho = " < " + PRODUTO_TAMANHOS[produto.tamanho - 1] + " >";

                        return {                            
                            label: produto.nome + tamanho,
                            value: produto.nome + tamanho,
                            id: produto.id
                        };
                    })
                );
            });
        }, 
        select: function (event, ui) {
            $("#produto_id").val(ui.item.id);
        },
        open: function(event, ui) {
            $(".ui-autocomplete").css("z-index", "1050");
        },
        close: function (event, ui) {                   
            $(".ui-autocomplete").css("z-index", "0");
        },
        minLength : 1
    }); 

    //display modal form for creating new task
    $('#item-add').click(function() {
        //$('#submit_state').val("add");
        $('#item-form').trigger("reset");
        $('#item-modal').modal('show');
    });
 
    //display modal form for task editing
    /*$('.item-update').click(function() {
        var id = $(this).val();
        var url = $("#item-form").attr('action');

        $.get(url + '/' + id, function (data) {
            console.log('Sucess:');
            console.log(data);

            $('#produto_nome').val(data.nome);
            $('#quantidade').val(data.quantidade);
            $('#submit_state').val("update");

            $('#item-modal').modal('show');
        }) 
    });    

    //delete task and remove it from list
    $('.item-delete').click(function() {
        var id = $(this).val();
        var token = $('meta[name="_token"]').attr('content');
        var url = $("#item-form").attr('action');

        $.ajax({
            url: url + '/' + id,
            type: "DELETE",            
            dataType: "JSON",
             data: {
                "id": id,
                "_method": 'DELETE',
                "_token": token
            },
            success: function (data) {
                console.log('Sucess:');
                console.log(data);

                //$("#task" + data.id).remove();
            },
            error: function (data) {
                console.log('Error:');
                console.log(data);
            }
        });
    });*/
    

    $('#item-form').on('submit', function(e) {
        $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
        })
        
        e.preventDefault();

        //used to determine the http verb to use [add=POST], [update=PUT]
        //var state = $('#submit_state').val();

        var type = "POST"; //for creating new resource
        //var id = $('#item_id').val();

        var form = $(this);
        var url = form.attr('action');

        /*if (state == "update"){
            type = "PUT"; //for updating existing resource
            url += '/' + id;
        }*/

        $.ajax({
            type: type,
            url: url,
            data: form.serialize(),
            dataType: 'JSON',
            cache: false,
            //contentType: 'application/json; charset=UTF-8',            
            success: function(data){
                console.log('Sucess:');
                console.log(data);

                /*var task = '<tr id="task' + data.id + '"><td>' + data.id + '</td><td>' + data.task + '</td><td>' + data.description + '</td><td>' + data.created_at + '</td>';
                task += '<td><button class="btn btn-warning btn-xs btn-detail open-task-modal" value="' + data.id + '">Edit</button>';
                task += '<button class="btn btn-danger btn-xs btn-delete delete-task" value="' + data.id + '">Delete</button></td></tr>';

                if (state == "add") { //if user added a new record
                    $('#tasks-list').append(task);
                } else { //if user updated an existing record
                    $("#task" + id).replaceWith( task );
                }*/

                $('#item-modal').modal('hide');
            },
            error: function(data){
                console.log('Error:');
                console.log(data);
            }
        })
    });    
});