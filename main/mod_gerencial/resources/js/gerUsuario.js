$(document).ready(function(){


/****************** Escopo global ******************/

$('#alterarItemModal').hide();
carregaUsuarios();

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
		var primeiroNomeMod = $('#primeiroNomeMod');
		var sobrenomeMod = $('#sobrenomeMod');
		var emailMod = $('#emailMod');
		var departamentoMod = $('#departamentoMod');
		var empresaMod = $('#empresaMod');
		var cnpjMod = $('#cnpjMod');
		var usuarioMod = $('#usuarioMod');
		var senhaMod = $('#senhaMod');
		var acessosMod = $('#acessosMod');		

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
				$('#idMod').val(id);
				primeiroNomeMod.val(json.nome);
				sobrenomeMod.val(json.sobrenome);
				emailMod.val(json.email);
				departamentoMod.val(json.departamento);
				empresaMod.val(json.empresa);
				cnpjMod.val(json.cnpj);
				usuarioMod.val(json.usuario);
				//acessosMod.val(json.acessos);
				var acessos = json.acessos; 

				//tratar acessos

				$.ajax({
					type:'POST',
					data: {
						acessos : acessos,
					},
					url: 'mod_gerencial/ajax/tratarAcessos.php',
					success: function (data){
						console.log(acessos);

						$('#teste').empty().append(data);
					}
				})				
				
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
		var dados = $('#formModelAlterarUsuario').serialize();
		$('#formModelAlterarUsuario input').each( function() {
			dados = dados + '&' + $(this).attr('name') + '=' + $(this).val();
		});

		$.ajax({
			type: 'POST',
			url: 'mod_gerencial/ajax/alteraUsuario.php',
			data:{
				dados: dados,
			},
			success: function(data){
				//recarrega lista para atualizar dados
				carregaUsuarios();
				//fecha o dialogo
				console.log(data);


				// $('#alterarItemModal').dialog('destroy');
				// alert("Alterações feitas com sucesso");
			}
		})



	})
	

	
});