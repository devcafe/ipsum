$(document).ready(function() {

	/*************************************/
	/* Inicialização
	/*************************************/

	$('#criarRoteiroModal').hide();
	$('#colaboradorModal').hide();
	$('#lojasModal').hide();
	


	/*************************************/
	/* Funções
	/*************************************/

	$('#criarRoteiroBtn').on('click',function(){
		$('#criarRoteiroModal').dialog({
			width:600,
			show: {
				effect: "blind",
				duration:500
			}
		})
	})


	$('#selectColaBtn').on('click', function(){
		$('#colaboradorModal').dialog({
			width:600,
			shiw: {
				effect: "blind",
				duration:500
			}
		})

	})

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

	$('.listaColaboradores').on('click', '#addToList', function(event){
		event.preventDefault();
		event.stopPropagation();

		var matriculaColaborador = $("input[name='userCheck']:checked").val();
		var nomeColaborador = $('#nome_' + matriculaColaborador).html();

		$('#nomeColaborador').empty();
		$('#nomeColaborador').append(matriculaColaborador + ' - ' + nomeColaborador);

		$('#colaboradorModal').dialog( "destroy" );



	})

	// abre eo modal loja

	$('#selectLojasBtn').on('click', function(){		
		$('#lojasModal').dialog({
			width:600,
			shiw: {
				effect: "blind",
				duration:500
			}
		})


})

	$('#consultarLoja').on('click', function(){
		var toSearchLoja = $('#toSearchLoja').val();
		var buscaCampoLoja = $('input[name=buscaCampoLoja]:checked', '#lojasForm').val();
		
		$.ajax({
			type:'POST',
			data: {
				toSearchLoja: toSearchLoja,
				buscaCampoLoja: buscaCampoLoja
			},
			url: 'mod_operacional/ajax/carregaListaLojasRoteiro.php',
			success: function (data){
				$('.listaLoja').empty();				
				$('.listaLoja').append(data);
			}

		})
	})

	//Link para gerar carta de apresentação
	$('a[name=geraCartaApresentacao]').on('click', function(){		
		//Variavel com o id da loja
		var idLoja = 2;
		
		//Variavel com a matricula do funcionario
		var matColaborador = 085761;

		//Modelo da carta
		var modeloCarta = '01drogariaSP';

		//Caso esteja selecionada, monta o link com o id correspondente
		if(idLoja != '' && matColaborador != ''){

			//Gera o link passando como parâmetro o id da linha
			var href = "mod_operacional/cartasApresentacao/"+ modeloCarta +"/" + modeloCarta +".php?idLoja="+ idLoja + "&mat="+matColaborador;			

			//Coloca o link no elemento
			$(this).attr('href', href);
		} else {
			//Caso não seja selecionado nenhum item ao clicar no botão
			alert("Favor selecionar um item");
		}
	
	})


}) 