$(document).ready(function(){

	//Esconde modals
	$( "#alterarItemModal" ).hide();

	//Esconde filtro
	$('.filtro').hide();

	//Mascara campos
	$("#numLinha").mask("(99) 9999-9999");
	$("#memoria").mask("99 GB");
	$("#linhaFiltro").mask("(99) 9999-9999");

	//Carrega lista de empresas na inicialização
	carregaLista();

	//Função para retornar lista de empresas
	function carregaLista(){
		$.ajax({
			type: 'POST',
			url: 'mod_telefonia/ajax/carregaListaEmpresas.php',
			data:{
				op: ''
			},
			success: function (data){
				//Limpa lista
				$('#listaEmpresas').empty();

				//Carrega lista em div
				$('#listaEmpresas').append(data);
			}
		});
	}

	//Marca campos como selecionados ao clicar em uma linha
	$('#listaEmpresas').on('click', 'table tr:not(:first-child)', function(){
		
		if($(this).hasClass('selected')){
			//Remove classe que marca como selecionado
			$(this).removeClass('selected');
		} else {
			//Adiciona classe que marca como selecionado
			$(this).addClass('selected');
		}
		
	});

	//Carrega dados para editar item
	$('#listaEmpresas').on('dblclick', 'table tr:not(:first-child)', function(){

		var idEmpresa = $(this).attr('id');

		//Campos que receberão dados
		var nomeEmpresa = $('#nomeEmpresa');
		var nomeContatoResponsavel = $('#nomeContatoResponsavel');
		var telContatoResponsavel = $('#telContatoResponsavel');
		var emailContatoResponsavel = $('#emailContatoResponsavel');
		var cnpj = $('#cnpj');
		var razaoSocial = $('#razaoSocial');
		var endereco = $('#endereco');
		var observacoes = $('#observacoes');

		//Carrega dados da linha para edição
		$.ajax({
			type: 'POST',
			url: 'mod_telefonia/ajax/carregaDadosEdicaoEmpresas.php',
			data: {
				idEmpresa: idEmpresa
			},
			success: function(data){
				var json = $.parseJSON(data);
				console.log(json);
				//Popula campos
				$('#idEmpresa').val(idEmpresa);
				nomeEmpresa.val(json.nomeEmpresa);
				nomeContatoResponsavel.val(json.nomeContatoResponsavel);
				telContatoResponsavel.val(json.telContatoResponsavel);
				emailContatoResponsavel.val(json.emailContatoResponsavel);
				cnpj.val(json.cnpj);
				razaoSocial.val(json.razaoSocial);
				endereco.val(json.endereco);
				observacoes.val(json.observacoes);
			}
		});

		//Abre modal com dados do item a ser editado
		$( "#alterarItemModal" ).dialog({
			width: 600,
			show: {
		        effect: "blind",
		        duration: 500
	     	}
		});
	});

	//Edita item
	$('#gravar').on('click', function(){
		//Pega valores
		var idEmpresa = $('#idEmpresa').val();
		var nomeEmpresa = $('#nomeEmpresa').val();
		var nomeContatoResponsavel = $('#nomeContatoResponsavel').val();
		var telContatoResponsavel = $('#telContatoResponsavel').val();
		var emailContatoResponsavel = $('#emailContatoResponsavel').val();
		var cnpj = $('#cnpj').val();
		var razaoSocial = $('#razaoSocial').val();
		var endereco = $('#endereco').val();
		var observacoes = $('#observacoes').val();

		$.ajax({
			type: 'POST',
			url: 'mod_telefonia/ajax/alteraEmpresa.php',
			data:{
				idEmpresa: idEmpresa,
				nomeEmpresa: nomeEmpresa,
				nomeContatoResponsavel: nomeContatoResponsavel,
				telContatoResponsavel: telContatoResponsavel,
				emailContatoResponsavel: emailContatoResponsavel,
				cnpj: cnpj,
				razaoSocial: razaoSocial,
				endereco: endereco,
				observacoes: observacoes
			},
			success: function(data){
				//Recarrega lista para atualizar dados
				carregaLista();

				//Fecha dialog
				$( "#alterarItemModal" ).dialog('destroy');

				alert(data);
			}
		})
	})

	//Deleta itens selecionados
	$('#delete').on('click', function(){
		var i = 0;
		var itens = [];

		//Pega o id de todos os itens selecionados e guarda em um array
		$('table tr:not(:first-child)').each(function(){
			//Pega os itens apenas que estão selecionados
			if($(this).hasClass('selected')){
				itens[i] = $(this).attr('id');
				i++;
			}
		})

		//Solicita confirmação antes de apagar
		var answer = confirm("Tem certeza que deseja apagar o(s) iten(s) selecionado(s)?");

		if(answer){
			//Envia array com os itens selecionados para exclusão
			$.ajax({
				type: 'POST',
				url: 'mod_telefonia/ajax/deletaEmpresa.php',
				data: {
					itens: itens
				},
				success: function(data){
					//Recarrega lista para atualizar dados
					carregaLista();

					alert(data);
				}
			})
		}
	})

	//Habilita filtro de linhas moveis
	$('#btnFiltrar').on('click', function(){
		$('.filtro').toggle();
	});

	//Faz filtro enquanto digita nos campos
	$('.filtro input').on('keyup', function(){
		var nomeFantasiaFiltro = $('#nomeFantasiaFiltro').val();
		var responsavelNomeFiltro = $('#responsavelNomeFiltro').val();
		var responsavelTelFiltro = $('#responsavelTelFiltro').val();
		var responsavelEmailFiltro = $('#responsavelEmailFiltro').val();
		var cnpjFiltro = $('#cnpjFiltro').val();
		var razaoFiltro = $('#razaoFiltro').val();
		var enderecoFiltro = $('#enderecoFiltro').val();

		$.ajax({
			type: 'POST',
			url: 'mod_telefonia/ajax/carregaListaEmpresas.php',
			data:{
				op: 'filtro',
				nomeFantasiaFiltro: nomeFantasiaFiltro,
				responsavelNomeFiltro: responsavelNomeFiltro,
				responsavelTelFiltro: responsavelTelFiltro,
				responsavelEmailFiltro: responsavelEmailFiltro,
				cnpjFiltro: cnpjFiltro,
				razaoFiltro: razaoFiltro,
				enderecoFiltro: enderecoFiltro
			},
			success: function(data){
				//Limpa lista
				$('#listaEmpresas').empty();

				//Carrega lista em div
				$('#listaEmpresas').append(data);
			}
		})
	})

})