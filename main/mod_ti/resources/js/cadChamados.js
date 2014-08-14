$(document).ready(function(){

	$('#solicitante').attr('disabled', 'true');

	//Envia formulário ao clicar no botão
	$('#cadChamado').on('click', function(){

		//Dados do formulário
		var dados = $('#formCadChamado').serialize();

		$('input[disabled]').each( function() {
			dados = dados + '&' + $(this).attr('name') + '=' + $(this).val();
		});

		//Envia formulário
		$.ajax({
			type: 'POST',
			url: 'mod_ti/ajax/cadChamado.php',
			data: {
				dados: dados
			},
			success: function (data){
				alert(data);
				$('#breveDescricaoChamado').val('');
				$('#departamento').val('');
				$('#descricaoChamado').val('');
			}
		})
	});	
})