$(document).ready(function(){

    //Esconde modals
    $( "#cadContaContabil" ).hide();
    $( "#cadDespesa" ).hide();

    //Esconde subitens
    $('.subitens').css('display', 'none');

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
    $('.expand').on('click', function(){
        var idContaContabil = $(this).parent().attr('id').split('_')[1];
        
        //Envia id para consulta dos itens
        $.ajax({
            type:'POST',
            data: { idContaContabil: idContaContabil },
            url: 'mod_ti/ajax/carregaItensContaContabil.php',
            success: function (data){
                //Verifica em qual subconta será apendado
                $('#subItens_' + idContaContabil).append(data);
                
                //Exibe subitens
                $('.subitens').css('display', 'table-row');
            }
        })
    })

    //Cadastra despesa
    $('#addDespesa').on('click', function(){

    })
});