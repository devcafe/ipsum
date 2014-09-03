$(document).ready(function() {

	/*************************************/
	/* Inicialização
	/*************************************/
	//Esconde modals
	$('#addAcaoModal').hide();
	$('#alteraAcaoModal').hide();

	//Carrega lista de ações
	carregaAcoes();

	/*************************************/
	/* Funções
	/*************************************/
	//Cadastrar ação
	$('.addAcao').on('click', function(){
		//Abre modal com lojas
		$( "#addAcaoModal" ).dialog({
			width: 600,
			show: {
		        effect: "blind",
		        duration: 500
	     	}
		});

	})

	//Adiciona colcaboradores a lista
	$('#colaboradoresSearch').on('keyup', function(){
		var colaboradoresSearch = $('#colaboradoresSearch').val();

		$.ajax({
			type: 'POST',
			data: {
				colaboradoresSearch: colaboradoresSearch
			},
			url: 'mod_operacional/ajax/carregaListaColaboradoresAcao.php',
			success: function (data){
				
				$('.listaColaboradoresAcao').empty();

				//Carrega lista em div
				$('.listaColaboradoresAcao').append(data);
			}
		})
	});

	//Adiciona colcaboradores a lista (alterar ação)
	$('#alterarAcaoForm').on('keyup', '#colaboradoresSearchAlt', function(){
		var colaboradoresSearch = $('#colaboradoresSearchAlt').val();

		$.ajax({
			type: 'POST',
			data: {
				colaboradoresSearch: colaboradoresSearch
			},
			url: 'mod_operacional/ajax/carregaListaColaboradoresAcaoAlt.php',
			success: function (data){
				
				$('.listaColaboradoresAcaoAlt').empty();

				//Carrega lista em div
				$('.listaColaboradoresAcaoAlt').append(data);
			}
		})
	});

	//Adiciona na lista que será inserida no banco
	$('.listaColaboradoresAcao').on('click', '.checkBox', function(){
		var id = $(this).attr('id');
		var nome = $(this).html();

		if($('.colaboradoresToSave tr.'+id).length){
			alert("Este usuário já foi adicionado");
		} else {
			$(this).remove();

			$('.colaboradoresToSave').append('<tr class = '+id+'> <td>'+ nome +'</td> </tr>');
			$('.colaboradoresToSave').append('<tr> <td> <input type = "hidden" name = "userId" value = '+ id +'> </td> </tr>');
		}

	})

	//Adiciona na lista que será inserida no banco (tela para alterar ação)
	$('#alterarAcaoForm').on('click', '.listaColaboradoresAcaoAlt .checkBox', function(){
		var id = $(this).attr('id');
		var nome = $(this).html();

		if($('.colaboradoresToSaveAlt tr.'+id).length){
			alert("Este usuário já foi adicionado");
		} else {
			$(this).remove();

			$('.colaboradoresToSaveAlt').append('<tr class = '+id+'> <td>'+ nome +'</td> </tr>');
			$('.colaboradoresToSaveAlt').append('<tr> <td> <input type = "hidden" name = "userId" value = "'+ id +'"> </td> </tr>');
		}

	})

	//Remove colaboradores da lista para não adicionar
	$('.colaboradoresToSave').on('click', 'tr', function(){
		$(this).remove();
	});

	//Remove colaboradores da lista para não adicionar (tela para alterar ação)
	$('#alterarAcaoForm').on('click', '.colaboradoresToSaveAlt tr', function(){
		$(this).remove();
		var idHidden = $(this).attr('class').slice(-1);

		$('.'+idHidden).remove();
	});

	//Grava ação no banco
	$('#cadastraAcao').on('click', function(){
		var nomeAcao = $('#nomeAcao').val();

		var itens = '';

		$('.colaboradoresToSave input[type=hidden]').each(function(){
			itens += $(this).val()+',';
		})

		itens = itens.substring(0, itens.length - 1);

		$.ajax({
			type: 'POST',
			data: {
				itens: itens,
				nomeAcao: nomeAcao
			},
			url: 'mod_operacional/ajax/cadAcao.php',
			success: function (data){
				alert(data);

				$( "#addAcaoModal" ).dialog( 'destroy' );

				carregaAcoes();
			}
		})

	})

	//Carrega lista de ações
	function carregaAcoes(){
		var pag = $('#pagina').val();

		$.ajax({
			type: 'POST',
			data: {
				pag: pag
			},
			url: 'mod_operacional/ajax/carregaAcoes.php',
			success: function (data){
				$('.acoesList').empty();
				$('.acoesList').append(data);
			}
		})
		
	}

	//Altera ação
	$('.acoesList').on('dblclick', '#acoesTable tr', function(){
		var id = $(this).attr('id');

		//Carrega dados da ação no formulário
		$.ajax({
			type: 'POST',
			data: {
				id: id
			},
			url: 'mod_operacional/ajax/carregaDadosAcao.php',
			success: function (data){
				//Abre modal com lojas
				$( "#alteraAcaoModal" ).dialog({
					width: 600,
					show: {
				        effect: "blind",
				        duration: 500
			     	}
				});

				$('#alterarAcaoForm').empty();
				$('#alterarAcaoForm').append(data);
			}
		})
		
	})

	//Envia dados para gravar no banco
	$('#alterarAcaoForm').on('click', '#alterarAcao', function(){
		var nomeAcao = $('#nomeAcaoAlt').val();
		var idAcaoAlt = $('#idAcaoAlt').val();
		var itens = '';

		$('.colaboradoresToSaveAlt input[type=hidden]').each(function(){
			itens += $(this).val()+',';
		})

		itens = itens.substring(0, itens.length - 1);

		console.log(itens);

		$.ajax({
			type: 'POST',
			data: {
				itens: itens,
				nomeAcao: nomeAcao,
				idAcaoAlt: idAcaoAlt
			},
			url: 'mod_operacional/ajax/altAcao.php',
			success: function (data){
				console.log(data);

				//$( "#addAcaoModal" ).dialog( 'destroy' );
			}
		})
	});


	//Muda de página
	$('.acoesList').on('click', '.toPage', function(){

		//Verifica o novo id
		var newPage = $(this).attr('id');

		//Passa o novo id a um elemento hidden
		$('#pagina').val(newPage);

		//Chama a função para carregar proxima pagina
		carregaAcoes();

	})
});