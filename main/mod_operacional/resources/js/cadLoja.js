$(document).ready(function(){

	//Função para limpar campos antes da consulta do CEP
	function cleanFields(){
		$('#rua').val('');
		$('#bairro').val('');
		$('#cidade').val('');
		$('#uf').val('');
	}

	/* Executa a requisição quando o campo CEP perder o foco */
	$('#cep').focusout(function(){

		cleanFields();

		$.ajax({
			url: 'mod_operacional/ajax/carregaDadosCEP.php',
			type : 'POST', 
			data: 'cep=' + $('#cep').val(),
			dataType: 'json',
			success: function(data){
				if(data.sucesso == 1){
					$('#rua').val(data.rua);
					$('#bairro').val(data.bairro);
					$('#cidade').val(data.cidade);
					$('#uf').val(data.estado);

					$('#numero').focus();
				}
			}
		});   
		return false;    
	})


})