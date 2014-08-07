$(document).ready(function(){

	//Esconde modals
	$( "#alterarItemModal" ).hide();

	//Esconde filtro
	$('.filtro').hide();

	//Mascara campos
	$("#telefone").mask("(99) 9999-9999");
	$("#celular").mask("(99) 9.9999-9999");
	$("#cpf").mask("999.999.999-99");
	$("#rg").mask("999.999.999-9");

	//Carrega lista de empresas na inicialização
	carregaLista();

	//Função para retornar lista de empresas
	function carregaLista(){
		$.ajax({
			type: 'POST',
			url: 'mod_telefonia/ajax/carregaListaUsuarios.php',
			data:{
				op: ''
			},
			success: function (data){
				//Limpa lista
				$('#listaUsuarios').empty();

				//Carrega lista em div
				$('#listaUsuarios').append(data);
			}
		});
	}

	//Marca campos como selecionados ao clicar em uma linha
	$('#listaUsuarios').on('click', 'table tr:not(:first-child)', function(){
		
		if($(this).hasClass('selected')){
			//Remove classe que marca como selecionado
			$(this).removeClass('selected');
		} else {
			//Adiciona classe que marca como selecionado
			$(this).addClass('selected');
		}
		
	});

	//Carrega dados para editar item
	$('#listaUsuarios').on('dblclick', 'table tr:not(:first-child)', function(){
		var idUsuario = $(this).attr('id');

		//Campos que receberão dados
		var nome = $('#nomeUsuario');
		var telefone = $('#telefone');
		var celular = $('#celular');
		var email = $('#email');
		var endereco = $('#endereco');
		var rg = $('#rg');
		var cpf = $('#cpf');
		var profissao = $('#profissao');
		var observacoes = $('#observacoes');

		//Carrega dados do usuário para edição
		$.ajax({
			type: 'POST',
			url: 'mod_telefonia/ajax/carregaDadosEdicaoUsuarios.php',
			data: {
				idUsuario: idUsuario
			},
			success: function(data){
				var json = $.parseJSON(data);

				//Popula campos
				$('#idUsuario').val(idUsuario);
				nome.val(json.nome);
				telefone.val(json.telefone);
				celular.val(json.celular);
				email.val(json.email);
				endereco.val(json.endereco);
				rg.val(json.rg);
				cpf.val(json.cpf);
				profissao.val(json.profissao);
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
	$('#alterarItemModal').on('click', '#cadUsuario', function(){
		//Pega valores
		var idUsuario = $('#idUsuario').val();
		var nome = $('#nomeUsuario').val();
		var telefone = $('#telefone').val();
		var celular = $('#celular').val();
		var email = $('#email').val();
		var endereco = $('#endereco').val();
		var rg = $('#rg').val();
		var cpf = $('#cpf').val();
		var profissao = $('#profissao').val();
		var observacoes = $('#observacoes').val();

		$.ajax({
			type: 'POST',
			url: 'mod_telefonia/ajax/alteraUsuario.php',
			data:{
				idUsuario: idUsuario,
				nome: nome,
				telefone: telefone,
				celular: celular,
				email: email,
				endereco: endereco,
				rg: rg,
				cpf: cpf,
				profissao: profissao,
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
				url: 'mod_telefonia/ajax/deletaUsuario.php',
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
		var nomeFiltro = $('#nomeFiltro').val();
		var telefoneFiltro = $('#telefoneFiltro').val();
		var celularFiltro = $('#celularFiltro').val();
		var enderecoFiltro = $('#enderecoFiltro').val();
		var cpfFiltro = $('#cpfFiltro').val();
		var rgFiltro = $('#rgFiltro').val();
		var profissaoFiltro = $('#profissaoFiltro').val();

		$.ajax({
			type: 'POST',
			url: 'mod_telefonia/ajax/carregaListaUsuarios.php',
			data:{
				op: 'filtro',
				nomeFiltro: nomeFiltro,
				telefoneFiltro: telefoneFiltro,
				celularFiltro: celularFiltro,
				enderecoFiltro: enderecoFiltro,
				cpfFiltro: cpfFiltro,
				rgFiltro: rgFiltro,
				profissaoFiltro: profissaoFiltro
			},
			success: function(data){
				//Limpa lista
				$('#listaUsuarios').empty();

				//Carrega lista em div
				$('#listaUsuarios').append(data);
			}
		})
	})
})