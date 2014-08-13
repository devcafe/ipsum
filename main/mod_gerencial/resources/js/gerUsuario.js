$(document).ready(function(){


/****************** Escopo global ******************/



/****************** Escopo global ******************/

// função carrega lista de usuários


	function carregaUsuarios(){
		$.ajax({
			type: 'POST',			
			url: 'mod_gerencial/ajax/carregaUsuarios.php',
			success: function (data){				
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
});