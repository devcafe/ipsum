$(document).ready(function(){

	//Mascara campos
	$("#cnpj").mask("999.999.99/9999-99");
	$("#cep").mask("99999-999");
	$('#estabReceitaCEP').mask("99999-999");
	$('#estabTel01').mask("(99) 9999-9999");
	$('#estabTel02').mask("(99) 9999-9999");

	$( "#estabReceitaAberturaData" ).datepicker();
	$( "#estabReceitaSituacaoData" ).datepicker();
	$( "#dataFechamento" ).datepicker();

	//Função para limpar campos antes da consulta do CEP
	function cleanFields(){
		$('#rua').val('');
		$('#bairro').val('');
		$('#cidade').val('');
		$('#uf').val('');
	}


	//Função para limpar campos antes da consulta do CEP (dados receita)
	function cleanFieldsReceita(){
		$('#estabReceitaEndereco').val('');
		$('#estabReceitaBairro').val('');
		$('#estabReceitaCidade').val('');
		$('#estabReceitaUF').val('');
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


	/* Executa a requisição quando o campo CEP da receita perder o foco */
	$('#estabReceitaCEP').focusout(function(){

		cleanFieldsReceita();

		$.ajax({
			url: 'mod_operacional/ajax/carregaDadosCEP.php',
			type : 'POST', 
			data: 'cep=' + $('#estabReceitaCEP').val(),
			dataType: 'json',
			success: function(data){
				if(data.sucesso == 1){
					$('#estabReceitaEndereco').val(data.rua);
					$('#estabReceitaBairro').val(data.bairro);
					$('#estabReceitaCidade').val(data.cidade);
					$('#estabReceitaUF').val(data.estado);

					$('#estabReceitaNumero').focus();
				}
			}
		});   
		return false;    
	})


})