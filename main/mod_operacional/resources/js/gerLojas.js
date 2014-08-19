$(document).ready(function(){

	carregaLojas();

	//Esconde filtro
	$('.filtro').hide();
	$('.chooseFields').hide();

	//Esconde modal
	$('#lojasModal').hide();

	//Lista lojas
	function carregaLojas(){
		var pag = $('#pagina').val();

		var filtro = $('#checkFiltro').val();

		$.ajax({
			type: 'POST',
			data: {
				op: '', 
				pag: pag,
				filtro: filtro
			},
			url: 'mod_operacional/ajax/carregaListaLojasGerencial.php',
			success: function (data){
				$('#listaLojas').empty();

				//Carrega lista em div
				$('#listaLojas').append(data);
			}
		})
	}

	//Filtra
	$('#btnFiltrar').on('click', function(){
		$('.filtro').toggle();
	})
	$('input').on('keyup', function(){

		var filtro = $('#checkFiltro').val();

		$('#checkFiltro').val('1');

		var pag = $('#pagina').val();

		//Recebe dados para filtrar
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
					cnpj: cnpj,
					razaoSocial: razaoSocial,
					nomeFantasia: nomeFantasia,
					bairro: bairro,
					rua: rua,
					bandeira: bandeira,
					cep: cep,
					cidade: cidade,
					uf: uf,
					numero: numero
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
					cnpj: cnpj,
					razaoSocial: razaoSocial,
					nomeFantasia: nomeFantasia,
					bairro: bairro,
					rua: rua,
					bandeira: bandeira,
					cep: cep,
					cidade: cidade,
					uf: uf,
					numero: numero
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
		var filtro = $('#checkFiltro').val();

		$('#checkFiltro').val('1');

		var pag = $('#pagina').val();

		//Recebe dados para filtrar
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
				numero: numero
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
	$('#listaLojas').on('dblclick', '#lojasTable tr:not(:first-child)', function(){
		//Id da loja que será visualizado os dados
		var idLoja = $(this).attr('id');

		//Campos a serem populados
		var cnpjList = $('#cnpjList');
		var bandeiraList = $('#bandeiraList');
		var razaoSocialList = $('#razaoSocialList');
		var nomeFantasiaList = $('#nomeFantasiaList');
		var cepList = $('#cepList');
		var ruaList = $('#ruaList');
		var bairroList = $('#bairroList');
		var numeroList = $('#numeroList');
		var cidadeList = $('#cidadeList');
		var ufList = $('#ufList');

		//Abre modal com dados da loja
		$( "#lojasModal" ).dialog({
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
				cnpjList.val(json.cnpj);
				bandeiraList.val(json.bandeira);
				razaoSocialList.val(json.estabReceitaRazaoSocial);
				nomeFantasiaList.val(json.estabReceitaNF);
				cepList.val(json.cep);
				ruaList.val(json.rua);
				bairroList.val(json.bairro);
				numeroList.val(json.numero);
				cidadeList.val(json.cidade);
				ufList.val(json.uf);
			}
		})
	})

	$('#btnSelFields').on('click', function(){
		//Exibe seleção de campos
		$('.chooseFields').toggle();
	})

	//Traz apenas campos selecionados
	$('#sendFields').on('click', function(){
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
				pag: pag
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
		
})