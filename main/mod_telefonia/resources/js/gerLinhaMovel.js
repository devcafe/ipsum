$(document).ready(function(){

	//Esconde modals
	$( "#alterarItemModal" ).hide();

	//Esconde filtro
	$('.filtro').hide();

	//Mascara campos
	$("#numLinha").mask("(99) 9.9999-9999");
	$("#memoria").mask("99 GB");
	$("#linhaFiltro").mask("(99) 9.9999-9999");

	//Esconde modals
	$('#usuariosModal').hide();
	$('#empresasModal').hide();
	$('#aparelhosModal').hide();

	//Esconde campos do formulário
	$('#showUsuario').hide();
	$('#showAparelho').hide();
	$('#showEmpresaAcao').hide();

	function limpaCampos(){
		//Limpa dados dos campos
		$('#usuarioLinha').val('');
		$('#showUsuario').val('');
	}

	function exibeCampos(){
		//Mostra campos para edição
		$('#showUsuario').show();
		$('#showEmpresaAcao').show();
		$('#showAparelho').show();
	}

	function carregaListaAparelhos(){
		$.ajax({
			type: 'POST',
			url: 'mod_telefonia/ajax/carregaListaAparelhosModal.php',
			success: function(data){
				$('#aparelhosModal').empty();
				$('#aparelhosModal').append(data);
			}	
		})
	}

	//Carrega lista de aparelhos no modal
	carregaListaAparelhos();

	//Abre modal para selecionar usuários
	$('#selecionaUsuario').on('click', function(){
		$( "#usuariosModal" ).dialog({
			width: 600,
			show: {
		        effect: "blind",
		        duration: 500
	     	}
		});

		$('#usuariosOK').on('click', function(){
			
			var nomeUsuario = $("input[name='usuario']:checked + label").text();
			var idUsuario = $("input[name='usuario']:checked").val();

			//Fecha dialog
			$( "#usuariosModal" ).dialog('destroy');

			//Coloca id do usuário no input hidden para gravar no banco
			$('#usuarioLinha').val(idUsuario);

			//Mostra input com o nome do usuário
			$('#showUsuario').show();
			$('#showUsuario').val(nomeUsuario);
		})
	});

	//Abre modal para selecionar empresa/ação
	$('#selecionaEmpresaAcao').on('click', function(){
		$( "#empresasModal" ).dialog({
			width: 600,
			show: {
		        effect: "blind",
		        duration: 500
	     	}
		});

		$('#empresasOK').on('click', function(){
			
			var nomeEmpresa = $("input[name='empresa']:checked + label").text();
			var idEmpresa = $("input[name='empresa']:checked").val();

			//Fecha dialog
			$( "#empresasModal" ).dialog('destroy');

			//Coloca id da empresa no input hidden para gravar no banco
			$('#empresaAcao').val(idEmpresa);

			//Mostra input com o nome da empresa
			$('#showEmpresaAcao').show();
			$('#showEmpresaAcao').val(nomeEmpresa);
		})
	});

	//Abre modal para selecionar aparelhos
	$('#selecionaAparelho').on('click', function(){
		$( "#aparelhosModal" ).dialog({
			width: 600,
			show: {
		        effect: "blind",
		        duration: 500
	     	}
		});

		$('#aparelhosOK').on('click', function(){
			var nomeAparelho = $("input[name='aparelho']:checked + label").text();
			var idAparelho = $("input[name='aparelho']:checked").val();

			//Fecha dialog
			$( "#aparelhosModal" ).dialog('destroy');

			//Coloca id da empresa no input hidden para gravar no banco
			$('#aparelhoLinha').val(idAparelho);

			//Mostra input com o nome da empresa
			$('#showAparelho').show();
			$('#showAparelho').val(nomeAparelho);
		})
	});

	//Carrega lista de linhas moveis na inicialização
	carregaLista();

	//Função para retornar lista de linhas moveis
	function carregaLista(){
		$.ajax({
			type: 'POST',
			url: 'mod_telefonia/ajax/carregaListaLinhasMoveis.php',
			data: {
				op: ''
			},
			success: function (data){
				//Limpa lista
				$('#listaLinhasMoveis').empty();

				//Carrega lista em div
				$('#listaLinhasMoveis').append(data);
			}
		});
	}

	//Marca campos como selecionados ao clicar em uma linha
	$('#listaLinhasMoveis').on('click', 'table tr:not(:first-child)', function(){
		
		if($(this).hasClass('selected')){
			//Remove classe que marca como selecionado
			$(this).removeClass('selected');
		} else {
			//Adiciona classe que marca como selecionado
			$(this).addClass('selected');
		}
		
	});

	//Carrega dados para editar item
	$('#listaLinhasMoveis').on('dblclick', 'table tr:not(:first-child)', function(){

		//Limpa dados dos campos ocultos e depois exibe com os dados preenchidos
		limpaCampos();
		exibeCampos();

		var idLinha = $(this).attr('id');

		//Campos que receberão dados
		var numLinha = $('#numLinha');
		var plano = $('#plano');
		var usuarioLinhaId = $('#usuarioLinha');
		var usuarioLinha = $('#showUsuario');
		var empresaAcaoId = $('#empresaAcao');
		var empresaAcao = $('#showEmpresaAcao');
		var aparelhoId = $('#aparelhoLinha');
		var aparelho = $('#showAparelho');
		var iccid = $('#iccid');
		var statusLinha = $('#status');
		var operadora = $('#operadora');
		var observacoes = $('#observacoes');

		//Carrega dados da linha para edição
		$.ajax({
			type: 'POST',
			url: 'mod_telefonia/ajax/carregaDadosEdicaoLinhaMovel.php',
			data: {
				idLinha: idLinha
			},
			success: function(data){
				var json = $.parseJSON(data);

				//Popula campos
				$('#idLinha').val(idLinha);
				numLinha.val(json.numLinha);
				plano.val(json.plano);
				usuarioLinha.val(json.nome);
				usuarioLinhaId.val(json.idUsuarioMovel);
				empresaAcao.val(json.nomeEmpresa);
				empresaAcaoId.val(json.idEmpresa);
				aparelhoId.val(json.idAparelho);
				aparelho.val(json.marcaAparelho + ' - ' + json.modeloAparelho + ' - ' + json.imeiAparelho);
				iccid.val(json.iccid);
				statusLinha.val(json.idLinhaStatus);
				operadora.val(json.operadora);
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
	$('#gravar').on('click', function(event){
		event.preventDefault();
		event.stopPropagation();
		
		//Pega valores
		var idLinha = $('#idLinha').val();
		var numLinha = $('#numLinha').val();
		var plano = $('#plano').val();
		var usuarioLinha = $('#usuarioLinha').val();
		var empresaAcao = $('#empresaAcao').val();
		var aparelho = $('#aparelhoLinha').val();
		var iccid = $('#iccid').val();
		var statusLinha = $('#status').val();
		var operadora = $('#operadora').val();
		var observacoes = $('#observacoes').val();

		$.ajax({
			type: 'POST',
			url: 'mod_telefonia/ajax/alteraLinha.php',
			data:{
				idLinha: idLinha,
				numLinha: numLinha,
				plano: plano,
				iccid: iccid,
				usuarioLinha: usuarioLinha,
				empresaAcao: empresaAcao,
				statusLinha: statusLinha,
				operadora: operadora,
				observacoes: observacoes,
				aparelho: aparelho
			},
			success: function(data){
				//Fecha dialog
				$( "#alterarItemModal" ).dialog('destroy');

				//Recarrega lista para atualizar dados
				carregaLista();

				//Recarrega lista de aparelhos do modal
				carregaListaAparelhos();

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

		if(itens == ''){
			alert("Favor selecionar ao menos um item");
		} else {
			//Solicita confirmação antes de apagar
			var answer = confirm("Tem certeza que deseja apagar o(s) iten(s) selecionado(s)?");

			if(answer){
				//Envia array com os itens selecionados para exclusão
				$.ajax({
					type: 'POST',
					url: 'mod_telefonia/ajax/deletaLinha.php',
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
			
		}
		
	})

	//Carrega usuários enquanto digita no campo
	$('#usuarioLinha').keyup(function(){
		//Recebe dados do campo
		var valor = $(this).val();

		//Envia dados para retornar usuários
		$.ajax({
			type: 'POST',
			url: 'mod_telefonia/ajax/autoComplementarUsuarios.php',
			data: {
				valor: valor,
			},
			success: function (data){
				//Gera json do array retornado
				var json = $.parseJSON(data);
				 
				//Ativa autocomplementar do JqueryUi
			    $( "#usuarioLinha" ).autocomplete({
					source: json
			    });

			}
		})
	})

	//Habilita filtro de linhas moveis
	$('#btnFiltrar').on('click', function(){
		$('.filtro').toggle();
	});

	//Faz filtro enquanto digita nos campos
	$('.filtro input').on('keyup', function(){
		var linhaFiltro = $('#linhaFiltro').val();
		var planoFiltro = $('#planoFiltro').val();
		var usuarioFiltro = $('#usuarioFiltro').val();
		var empresaAcaoFiltro = $('#empresaAcaoFiltro').val();
		var aparelhoFiltro = $('#aparelhoFiltro').val();
		var iccidFiltro = $('#iccidFiltro').val();
		var statusFiltro = $('#statusFiltro').val();
		var operadoraFiltro = $('#operadoraFiltro').val();

		$.ajax({
			type: 'POST',
			url: 'mod_telefonia/ajax/carregaListaLinhasMoveis.php',
			data:{
				op: 'filtro',
				linhaFiltro: linhaFiltro,
				planoFiltro: planoFiltro,
				usuarioFiltro: usuarioFiltro,
				empresaAcaoFiltro: empresaAcaoFiltro,
				aparelhoFiltro: aparelhoFiltro,
				iccidFiltro: iccidFiltro,
				statusFiltro: statusFiltro,
				operadoraFiltro: operadoraFiltro
			},
			success: function(data){
				//Limpa lista
				$('#listaLinhasMoveis').empty();

				//Carrega lista em div
				$('#listaLinhasMoveis').append(data);
			}
		})
	})

	//Faz filtro ao mudar select
	$('.filtro select').on('change', function(){
		var linhaFiltro = $('#linhaFiltro').val();
		var planoFiltro = $('#planoFiltro').val();
		var usuarioFiltro = $('#usuarioFiltro').val();
		var empresaAcaoFiltro = $('#empresaAcaoFiltro').val();
		var aparelhoFiltro = $('#aparelhoFiltro').val();
		var iccidFiltro = $('#iccidFiltro').val();
		var statusFiltro = $('#statusFiltro').val();
		var operadoraFiltro = $('#operadoraFiltro').val();

		$.ajax({
			type: 'POST',
			url: 'mod_telefonia/ajax/carregaListaLinhasMoveis.php',
			data:{
				op: 'filtro',
				linhaFiltro: linhaFiltro,
				planoFiltro: planoFiltro,
				usuarioFiltro: usuarioFiltro,
				empresaAcaoFiltro: empresaAcaoFiltro,
				aparelhoFiltro: aparelhoFiltro,
				iccidFiltro: iccidFiltro,
				statusFiltro: statusFiltro,
				operadoraFiltro: operadoraFiltro
			},
			success: function(data){
				//Limpa lista
				$('#listaLinhasMoveis').empty();

				//Carrega lista em div
				$('#listaLinhasMoveis').append(data);
			}
		})
	})

	//Gera termo de responsabilidade
	$('#gerarTermo').on('click', function(){
		//Pega id da linha selecionada
		var id = $('#listaLinhasMoveis table tr:not(:first-child)').hasClass("selected");
		
		//Caso esteja selecionada, monta o link com o id correspondente
		if(id){
			var id = $('.selected').attr('id');

			//Gera o link passando como parâmetro o id da linha
			var href = "mod_telefonia/ajax/carregaTermoResponsabilidade.php?term="+id;

			//Coloca o link no elemento
			$('#gerarTermo').attr('href', href);
		} else {
			//Caso não seja selecionado nenhum item ao clicar no botão
			alert("Favor selecionar um item");
		}
	
	})
})