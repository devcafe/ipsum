$(document).ready(function(){

    //Esconde modals
    $( "#cadContaContabil" ).hide();
    $( "#cadDespesa" ).hide();

    //Esconde subitens
    $('.subitens').css('display', 'none');

    loadDataTable();

    //Abre modal para cadastrar conta contabil
    $('#addContaContabil').on('click', function(){
        $( "#cadContaContabil" ).dialog({
            width: 600,
            show: {
                effect: "blind",
                duration: 500
            }
        });
    });

    //Abre modal para adicionar despesa
    $('#addDespesa').on('click', function(){
        $( "#cadDespesa" ).dialog({
            width: 600,
            show: {
                effect: "blind",
                duration: 500
            }
        });
    })

    //Adiciona conta contabil
    $('#addContaContabilBtn').on('click', function(){

        var contaContabil = $('#contaContabil').val();

        $.ajax({
            type: 'POST',
            data: { contaContabil: contaContabil },
            url: 'mod_ti/ajax/cadContaContabil.php',
            success: function (data){
                //Carrega lista em div
               alert(data);

               //Destroy modal
              $ ('#cadContaContabil').dialog("destroy");

            }
        })
    })

    //Expande itens da conta contabil selecionada
    $('#initialTable').on('click', '.expand', function(){
        var idContaContabil = $(this).parent().attr('id').split('_')[1];

        var classe = $(this).attr('class').split(' ')[2];

        if(classe == "plus"){
            $(this).removeClass("plus");
            $(this).addClass("minus");

            //Envia id para consulta dos itens
            $.ajax({
                type:'POST',
                data: { idContaContabil: idContaContabil },
                url: 'mod_ti/ajax/carregaItensContaContabil.php',
                success: function (data){
                     $('#subItens_' + idContaContabil).empty();

                    //Verifica em qual subconta será apendado
                    $('#subItens_' + idContaContabil).append(data);
                    
                    //Exibe subitens
                    $('#subItens_' + idContaContabil).css('display', 'table-row');
                }
            })
        } else {
            $(this).removeClass("minus");
            $(this).addClass("plus");

            //Verifica em qual subconta será apendado
            //$('#subItens_' + idContaContabil).append(data);
            
            //Exibe subitens
             $('#subItens_' + idContaContabil).css('display', 'none');
        }
        
       
    })

    //Cadastra despesa
    $('#addDespesa').on('click', function(){

    })

    $(".dataTable").on('dblclick', 'td', function (event) { 
        event.stopPropagation();
        event.preventDefault();

        var month = $(this).attr('class').split(' ')[0];
        var idDespesa = $(this).attr('class').split(' ')[1];

        var OriginalContent = $(this).text(); 

        $(this).addClass("cellEditing"); 

        $(this).html("<input type='text' value='" + OriginalContent + "' />"); 

        $(this).children().first().focus(); 

        $(this).children().first().keypress(function (e) { 
            if (e.which == 13) { 
                var newContent = $(this).val(); 
                $(this).parent().text(newContent); 
                $(this).parent().removeClass("cellEditing"); 

              
                $.ajax({
                    type:'POST',
                    data: {
                        idDespesa: idDespesa,
                        newContent: newContent,
                        month: month

                    },
                    url: 'mod_ti/ajax/alteraValorMes.php',
                    success: function (data){
                        loadDataTable();
                    }
                })
            } 
        }); 

        $(this).children().first().blur(function(){ 
            $(this).parent().text(OriginalContent); 
            $(this).parent().removeClass("cellEditing"); 
        }); 
    });

    function loadDataTable(){
        $('#initialTable').empty();

        $.ajax({
            type:'POST',
            url: 'mod_ti/ajax/carregaTabela.php',
            success: function (data){
                $('#initialTable').append(data);
            }
        })
    }
});