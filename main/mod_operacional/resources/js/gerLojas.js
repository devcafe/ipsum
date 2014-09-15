$(document).ready(function(){

	carregaLojas();

	$('#lojaDadosReceita').hide();

	//Esconde filtro
	$('.filtro').hide();
	$('.chooseFields').hide();

	//Esconde modal
	$('#lojasModalGer').hide();

	//Mascara campos
	$("#cnpj").mask("99.999.999/9999-99");
	$("#cep").mask("99999-999");

	//Lista lojas	
	

	function carregaLojas(){
		$('#listaLojas').empty();

		var ordemLojas = ""

		if($('#orderLoja').hasClass('order_a-z')){			
			ordemLojas = 'order_a-z';			
		}else {			
			ordemLojas = 'order_z-a';
		}

		var pag = $('#pagina').val();
		var filtro = $('#checkFiltro').val();

		$.ajax({
			type: 'POST',
			data: {
				op: '', 
				pag: pag,
				filtro: filtro,
				ordemLojas: ordemLojas,
			},
			url: 'mod_operacional/ajax/carregaListaLojasGerencial.php',
			success: function (data){
				$('.addDataLoja').empty();

				//Carrega lista em div
				$('#listaLojas').append(data);
			}
		})
	}

	//ordenar lojas	
	$('#listaLojas').on('click', '#idLojaOrder', function(){
		var ordemLojas = ""

		if($('#orderLoja').hasClass('order_a-z')){
			$('#orderLoja').removeClass('order_a-z');
			$('#orderLoja').addClass('order_z-a');
			ordemLojas = 'order_z-a';						
		}else {
			$('#orderLoja').removeClass('order_z-a');
			$('#orderLoja').addClass('order_a-z');
			ordemLojas = 'order_a-z';			
		}

		var filtro = $('#checkFiltro').val();

		$('#checkFiltro').val('1');

		var pag = $('#pagina').val();

		//Recebe dados para filtrar
		var idLojaFiltro = $('#idLojaFiltro').val();
		var cnpj = $('#cnpj').val();
		var razaoSocial = $('#razaoSocial').val();
		var nomeFantasia = $('#nomeFantasia').val();
		var bairro = $('#bairro').val();
		var rua = $('#rua').val();
		var bandeira = $('#bandeira').val();
		var cep = $('#cep').val();
		var cidade = $('#cidade').val();
		var uf = $('#uf').val();
		var numero = $('#numero').val();

		var itens2 = [];
		var j = 0;

		$( ".checkBox:checked" ).each(function() {
		  itens2[j] = $(this).val();
		  
		  j++;
		});

		if(itens2.length > 0){

			$.ajax({
				type: 'POST',
				data:{
					itens2: itens2,
					filtro: filtro,
					pag: pag,
					op: 'withFieldsFiltro',
					idLojaFiltro: idLojaFiltro,
					cnpj: cnpj,
					razaoSocial: razaoSocial,
					nomeFantasia: nomeFantasia,
					bairro: bairro,
					rua: rua,
					bandeira: bandeira,
					cep: cep,
					cidade: cidade,
					uf: uf,
					numero: numero,
					ordemLojas: ordemLojas,
				},
				url: 'mod_operacional/ajax/carregaListaLojasGerencial.php',
				success: function (data){
					$('#listaLojas').empty();

					//Carrega lista em div
					$('#listaLojas').append(data);
				}
			})
		} else{		
			carregaLojas();
		}
	})

	//Filtra
	$('#btnFiltrar').on('click', function(){
		$('.filtro').toggle();
	})
	$('input').on('keyup', function(){

		var ordemLojas = ""
		if($('#orderLoja').hasClass('order_a-z')){			
			ordemLojas = 'order_a-z';			
		}else {			
			ordemLojas = 'order_z-a';
		}

		var filtro = $('#checkFiltro').val();

		$('#checkFiltro').val('1');

		var pag = $('#pagina').val();

		//Recebe dados para filtrar
		var idLojaFiltro = $('#idLojaFiltro').val();
		var cnpj = $('#cnpj').val();
		var razaoSocial = $('#razaoSocial').val();
		var nomeFantasia = $('#nomeFantasia').val();
		var bairro = $('#bairro').val();
		var rua = $('#rua').val();
		var bandeira = $('#bandeira').val();
		var cep = $('#cep').val();
		var cidade = $('#cidade').val();
		var uf = $('#uf').val();
		var numero = $('#numero').val();

		var itens2 = [];
		var j = 0;

		$( ".checkBox:checked" ).each(function() {
		  itens2[j] = $(this).val();
		  
		  j++;
		});

		if(itens2.length > 0){

			$.ajax({
				type: 'POST',
				data:{
					itens2: itens2,
					filtro: filtro,
					pag: pag,
					op: 'withFieldsFiltro',
					idLojaFiltro: idLojaFiltro,
					cnpj: cnpj,
					razaoSocial: razaoSocial,
					nomeFantasia: nomeFantasia,
					bairro: bairro,
					rua: rua,
					bandeira: bandeira,
					cep: cep,
					cidade: cidade,
					uf: uf,
					numero: numero,
					ordemLojas: ordemLojas,
				},
				url: 'mod_operacional/ajax/carregaListaLojasGerencial.php',
				success: function (data){
					$('#listaLojas').empty();

					//Carrega lista em div
					$('#listaLojas').append(data);
				}
			})
		} else {
			$.ajax({
				type: 'POST',
				data:{
					filtro: filtro,
					pag: pag,
					op: 'filtro',
					idLojaFiltro: idLojaFiltro,
					cnpj: cnpj,
					razaoSocial: razaoSocial,
					nomeFantasia: nomeFantasia,
					bairro: bairro,
					rua: rua,
					bandeira: bandeira,
					cep: cep,
					cidade: cidade,
					uf: uf,
					numero: numero,
				ordemLojas: ordemLojas,
				},
				url: 'mod_operacional/ajax/carregaListaLojasGerencial.php',
				success: function (data){
					$('#listaLojas').empty();

					//Carrega lista em div
					$('#listaLojas').append(data);
				}
			})
		}
	})

	//Função para carregar página e manter filtro
	function carregaComFiltro(){

		var ordemLojas = ""
		if($('#orderLoja').hasClass('order_a-z')){			
			ordemLojas = 'order_a-z';			
		}else {			
			ordemLojas = 'order_z-a';
		}

		var filtro = $('#checkFiltro').val();

		$('#checkFiltro').val('1');

		var pag = $('#pagina').val();

		//Recebe dados para filtrar
		var idLojaFiltro = $('#idLojaFiltro').val();
		var cnpj = $('#cnpj').val();
		var nome = $('#nome').val();
		var razaoSocial = $('#razaoSocial').val();
		var nomeFantasia = $('#nomeFantasia').val();
		var bairro = $('#bairro').val();
		var rua = $('#rua').val();
		var bandeira = $('#bandeira').val();
		var cep = $('#cep').val();
		var cidade = $('#cidade').val();
		var uf = $('#uf').val();
		var numero = $('#numero').val();

		$.ajax({
			type: 'POST',
			data:{
				filtro: filtro,
				pag: pag,
				op: 'filtro',
				idLojaFiltro: idLojaFiltro,
				cnpj: cnpj,
				nome: nome,
				razaoSocial: razaoSocial,
				nomeFantasia: nomeFantasia,
				bairro: bairro,
				rua: rua,
				bandeira: bandeira,
				cep: cep,
				cidade: cidade,
				uf: uf,
				numero: numero,
				ordemLojas: ordemLojas,
			},
			url: 'mod_operacional/ajax/carregaListaLojasGerencial.php',
			success: function (data){
				$('#listaLojas').empty();

				//Carrega lista em div
				$('#listaLojas').append(data);
			}
		})
	}

	//Muda de página
	$('#listaLojas').on('click', '.toPage', function(){

		//Verifica se existe um filtro
		var filtro = $('#checkFiltro').val();

		if(filtro == 1){
			//Verifica o novo id
			var newPage = $(this).attr('id');

			//Passa o novo id a um elemento hidden
			$('#pagina').val(newPage);

			//Chama a função para carregar proxima pagina com filtro
			carregaComFiltro();
		} else {	
			//Verifica o novo id
			var newPage = $(this).attr('id');

			//Passa o novo id a um elemento hidden
			$('#pagina').val(newPage);

			//Chama a função para carregar proxima pagina
			carregaLojas();
		}

	})

	//Exibe dados da loja
	$('#listaLojas').on('dblclick', '#lojasTable tr:not(:first-child)', function(event){
		//$('#dadosLojaReceitaModalForm')[0].reset();

		event.preventDefault();
		event.stopPropagation();

		//Id da loja que será visualizado os dados
		var idLoja = $(this).attr('id');
		$('#idListGer').val(idLoja);

		//Campos a serem populados
		var cnpjListGer = $('#cnpjListGer');
		var bandeiraListGer = $('#bandeiraListGer');
		var nomeListGer = $('#nomeListGer');
		var nomeFantasiaListGer = $('#nomeFantasiaListGer');
		var cepListGer = $('#cepListGer');
		var ruaListGer = $('#ruaListGer');
		var bairroListGer = $('#bairroListGer');
		var numeroListGer = $('#numeroListGer');
		var cidadeListGer = $('#cidadeListGer');
		var ufListGer = $('#ufListGer');

		//Abre modal com dados da loja
		$( "#lojasModalGer" ).dialog({
			width: 600,
			show: {
		        effect: "blind",
		        duration: 500
	     	}
		});

		//Envia id da loja para retornar formulario preenchido
		$.ajax({
			type: 'POST',
			data:{
				idLoja: idLoja
			},
			url: 'mod_operacional/ajax/carregaDadosLoja.php',
			success: function (data){
				
				var json = $.parseJSON(data);
				//console.log(data);

				//Popula campos
				cnpjListGer.val(json.cnpj);
				bandeiraListGer.val(json.bandeira);
				nomeListGer.val(json.nome);
				nomeFantasiaListGer.val(json.estabReceitaNF);
				cepListGer.val(json.cep);
				ruaListGer.val(json.rua);
				bairroListGer.val(json.bairro);
				numeroListGer.val(json.numero);
				cidadeListGer.val(json.cidade);
				ufListGer.val(json.uf);

				$('#dadosVisualizar').removeClass();
				$('#dadosVisualizar').addClass(json.idLoja);
			}
		})
	})

	var k = 0;
	//Exibe dados da receita
	$('#dadosVisualizar').on('click', function(){
		if(k == 0){
			$('.showText').html('<- Dados da loja');
			$('#lojaDadosReceita').show();
			$('#lojaDados').hide();

			k++;
		} else {
			$('.showText').html('Dados da receita ->');
			$('#lojaDadosReceita').hide();
			$('#lojaDados').show();

			k--;
		}

		var id = $(this).attr('class');

		//Envia id da loja para retornar formulario preenchido
		$.ajax({
			type: 'POST',
			data:{
				id: id
			},
			url: 'mod_operacional/ajax/carregaDadosLojaReceita.php',
			success: function (data){

				var json = $.parseJSON(data);

				$('#estabReceitaRazaoSocial').val(json.estabReceitaRazaoSocial);
				$('#estabReceitaNomeEmpresarial').val(json.estabReceitaNomeEmpresarial);
				$('#estabReceitaNF').val(json.estabReceitaNF);
				$('#estabReceitaEndereco').val(json.estabReceitaEndereco);
				$('#estabReceitaCEP').val(json.estabReceitaCEP);
				$('#estabReceitaComplemento').val(json.estabReceitaComplemento);
				$('#estabReceitaBairro').val(json.estabReceitaBairro);
				$('#estabReceitaNumero').val(json.estabReceitaNumero);
				$('#estabReceitaCidade').val(json.estabReceitaCidade);
				$('#estabReceitaUF').val(json.estabReceitaUF);
				$('#estabReceitaSituacao').val(json.estabReceitaSituacao);
				$('#estabReceitaSituacaoData').val(json.estabReceitaSituacaoData);
			}
		});

	})

	$('#btnSelFields').on('click', function(){
		//Exibe seleção de campos
		$('.chooseFields').toggle();
	})

	//Traz apenas campos selecionados
	$('#sendFields').on('click', function(){
		var ordemLojas = "";
		if($('#orderLoja').hasClass('order_a-z')){			
			ordemLojas = 'order_a-z';			
		}else {			
			ordemLojas = 'order_z-a';
		}	

		var itens = [];
		var i = 0;

		var pag = $('#pagina').val();

		$( ".checkBox:checked" ).each(function() {
		  itens[i] = $(this).val();
		  
		  i++;
		});

		//Envia id da loja para retornar formulario preenchido
		$.ajax({
			type: 'POST',
			data:{
				op: 'withFields',
				itens: itens,
				pag: pag,
				ordemLojas: ordemLojas,

			},
			url: 'mod_operacional/ajax/carregaListaLojasGerencial.php',
			success: function (data){
				$('#listaLojas').empty();

				//Carrega lista em div
				$('#listaLojas').append(data);

				//console.log(data);
			}
		})

	})

	//Gera CSV
	$('.btnToCSV').on('click', function(){
		$.ajax({
			type: 'POST',
			url: 'mod_operacional/ajax/geraCSVLojas.php',
			success: function (data){
				//console.log(data);
				window.location = "mod_operacional/ajax/geraCSVLojas.php";
			}
		})
	})
	// gera excell

	$('.btnToExcel').on('click', function(){
		$.ajax({
			type: 'POST',
			url: 'mod_operacional/ajax/geraExcelLojas.php',
			success: function (data){				
				window.location = "mod_operacional/ajax/geraExcelLojas.php";
			}
		})
	})

	
	// limpar formulário

	$('#limparFiltro').on('click', function(){
		$('.filtro .toReset').each(function(){
			$(this).val('');
		});				

		carregaLojas();	
	})

	// alterar lojas

	$('#btnAlterarLoja').on('click', function(){
		//pega o id d aloja sleecionada
		var idLoja = $('#idListGer').val();
		// altera  a url
		
		//grava em uma variavel o selector da div
		var conteudo = $('#conteudoInner');
		//limpa a a div conteudo
		conteudo.empty();
		//carrega a pagina cadloja do operacional
		conteudo.load( "mod_operacional/cadLoja.php")
		
		$('#mainWrapper').append("<input name = 'idLojaEdicao' id = 'idLojaEdicao' type = 'hidden' value='"+ idLoja +"'");




	})


})