$(document).ready(function(){

	//Mascara campos
	$("#telContatoResponsavel").mask("(99) 9999-9999");
	$("#cnpj").mask("999.999.99/9999-99");

	//Cadastra Empresa
	$('#cadEmpresa').on('click', function(){
		//Armazena dados do formulário em variaveis
		var nomeEmpresa 			= $('#nomeEmpresa').val();
		var nomeContatoResponsavel	= $('#nomeContatoResponsavel').val();
		var telContatoResponsavel	= $('#telContatoResponsavel').val();
		var emailContatoResponsavel	= $('#emailContatoResponsavel').val();
		var cnpj 					= $('#cnpj').val();
		var razaoSocial				= $('#razaoSocial').val();
		var endereco				= $('#endereco').val();
		var observacoes				= $('#observacoes').val();
		
		//Envia formulário
		$.ajax({
			type: 'POST',
			url: 'mod_telefonia/ajax/cadEmpresa.php',
			data: {
				nomeEmpresa: nomeEmpresa,
				nomeContatoResponsavel: nomeContatoResponsavel,
				telContatoResponsavel: telContatoResponsavel,
				emailContatoResponsavel: emailContatoResponsavel,
				cnpj: cnpj,
				razaoSocial: razaoSocial,
				endereco: endereco,
				observacoes: observacoes
			},
			success: function (data){
				alert(data);
			}
		})
	})
})