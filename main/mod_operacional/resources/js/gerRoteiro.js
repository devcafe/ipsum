$(document).ready(function() {

	/*************************************/
	/* Inicialização
	/*************************************/

	//esnconde os modais
	$('#criarRoteiroModal').hide();
	$('#colaboradorModal').hide();
	$('#lojasModal').hide();
	$('#editarRoteiroModal').hide();
	carregaListaRoteiros();
	carregaAcaoSelect();
	/*************************************/
	/* Funções
	/*************************************/
	// carrega o modal criar roteiros
	$('#criarRoteiroBtn').on('click',function(){
		$('#criarRoteiro')[0].reset();
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
				buscaCampo: buscaCampo,
				editar:'0',
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
		$('#nomeColaborador').removeClass();
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
	// //Link para gerar carta de apresentação
	// $('a[name=geraCartaApresentacao]').on('click', function(){		
	// 	//Variavel com o id da loja
	// 	var idLoja = 2;		
	// 	//Variavel com a matricula do funcionario
	// 	var matColaborador = 085761;
	// 	//Modelo da carta
	// 	var modeloCarta = '01drogariaSP';
	// 	//Caso esteja selecionada, monta o link com o id correspondente
	// 	if(idLoja != '' && matColaborador != ''){
	// 		//Gera o link passando como parâmetro o id da linha
	// 		var href = "mod_operacional/cartasApresentacao/"+ modeloCarta +"/" + modeloCarta +".php?idLoja="+ idLoja + "&mat="+matColaborador;
	// 		//Coloca o link no elemento
	// 		$(this).attr('href', href);
	// 	} else {
	// 		//Caso não seja selecionado nenhum item ao clicar no botão
	// 		alert("Favor selecionar um item");
	// 	}	
	// })
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
	$('#lojasModal').on('click', '.carregaListaLojas  tr:not(:first-child)', function(){
		var idLojaAdd = $(this).attr('id');
		var cnpjAdd = $(this).find('.cnpjFind').html();
		var nomeAdd = $(this).find('.nomeFind').html();

		if($('#lojasForm tr#'+idLojaAdd).length){
			alert("Essa loja já foi adicionado");
		}else{	
		//envia via ajax para a loja
		$.ajax({
			type:'POST',
			data: {
				idLojaAdd: idLojaAdd,
				cnpjAdd: cnpjAdd,
				nomeAdd: nomeAdd,
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
		}
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
				$('#criarRoteiroModal').dialog( "destroy" );
				carregaListaRoteiros();
			}
		})
	})
	//carrega lista lojas para edição

	function geraListaLojasEdicao(idRoteiro){		

		$.ajax({
			type:'POST',
			data: {
				idLojaAdd: 'null',
				cnpjAdd: 'null',
				nomeAdd: 'null',
				idRoteiro: idRoteiro,
			},
			url: 'mod_operacional/ajax/geraListaLojas.php',
			success: function(data){
				$('#lojasForm').empty();								
				$('#lojasForm').append(data);										
			}
		})
	}	
	

	//carrega lista roteiro
	function carregaListaRoteiros(){

		$.ajax({
			type:'POST',
			data: {
			},
			url: 'mod_operacional/ajax/carregaListaRoteiros.php',
			success:function(data){
				$('#addDataRoteiro').empty();
				$('#addDataRoteiro').append(data);
			} 

		})

	}

	// carrega select com ações
	function carregaAcaoSelect(idAcaoSelect){
		$.ajax({
			type:'POST',
			data: {
				idAcaoSelect:idAcaoSelect
			},
			url:'mod_operacional/ajax/acaoSelect.php',
			success:function(data){
				$('#acaoSelect').append(data);
			}
		})
	}
		// consultar colaborador
	function consultarColaborador(matricula){
		var toSearch = matricula
		var buscaCampo = 'matricula';
		// envia via ajax os valores dos campos toSearch e Busca campo
		$.ajax({
			type: 'POST',
			data: {
				toSearch: toSearch,
				buscaCampo: buscaCampo,
				editar:'1'
			},
			url: 'mod_operacional/ajax/carregaListaColaboradores.php',
			success: function (data){
				var jsonC = $.parseJSON(data);			
			// limpa o campo
			$('#nomeColaborador').empty();
			$('#nomeColaborador').removeClass();
			//apenda os valores
			$('#nomeColaborador').append(jsonC.matriculaColaborador + ' - ' + jsonC.nomeColaborador);
			// adiciona a matricula a class
			$('#nomeColaborador').addClass(jsonC.matriculaColaborador);					
			}
		})

	}

	$('.formInner').on('click','#addDataRoteiro tr', function(){


		var idRoteiro = $(this).attr('id');	
		
		//campos que vão recebe ros valores
		var nomeRoteiro = $('#nomeRoteiro');
		var acaoSelect = $('#acaoSelect');
		var nomeColaborador = $('#nomeColaborador');
		var lojasForm = $('.addDataLoja');

		$.ajax({
			type:'POST',
			data:{
				idRoteiro:idRoteiro,
			},
			url:'mod_operacional/ajax/carregaListaRoteiroEdicao.php',
			success: function(data){
				//transforma o da em json				
				var json = $.parseJSON(data);
				//atribui o valor do banco ao campo nomeRoteiro				
				nomeRoteiro.val(json.nomeRoteiro);
				//atribui o valor do banco ao campo Colaborador	
				consultarColaborador(json.idColaborador);				
				$('#acaoSelect').empty();
				carregaAcaoSelect(json.idAcao);
				// $('#nomeAcao').find("option[value='" + json.idAcao + "']").attr('selected',true);
				geraListaLojasEdicao(idRoteiro);
			}
		})

		$('#criarRoteiroModal').dialog({
			width:600,
			show: {
				effect: "blind",
				duration:500
			}
		})
		
	})


	$('#teste tr').on('click', function(){
		console.log('test');
	})


	// //Marca campos como selecionados ao clicar em uma linha
	// $('#listaUsuarios').on('click', 'table tr:not(:first-child)', function(){
		
	// 	if($(this).hasClass('selected')){
	// 		//Remove classe que marca como selecionado
	// 		$(this).removeClass('selected');
	// 	} else {
	// 		//Adiciona classe que marca como selecionado
	// 		$(this).addClass('selected');
	// 	}
	
	// })

	


	

}) 