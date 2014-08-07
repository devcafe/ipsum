$(document).ready(function(){

	//Mascara campos
	$("#telefone").mask("(99) 9999-9999");
	$("#celular").mask("(99) 9.9999-9999");
	$("#cpf").mask("999.999.999-99");
	$("#rg").mask("999.999.999-9");

	//Cadastra Usuario
	$('#conteudoInner .formInner form').on('click', '#cadUsuario', function(event){
		event.preventDefault();
		event.stopPropagation();
		
		//Armazena dados do formulário em variaveis
		var nomeUsuario		= $('#nomeUsuario').val();
		var telefone		= $('#telefone').val();
		var celular			= $('#celular').val();
		var endereco 		= $('#endereco').val();
		var rg				= $('#rg').val();
		var profissao		= $('#profissao').val();
		var cpf				= $('#cpf').val();
		var observacoes		= $('#observacoes').val();
		
		//Envia formulário
		$.ajax({
			type: 'POST',
			url: 'mod_telefonia/ajax/cadUsuario.php',
			data: {
				nomeUsuario: nomeUsuario,
				telefone: telefone,
				celular: celular,
				rg: rg,
				profissao: profissao,
				endereco: endereco,
				cpf: cpf,
				observacoes: observacoes
			},
			success: function (data){
				alert(data);
			}
		})
	})
})