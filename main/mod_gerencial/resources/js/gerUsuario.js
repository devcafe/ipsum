$(document).ready(function(){


/****************** Escopo global ******************/



/****************** Escopo global ******************/

// função carrega lista de usuários


	function carregaUsuarios(){
		$.ajax({
			type: 'POST',			
			url: 'mod_gerencial/ajax/carregaUsuarios.php',
			success: function (data){	
				$('#listaUsuarios').empty();			
				$('#listaUsuarios').append(data);

			}
		})
	}

	carregaUsuarios();
	

	//Marca campos como selecionados ao clicar em uma linha
	$('#listaUsuarios').on('click', 'table tr:not(:first-child)', function(){
		
		if($(this).hasClass('selected')){
			//Remove classe que marca como selecionado
			$(this).removeClass('selected');
		} else {
			//Adiciona classe que marca como selecionado
			$(this).addClass('selected');
		}
	
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
				url: 'mod_gerencial/ajax/deletaUsuario.php',
				data: {
					itens: itens
				},
				success: function(data){
					//Recarrega lista para atualizar dados
					carregaUsuarios();				

					alert(data);
				}
			})
		}
	})



	//Carrega dados para editar item
	$('#listaUsuarios').on('dblclick', 'table tr:not(:first-child)', function(){

		var id = $(this).attr('id');

		//Campos que receberão dados
		var primeiroNome = $('#primeiroNome');
		var sobrenome = $('#sobrenome');
		var email = $('#email');
		var departamento = $('#departamento');
		var empresa = $('#empresa');
		var cnpj = $('#cnpj');
		var usuario = $('#usuario');
		var senha = $('#senha');
		var acessos = $('#acessos');		

		//Carrega dados da linha para edição
		$.ajax({
			type: 'POST',
			url: 'mod_gerencial/ajax/carregaDadosEdicaoUsuarios.php',
			data: {
				id: id
			},
			success: function(data){
				var json = $.parseJSON(data);
				
				//Popula campos
				$('#id').val(id);

				primeiroNome.val(json.nome);
				sobrenome.val(json.sobrenome);
				email.val(json.email);
				departamento.val(json.departamento);
				empresa.val(json.empresa);
				cnpj.val(json.cnpj);
				usuario.val(json.usuario);
				//senha.val(json.senha);
				acessos.val(json.acessos);				
				
			}
		});

	//Abre modal com dados do item a ser editado
		$( "#alterarItemModal" ).dialog({
			width: 800,
			show: {
		        effect: "blind",
		        duration: 500
	     	}
		});
	});

	$('#gravar').on('click', function(){

		//pega os valores
		var id 				= $('#id').val();
		var nome 			= $('#primeiroNome').val();
		var sobrenome		= $('#sobrenome').val();
		var email 			= $('#email').val();
		var departamento 	= $('#departamento').val;
		var empresa 		= $('#empresa').val();
		var cnpj 			= $('#cnpj').val();
		var usuario 		= $('#usuario').val();
		var senha 			= $('#senha').val();
		var acessos 		= $('#acessos').val();

		$.ajax({
			type: 'POST',
			url: 'mod_gerencial/ajax/alteraUsuario.php',
			data:{
				id: id,
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
				//recarrega lista para atualizar dados
				carregaUsuarios();
				//fecha o dialogo

				$('#alterarItemModal').dialog('destroy');
				alert("Alterações feitas com sucesso");
			}
		})



	})
	

	
});