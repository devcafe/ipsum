$(document).ready(function(){
	
	/****************** Escopo global ******************/

	var controleSubItens = 0;

	// Mascara CNPJ
	$('#cnpj').mask('99.999.999/9999-99');

	//ao carregar a tela esconde o elemento o 
	$('#screen').css("display", "none");


	/****************** ./Escopo global ******************/

	// Gera o nome de usuário 

		$('#sobrenome, #primeiroNome').keyup(function(){
	        var primeiroNome = $('#primeiroNome').val();
	        primeiroNome = primeiroNome.split(" ");
	        var sobrenome = $('#sobrenome').val();
	        sobrenome = sobrenome.split(" ");
	        var usuario = primeiroNome[0].toLowerCase() + sobrenome[0].toLowerCase()
	        $('#usuario').val(usuario);

	})
	// Ocultar elemnto
	var cont = 0;

	$('#definirAcessos').on('click', function(){			

		if (cont == 1) {
			$('#screen').css("display", "none");
			cont--;
		} else {
			$('#screen').css("display", "block");
			cont++;			
		}
			
		//
	});

	//Exibe itens secundarios de acordo com item primario selecionado
	$('#acessoPrimario li').on('click', function(){
		var idModulo = $(this).attr('id');
		
		//Limpa seleção de itens primarios
		limparSelecaoPrimario();

		//Adiciona classe de seleção apenas para o item clicado (primario)
		$('#'+ idModulo).addClass('selected');

		$.ajax({
			type: 'POST',
			url: 'mod_gerencial/ajax/carregaItemsSecundarios.php',
			data: {
				idModulo: idModulo
			}, 
			success: function(data){
				//Limpa lista
				$('#acessoSecundario').empty();

				//Adiciona items a lista
				$('#acessoSecundario').append(data);
			}
		});
	})

	function limparSelecaoPrimario(){
		//Itera cada um dos itens da lista
		$('#acessoPrimario li').each(function(){
			//Remove a seleção para todos os itens da lista
			if($(this).hasClass('selected')){
				$(this).removeClass('selected');
			}
		})
	}

	//Seleciona acessos secundarios
	$('.formInner').on('click', '#acessoSecundario li', function(){
		//ID do item secundario
		var idSecundario = ($(this).attr('id'));

		//Altera seleção do item
		if($('#'+ idSecundario).hasClass('selected')){
			//Limpa seleção do item no segundo click
			$(this).removeClass('selected');
		} else {
			//Adiciona classe de seleção apenas para o item clicado (primario)
			$('#'+ idSecundario).addClass('selected');
		}

		var idPrimario = 0;

		//ID do item primario
		//Itera cada um dos itens da lista
		$('#acessoPrimario li').each(function(){
			//Pega id apenas do item primario que foi selecionado
			if($(this).hasClass('selected')){
				idPrimario = $(this).attr('id');
			}
		});
	})

	//Adiciona itens de acesso secundario e primario na lista de acesso final
	$('#addListaFinal').on('click', function(){
		var idModuloSelecionado = 0;	
		controleSubItens = 0;

		//Pega o id do item primario selecionado
		$('#acessoPrimario li').each(function(){
			if($(this).hasClass('selected')){
				idModuloSelecionado = $(this).attr('id');
			}
		});

		//Pega id dos itens secundarios selecionados
		var idModulosItems = [];

		$('#acessoSecundario li').each(function(){
			if($(this).hasClass('selected')){
				idModulosItems[controleSubItens] = $(this).attr('id');
				controleSubItens++;
			}
		});		

		if(idModulosItems == ''){
			alert("Favor selecionar ao menos um item");
		} else {			
			//Envia ajax para montar lista final
			$.ajax({
				type: 'POST',
				url: 'mod_gerencial/ajax/carregaListaFinal.php',
				data: {
					idModuloSelecionado: idModuloSelecionado
					,idModulosItems: idModulosItems
				}, 
				success: function(data){
					$('.m_' + idModuloSelecionado).empty();

					$('#acessoFinal').append(data);
				}
			})
		}
			
	});

	//Limpa a opção selecionada
	$("#acessoFinal").on('click', '.minus', function(){
		//ID do item da lista
		var idLista = $(this).parent().parent().attr('id').split('_')[1];
		//ID do modulo
		var idModulo = $(this).parent().attr('id').split('_')[1];
		//ID do item da lista
		var idModuloItem = $(this).parent().attr('id').split('_')[2];

		//Contador
		var count = 0;

		if(idLista == idModulo){
			//Remove item da lista corespondente
			$('#i_' + idModulo + '_' + idModuloItem).remove();

			//Conta quantos itens filhos existem no modulo
			count = $('#l_' + idModulo).children().length;

			if(count == 0){
				//Remove modulo quando não existirem mais itens
				$('.m_' + idModulo).remove();
			}

			count--;
			
		}

	})




	// verifica se a senha está correto
	$('.confirmarSenhaNotificacao').css("display", "none");

	$('#confirmarSenha').on("keyup", function(){

		var senha = $('#senha').val();
		var confirmarSenha = $('#confirmarSenha').val();	
		
		if(senha != confirmarSenha){
			$('.confirmarSenhaNotificacao').css("display", "block");						
		} else {			
			$('.confirmarSenhaNotificacao').css("display", "none");
	

			//Cadastra usuário no sistema
			$('.area04').on('click','#cadUsuario', function(){

				// trata os modulos selecionados 
				var cont = 0;
				var modulos = [];

					$('.moduloSelecionadoFinal').each(function(){
						modulos[cont] = $(this).attr('id');
						cont++;			
					})

					//Guarda dados dos campos
					var nome			= $('#primeiroNome').val();
					var sobrenome 		= $('#sobrenome').val();
					var email 			= $('#email').val();
					var departamento 	= $('#departamento').val();
					var empresa 		= $('#empresa').val();
					var cnpj 			= $('#cnpj').val();
					var usuario 		= $('#usuario').val();		
					var acessos 		= modulos.toString();
					

					//Envia dados via ajax para cadastrar usuário
					$.ajax({
						type: 'POST',
						url: 'mod_gerencial/ajax/cadUsuario.php',
						data:{
							nome: nome,
							sobrenome: sobrenome,
							email: email,
							departamento: departamento,
							empresa: empresa,
							cnpj: cnpj,
							usuario: usuario,
							senha: senha,
							acessos: acessos
						},
						success: function(data){
							confirm(data);
						}
					})
			});
		}
	})	

})