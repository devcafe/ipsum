$(document).ready(function(){

	/*************************************/
	/* Inicialização
	/*************************************/

	//Esconde modals
	$('#colaboradorModal').hide();


	/*************************************/
	/* Funções
	/*************************************/

	//Selecionar colaboradores
	$('#selectColaBtn').on('click', function(){
		//Abre modal com lojas
		$( "#colaboradorModal" ).dialog({
			width: 600,
			show: {
		        effect: "blind",
		        duration: 500
	     	}
		});
	})

	//Pesquisa colaborador
	$('#consultarColaborador').on('click', function(){
		var toSearch = $('#toSearch').val();
		var buscaCampo = $('input[name=buscaCampo]:checked', '#colaboradoresForm').val()

		$.ajax({
			type: 'POST',
			data: {
				toSearch: toSearch,
				buscaCampo: buscaCampo
			},
			url: 'mod_operacional/ajax/carregaListaColaboradores.php',
			success: function (data){
				$('.listaColaboradores').empty();

				//Carrega lista em div
				$('.listaColaboradores').append(data);
			}
		})
	})

})