$(document).ready(function(){


	//Esconde modals
	$( "#descricaoModal" ).hide();

	//Carrega lista de chamados na inicialização
	carregaLista();

	//Função para alterar "+" e "-" da lista
	function alternaBotoes(classe, ref){
		//Variavel de controle para esconder ou mostrar os subitens
		var controle;

		//Se a classe for "plus" altera para "minus"
		if(classe == 'plus'){
			$('.' + ref).removeClass('plus');
			$('.' + ref).addClass('minus');

			controle = 0;
		} else {
			$('.' + ref).removeClass('minus');
			$('.' + ref).addClass('plus');

			controle = 1;
		}

		return controle;
	}

	//Função para retornar lista de chamados
	function carregaLista(){
		$.ajax({
			type: 'POST',
			data: { op: '' },
			url: 'mod_ti/ajax/carregaListaChamados.php',
			success: function (data){
				//Carrega lista em div
				$('#listaChamados').append(data);
			}
		})
	}

	$('#listaChamados').on('click', '.expand', function(){
	
		var id = $(this).parent().attr('id');

		//Pega classe para alternar imagens "+" e "-"
		var ref = $(this).attr('class').split(' ')[1];

		//Nome da classe
		var classe = $(this).attr('class').split(' ')[2];

		var sub = $('#' + ref).attr('id');

		//Para adicionar comentario para determinado chamado
		var comentario = $('#comentario_' + ref).attr('id');
		
		//Se a classe do botão clicado for igual ao id encontrado expande apenas subitens com o id selecionado
		if(ref == sub){
			//Chama função e dependendo do retorno exibe ou retrai os subitens
			if(alternaBotoes(classe, ref) == 0){
				$('.sub_' + ref).css('display', 'table-row');
				$('#comentario_' + ref).css('display', 'table-row');
			} else {
				$('.sub_' + ref).css('display', 'none');
				$('#comentario_' + ref).css('display', 'none');
			}
		}
	})

	//Adicionar comentário ao chamado
	$('#listaChamados').on('click', '.addComentario', function(){
		//Pega id do chamado onde esta se adicionando uma descrição
		var idChamado = $(this).attr('id').split('_')[1];
	
		//Limpa campo com comentario
		$('#novoComentarioChamado').val('');

		//Abre modal para adicionar comentário
		$( "#descricaoModal" ).dialog({
			width: 600,
			show: {
		        effect: "blind",
		        duration: 500
	     	}
		});

		//Pega status e prioridade atual do chamado
		$.ajax({
			type: 'POST',
			data: { idChamado: idChamado },
			url: 'mod_ti/ajax/carregaDadosChamado.php',
			success: function (data){
				var json = $.parseJSON(data);

				//Coloca prioridade atual do chamado
				$('#prioridade').val(json.prioridade);
				
				//Coloca status atual do chamado
				$('#status').val(json.status);
			}
		})

		//Coloca id do chamado no input hidden para adicionar o comentario no chamado correto
		$('#idHiddenChamado').val(idChamado);		
	})

	//Envia formulário com novo comentário
	$('#addNovoComentario').on('click', function(){
		//Pega o id do chamado
		var idChamadoAdd = $('#idHiddenChamado').val();

		//Comentario
		var comentario = $('#novoComentarioChamado').val();

		//Atualiza status e prioridade
		var status = $('#status').val();
		var prioridade = $('#prioridade').val();

		//Cadastra novo comentário
		$.ajax({
			type: 'POST',
			data: { 
				idChamadoAdd: idChamadoAdd,
				comentario: comentario,
				status: status,
				prioridade: prioridade 
			},
			url: 'mod_ti/ajax/cadComentarioChamado.php',
			success: function (data){
				//Limpa campo
				$('#novoComentarioChamado').val('');

				//Fecha dialog
				$( "#descricaoModal" ).dialog('destroy');

				//Limpa lista
				$('#listaChamados').empty();

				//Recarrega lista
				carregaLista();

				alert(data);
			}
		})
	});

	//Filtro de chamados
	$('#exibirFiltro').on('change', function(){
		var statusFiltro = $('#exibirFiltro').val();

		//Faz filtro de acordo com status selecionado
		$.ajax({
			type: 'POST',
			data: { 
				op: 'filtro',
				statusFiltro: statusFiltro
			},
			url: 'mod_ti/ajax/carregaListaChamados.php',
			success: function (data){
				//Limpa lista
				$('#listaChamados').empty();

				//Carrega lista em div
				$('#listaChamados').append(data);
				//alert(data);
			}
		})
	});

})