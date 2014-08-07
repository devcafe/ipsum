$(document).ready(function(){

	//Mascara campos
	$("#numLinha").mask("(99) 9.9999-9999");
	$("#memoria").mask("99 GB");

	//Lista de usuários para autocomplementar
	$('.usersList').hide();

	//Esconde modals
	$('#usuariosModal').hide();
	$('#empresasModal').hide();
	$('#aparelhosModal').hide();

	//Esconde campos do formulário
	$('#showUsuario').hide();
	$('#showAparelho').hide();
	$('#showEmpresaAcao').hide();

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
			
			var statusAparelho = $("input[name='aparelho']:checked").prev().val();
			//alert(statusAparelho);
			var nomeAparelho = $("input[name='aparelho']:checked + label").text();
			var idAparelho = $("input[name='aparelho']:checked").val();

			//Coloca id da empresa no input hidden para gravar no banco
			$('#aparelhoLinha').val(idAparelho);

			$('#aparelhoStatusId').val(statusAparelho);

			//Mostra input com o nome da empresa
			$('#showAparelho').show();
			$('#showAparelho').val(nomeAparelho);

			//Fecha dialog
			$( "#aparelhosModal" ).dialog('destroy');
		})
	});


	//Envia formulário ao clicar no botão
	$('#cadLinha').on('click', function(){
		//Armazena dados do formulário em variaveis
		var numLinha 		= $('#numLinha').val();
		var plano			= $('#plano').val();
		var iccid			= $('#iccid').val();
		var operadora		= $('#operadora').val();
		var usuarioLinha	= $('#usuarioLinha').val();
		var empresaAcao		= $('#empresaAcao').val();
		var aparelhoLinha	= $('#aparelhoLinha').val();
		var status			= $('#status').val();
		var observacoes		= $('#observacoes').val();
		var statusAparelho 	= $('#aparelhoStatusId').val();

		//Envia formulário
		$.ajax({
			type: 'POST',
			url: 'mod_telefonia/ajax/cadLinha.php',
			data: {
				numLinha: numLinha,
				plano: plano,
				iccid: iccid,
				usuarioLinha: usuarioLinha,
				empresaAcao: empresaAcao,
				status: status,
				operadora: operadora,
				observacoes: observacoes,
				aparelhoLinha: aparelhoLinha,
				statusAparelho: statusAparelho			
			},
			success: function (data){
				alert(data);
			}
		})
	});

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
	
})