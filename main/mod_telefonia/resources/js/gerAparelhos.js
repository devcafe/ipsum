$(document).ready(function(){

	//Esconde filtro
	$('.filtro').hide();

	//Esconde modal
	$('#alterarItemModal').hide();

	//Carrega lista de linhas moveis na inicialização
	carregaLista();

	//Função para retornar lista de aparelhos
	function carregaLista(){
		$.ajax({
			type: 'POST',
			url: 'mod_telefonia/ajax/carregaListaAparelhos.php',
			data: {
				op: ''
			},
			success: function (data){
				//Limpa lista
				$('#listaAparelhos').empty();

				//Carrega lista em div
				$('#listaAparelhos').append(data);
			}
		});
	}

	//Marca campos como selecionados ao clicar em uma linha
	$('#listaAparelhos').on('click', 'table tr:not(:first-child)', function(){
		
		if($(this).hasClass('selected')){
			//Remove classe que marca como selecionado
			$(this).removeClass('selected');
		} else {
			//Adiciona classe que marca como selecionado
			$(this).addClass('selected');
		}
		
	});

	//Carrega dados para editar item
	$('#listaAparelhos').on('dblclick', 'table tr:not(:first-child)', function(){

		var idAparelho = $(this).attr('id');

		//Campos que receberão dados
		var marcaAparelho = $('#marcaAparelho');
		var modeloAparelho = $('#modeloAparelho');
		var imeiAParelho = $('#imeiAParelho');
		var idAparelhoStatus = $('#idAparelhoStatus');
		var dataEnvioManutencao = $('#dataEnvioManutencao');
		var acessorios = $('#acessorios');
		var observacoes = $('#observacoes');

		//Carrega dados da linha para edição
		$.ajax({
			type: 'POST',
			url: 'mod_telefonia/ajax/carregaDadosEdicaoAparelhos.php',
			data: {
				idAparelho: idAparelho
			},
			success: function(data){
				var json = $.parseJSON(data);

				//Popula campos
				$('#idAparelho').val(idAparelho);
				marcaAparelho.val(json.marcaAparelho);
				modeloAparelho.val(json.modeloAparelho);
				imeiAParelho.val(json.imeiAparelho);
				idAparelhoStatus.val(json.idAparelhoStatus);
				dataEnvioManutencao.val(json.dataEnvioManutencao);
				acessorios.val(json.acessorios);
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
		
		//Campos que receberão dados
		var idAparelho = $('#idAparelho').val();
		var marcaAparelho = $('#marcaAparelho').val();
		var modeloAparelho = $('#modeloAparelho').val();
		var imeiAParelho = $('#imeiAParelho').val();
		var idAparelhoStatus = $('#idAparelhoStatus').val();
		var dataEnvioManutencao = $('#dataEnvioManutencao').val();
		var acessorios = $('#acessorios').val();
		var observacoes = $('#observacoes').val();

		$.ajax({
			type: 'POST',
			url: 'mod_telefonia/ajax/alteraAparelho.php',
			data:{
				idAparelho: idAparelho,
				marcaAparelho: marcaAparelho,
				modeloAparelho: modeloAparelho,
				imeiAParelho: imeiAParelho,
				idAparelhoStatus: idAparelhoStatus,
				dataEnvioManutencao: dataEnvioManutencao,
				acessorios: acessorios,
				observacoes: observacoes
			},
			success: function(data){
				//Recarrega lista para atualizar dados
				carregaLista();
				alert(data);
				//Fecha dialog
				$( "#alterarItemModal" ).dialog('destroy');

				//alert(data);
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
					url: 'mod_telefonia/ajax/deletaAparelhos.php',
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


	//Habilita filtro de aparelhos
	$('#btnFiltrar').on('click', function(){
		$('.filtro').toggle();
	});

	//Faz filtro enquanto digita nos campos
	$('.filtro input').on('keyup', function(){
		var marcaFiltro = $('#marcaFiltro').val();
		var modeloFiltro = $('#modeloFiltro').val();
		var imeiFiltro = $('#imeiFiltro').val();
		var envioFiltro = $('#envioFiltro').val();
		var tipoAparelho = $('#tipoAparelho').val();
		var statusFiltro = $('#statusFiltro').val();

		$.ajax({
			type: 'POST',
			url: 'mod_telefonia/ajax/carregaListaAparelhos.php',
			data:{
				op: 'filtro',
				marcaFiltro: marcaFiltro,
				modeloFiltro: modeloFiltro,
				imeiFiltro: imeiFiltro,
				tipoAparelho: tipoAparelho,
				statusFiltro: statusFiltro,
				envioFiltro: envioFiltro,
			},
			success: function(data){
				//Limpa lista
				$('#listaAparelhos').empty();

				//Carrega lista em div
				$('#listaAparelhos').append(data);
			}
		})
	})

	//Faz filtro ao mudar select
	$('.filtro select').on('change', function(){
		var marcaFiltro = $('#marcaFiltro').val();
		var modeloFiltro = $('#modeloFiltro').val();
		var imeiFiltro = $('#imeiFiltro').val();
		var envioFiltro = $('#envioFiltro').val();
		var tipoAparelho = $('#tipoAparelho').val();
		var statusFiltro = $('#statusFiltro').val();

		$.ajax({
			type: 'POST',
			url: 'mod_telefonia/ajax/carregaListaAparelhos.php',
			data:{
				op: 'filtro',
				marcaFiltro: marcaFiltro,
				modeloFiltro: modeloFiltro,
				imeiFiltro: imeiFiltro,
				tipoAparelho: tipoAparelho,
				statusFiltro: statusFiltro,
				envioFiltro: envioFiltro,
			},
			success: function(data){
				//Limpa lista
				$('#listaAparelhos').empty();

				//Carrega lista em div
				$('#listaAparelhos').append(data);
			}
		})
	})
})