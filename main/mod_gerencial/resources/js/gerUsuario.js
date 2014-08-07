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


})