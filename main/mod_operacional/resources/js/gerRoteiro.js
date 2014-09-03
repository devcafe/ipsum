$(document).ready(function() {

	/*************************************/
	/* Inicialização
	/*************************************/

	//esnconde os modais
	$('#criarRoteiroModal').hide();
	$('#colaboradorModal').hide();
	$('#lojasModal').hide();
	


	/*************************************/
	/* Funções
	/*************************************/

	// carrega o modal criar roteiros
	$('#criarRoteiroBtn').on('click',function(){
		$('#criarRoteiroModal').dialog({
			width:600,
			show: {
				effect: "blind",
				duration:500
			}
		})
	})


// carrega o modal adicionar colaborador
	$('#selectColaBtn').on('click', function(){
		$('#colaboradorModal').dialog({
			width:600,
			shiw: {
				effect: "blind",
				duration:500
			}
		})

	})

	// Faz consulta de colaborador
	$('#consultarColaborador').on('click', function(){
		var toSearch = $('#toSearch').val();
		var buscaCampo = $('input[name=buscaCampo]:checked', '#colaboradoresForm').val();
		// envia via ajax os valores dos campos toSearch e Busca campo
		$.ajax({
			type: 'POST',
			data: {
				toSearch: toSearch,
				buscaCampo: buscaCampo
			},
			url: 'mod_operacional/ajax/carregaListaColaboradores.php',
			success: function (data){
			//limpa o campo				
				$('.listaColaboradores').empty();
				//Carrega lista em div
				$('.listaColaboradores').append(data);
			}
		})
	})

	// appenda colaborador na lista de colaboradores
	$('.listaColaboradores').on('click', '#addToList', function(event){
		event.preventDefault();
		event.stopPropagation();
		// pega os valores do campo
		var matriculaColaborador = $("input[name='userCheck']:checked").val();
		var nomeColaborador = $('#nome_' + matriculaColaborador).html();
		// limpa o campo
		$('#nomeColaborador').empty();
		//apenda os valores
		$('#nomeColaborador').append(matriculaColaborador + ' - ' + nomeColaborador);
		// adiciona a matricula a class
		$('#nomeColaborador').addClass(matriculaColaborador);
		//fecha o dialogo
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
	// consula a loja no banco de acordo com a pesquisa
	$('#consultarLoja').on('click', function(){
		var toSearchLoja = $('#toSearchLoja').val();
		var buscaCampoLoja = $('input[name=buscaCampoLoja]:checked', '#lojasFormToAdd').val();
		// envia via ajax os valores dos campos para pesquisa	
		$.ajax({
			type:'POST',
			data: {
				toSearchLoja: toSearchLoja,
				buscaCampoLoja: buscaCampoLoja
			},
			url: 'mod_operacional/ajax/carregaListaLojasRoteiro.php',
			success: function (data){
				//limpa  a lista de lojas
				$('.listaLoja').empty();
				// preeche o campo com as lojas de acordo com a pesquisa		
				$('.listaLoja').append(data);
			}

		})
	})


	// Colocar mascara na pesquisa por loja
	var countLoja = 0;
	// evento na troca de opção do radios ele executa...
	$('.radioLoja').change(function(){
	//verifica o contador se é igual		
	  	if(countLoja == 0){
	 // mascar ao campo 		
	  		$("#toSearchLoja").mask("99.999.999/9999-99");
	  		countLoja++;
	  	}else {
	  // mascara o campo mas deixa ele opcional
	  		$("#toSearchLoja").mask("?99999999");
	  		countLoja--;
	  	}    

	    });

	var countlojasAdicionadas = 1;
	// adiciona a loja a lista
	$('#adicionarLoja').on('click', function(){
		var itens = [];
		var i = 0;

		// cria	um array com o idLoja, cnpj e nome
		$("input[type=checkbox]:checked").each(function(){
			itens[i] = {
					idLoja: $(this).attr('id'),
					cnpj: $(this).closest('td').next('td').next('td').html(),
					nome: $(this).closest('td').next('td').next('td').next('td').html() 
			};
		
		})


		//envia via ajax para a loja
		$.ajax({
			type:'POST',
			data: {
				itens:itens
			},
			url: 'mod_operacional/ajax/geraListaLojas.php',
			success: function(data){								
				$('#lojasForm').append(data);
				countlojasAdicionadas++;
				$('#lojasModal').dialog( "destroy" );							
			}
		})
		
		$('.contadorLojas').empty();		
		$('.contadorLojas').append('Lojas adicionadas ' + countlojasAdicionadas);
	})

	// cadadastrar roteiro no banco
	$('#cadastrarRoteiro').on('click', function(){
		//pega os valores dos campos
		var nomeRoteiro = $('#nomeRoteiro').val();
		var nomeAcao = $('#nomeAcao').val();
		var matricula = $('#nomeColaborador').attr('class');
		var quantLojas = $('.lojasAdicionadas').length;	

		var i = 0;
		var lojasItens = [];

		//varre todas as lojas selecionadas		

		$('.lojasAdicionadas').each(function(){			
				lojasItens[i] = {
					idLoja: $(this).find('input').val(),
					seg: $(this).find('.seg').val(),
					ter: $(this).find('.ter').val(),
					qua: $(this).find('.qua').val(),
					qui: $(this).find('.qui').val(),
					sex: $(this).find('.sex').val(),
					sab: $(this).find('.sab').val(),
					dom: $(this).find('.dom').val(),		
				}

				

				i++;			
			})

		$.ajax({
			type:'POST',
			data: {
				nomeRoteiro: nomeRoteiro,
				nomeAcao: nomeAcao,
				matricula: matricula,
				lojasItens : lojasItens,
			},
			url: 'mod_operacional/ajax/cadRoteiro.php',
			success:function(data){				
				$('#criarRoteiro').append(data);
				$('#criarRoteiroModal').dialog( "destroy" );
			}
		})
	})

	//carrega lista roteiro

	function carregaListaRoteiros(){

		$.ajax({
			type:'POST',
			data: {
			},
			url: 'mod_operacional/ajax/carregaListaRoteiros.php',
			success:function(data){
				$('#addDataRoteiro').append(data);
			} 

		})

	}

	carregaListaRoteiros();

}) 