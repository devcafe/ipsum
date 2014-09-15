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
		//limpa os cmapos
		$('#criarRoteiro')[0].reset();
		//add o valor null ao campo hidden editar loja para sinalizar que um novo registro vide ajax/cadRoteiro.php 
		$('#idRoteiroEdicao').val("null");
		$('.lojasAdicionadas').remove();
		$('#nomeColaborador').removeClass().empty().append('Selecione um colaborador...');

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
	
	// adiciona a loja a lista
	$('#lojasModal').on('click', '.carregaListaLojas  tr:not(:first-child)', function(){
		var idLojaAdd = $(this).attr('id');
		var cnpjAdd = $(this).find('.cnpjFind').html();
		var nomeAdd = $(this).find('.nomeFind').html();
		//var countlojasAdicionadas = $(this).find('.nomeFind').html();

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
				$('#lojasModal').dialog( "destroy" );							
			}
		})		
		$('.contadorLojas').empty();		
		//$('.contadorLojas').append('Lojas adicionadas ' + countlojasAdicionadas);
		}
	})

	
	// cadadastrar roteiro no banco
	$('#cadastrarRoteiro').on('click', function(){
		//pega os valores dos campos
		var idRoteiro = $('#idRoteiroEdicao').val();
		var nomeRoteiro = $('#nomeRoteiro').val();
		var nomeAcao = $('#nomeAcao').val();
		var matricula = $('#nomeColaborador').attr('class');	
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

		// verificação de campo, caso esteje vazio ele da um aviso	
		if(matricula == ''){
			var matriculaRes = confirm('O roteiro será cadastrado sem colaborador, você está certo disso?');			
		} 		
		if(nomeRoteiro == ''){
			alert("Faltou preecher o nome da roteiro");
		} else if (lojasItens == ''){
			alert("Faltou escolher uma loja ao menos.")
		} else if (matriculaRes == false){
		}else {

			$.ajax({
				type:'POST',
				data: {
					idRoteiro: idRoteiro,
					nomeRoteiro: nomeRoteiro,
					nomeAcao: nomeAcao,
					matricula: matricula,
					lojasItens : lojasItens,
				},
				url: 'mod_operacional/ajax/cadRoteiro.php',
				success:function(data){				
					$('#criarRoteiroModal').dialog( "destroy" );
					carregaListaRoteiros();
					alert(data);				
				}
			})
		}
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
		var pag =  $('#pagina').val();

		$.ajax({
			type:'POST',
			data: {
				pag: pag
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
		if(matricula != 0){
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
				$('#nomeColaborador').empty().removeClass().append(jsonC.matriculaColaborador + ' - ' + jsonC.nomeColaborador).addClass(jsonC.matriculaColaborador);
				
				}
			})
		}else {
			// limpa o campo			
				$('#nomeColaborador').removeClass().empty().append('Selecione um colaborador...');
				

		}

	}

	$('.formInner').on('dblclick','#addDataRoteiro tr:not(:first-child)', function(){

		var idRoteiro = $(this).attr('id');		
		//campos que vão recebe ros valores
		var nomeRoteiro = $('#nomeRoteiro');
		var acaoSelect = $('#acaoSelect');
		var nomeColaborador = $('#nomeColaborador');
		var lojasForm = $('.addDataLoja');
		$('#idRoteiroEdicao').val(idRoteiro);

		$.ajax({
			type:'POST',
			data:{
				idRoteiro:idRoteiro,
			},
			url:'mod_operacional/ajax/carregaListaRoteiroEdicao.php',
			success: function(data){
				//transforma os dados em json				
				var json = $.parseJSON(data);							
				nomeRoteiro.val(json.nomeRoteiro);				
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
	// apaga loja selecionada
	$('#lojasForm').on('dblclick', 'tr:not(:first-child)', function(){
		var confirmR = confirm("você realmente deseja excluir essa loja?");
		if(confirmR == true){
			$(this).remove();
		}
	})

	//Marca campos como selecionados ao clicar em uma 
	$('.formInner').on('click', '#addDataRoteiro tr:not(:first-child)', function(){

		if($(this).hasClass('selected')){
			//Remove classe que marca como selecionado
			$(this).removeClass('selected');
		} else {
			//Adiciona classe que marca como selecionado
			$(this).addClass('selected');
		}
		
	});

	// apaga os roteiros selecionaods

	$('#delRoteiro').on('click', function(){
		var i = 0;
		var itens = [];
		$('#addDataRoteiro tr').each(function(){
			if($(this).hasClass('selected')){
				itens[i] = $(this).attr('id');
				i++;
			}
		})

		if(itens == ''){
			alert('Favor selecionar ao mesmo um item para excluir.')
		} else{
			//solicita confirmação antes de apagar
			var apagarResposta = confirm("Tem certeza que deseja apagar o(s) iten(s) selecionado(s)");
			if(apagarResposta == true){
				$.ajax({
					type: 'POST',
					data: {
						itens: itens,
					},
					url: 'mod_operacional/ajax/deletaRoteiro.php',
					success: function(data){
						carregaListaRoteiros();
						alert(data);
					}
				})
			}
		}

	})

	// apagar colaborador

	$('#nomeColaborador').on('dblclick', function(){
		$('#nomeColaborador').removeClass().empty().append('Selecione um colaborador...');
	})


}) 