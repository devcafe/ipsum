$(document).ready(function() {

	/*************************************/
	/* Inicialização
	/*************************************/
	//Esconde modals
	$('#addAcaoModal').hide();
	$('#alteraAcaoModal').hide();

	//Carrega lista de ações
	carregaAcoes();

	/*************************************/
	/* Funções
	/*************************************/
	//Cadastrar ação
	$('.addAcao').on('click', function(){
		//Abre modal com lojas
		$( "#addAcaoModal" ).dialog({
			width: 600,
			show: {
		        effect: "blind",
		        duration: 500
	     	}
		});

	})

	//Adiciona colcaboradores a lista
	$('#colaboradoresSearch').on('keyup', function(){
		var colaboradoresSearch = $('#colaboradoresSearch').val();

		$.ajax({
			type: 'POST',
			data: {
				colaboradoresSearch: colaboradoresSearch
			},
			url: 'mod_operacional/ajax/carregaListaColaboradoresAcao.php',
			success: function (data){
				
				$('.listaColaboradoresAcao').empty();

				//Carrega lista em div
				$('.listaColaboradoresAcao').append(data);
			}
		})
	});

	//Adiciona na lista que será inserida no banco
	$('.listaColaboradoresAcao').on('click', '.checkBox', function(){
		var id = $(this).attr('id');
		var nome = $(this).html();

		if($('.colaboradoresToSave tr.'+id).length){
			alert("Este usuário já foi adicionado");
		} else {
			$(this).remove();

			$('.colaboradoresToSave').append('<tr class = '+id+'> <td>'+ nome +'</td> </tr>');
			$('.colaboradoresToSave').append('<tr> <td> <input type = "hidden" name = "userId" value = '+ id +'> </td> </tr>');
		}

	})

	//Remove colaboradores da lista para não adicionar
	$('.colaboradoresToSave').on('click', 'tr', function(){
		$(this).remove();
	});

	//Grava ação no banco
	$('#cadastraAcao').on('click', function(){
		var nomeAcao = $('#nomeAcao').val();

		var itens = '';

		$('input[type=hidden]').each(function(){
			itens += $(this).val()+',';
		})

		itens = itens.substring(0, itens.length - 1);

		$.ajax({
			type: 'POST',
			data: {
				itens: itens,
				nomeAcao: nomeAcao
			},
			url: 'mod_operacional/ajax/cadAcao.php',
			success: function (data){
				alert(data);

				$( "#addAcaoModal" ).dialog( 'destroy' );
			}
		})

	})

	//Carrega lista de ações
	function carregaAcoes(){
		var pag = $('#pagina').val();

		$.ajax({
			type: 'POST',
			data: {
				pag: pag
			},
			url: 'mod_operacional/ajax/carregaAcoes.php',
			success: function (data){
				$('.acoesList').append(data);
			}
		})
		
	}

	//Altera ação
	$('.acoesList').on('dblclick', '#acoesTable tr', function(){
		var id = $(this).attr('id');

		//Carrega dados da ação no formulário
		$.ajax({
			type: 'POST',
			data: {
				id: id
			},
			url: 'mod_operacional/ajax/carregaDadosAcao.php',
			success: function (data){
				//Abre modal com lojas
				$( "#alteraAcaoModal" ).dialog({
					width: 600,
					show: {
				        effect: "blind",
				        duration: 500
			     	}
				});

				$('#alterarAcaoForm').empty();
				$('#alterarAcaoForm').append(data);
			}
		})
		
	})

});