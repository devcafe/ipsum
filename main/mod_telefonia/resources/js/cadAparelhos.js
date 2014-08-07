$(document).ready(function(){

	//Esconde campos do formulário
	$('#dataEnvioManutencao').hide();
	$('#dataRecebimentoManutencao').hide();
	$('label[name="dataEnvioManutencao"]').hide();
	$('label[name="dataRecebimentoManutencao"]').hide();

	//Mostra campos de data caso o aparelho esteja em manutenção
	$('#statusAparelho').on('change', function(){
		if ($(this).val() != 4){
			$('#dataEnvioManutencao').hide();
			$('#dataRecebimentoManutencao').hide();
			$('label[name="dataEnvioManutencao"]').hide();
			$('label[name="dataRecebimentoManutencao"]').hide();
		} else {
			$('#dataEnvioManutencao').show();
			$('#dataRecebimentoManutencao').show();
			$('label[name="dataEnvioManutencao"]').show();
			$('label[name="dataRecebimentoManutencao"]').show();
		}
	})

	//Envia formulário ao clicar no botão
	$('#cadAparelho').on('click', function(){

		//Armazena dados do formulário em variaveis
		var marcaAparelho 				= $('#marcaAparelho').val();
		var modeloAparelho				= $('#modeloAparelho').val();
		var imeiAparelho				= $('#imeiAparelho').val();
		var tipoAparelho				= $('#tipoAparelho').val();
		var statusAparelho				= $('#statusAparelho').val();
		var dataEnvioManutencao			= $('#dataEnvioManutencao').val();
		var acessorios					= $('#acessorios').val();
		var observacoes					= $('#observacoes').val();

		//Envia formulário
		$.ajax({
			type: 'POST',
			url: 'mod_telefonia/ajax/cadAparelho.php',
			data: {
				marcaAparelho: marcaAparelho,
				modeloAparelho: modeloAparelho,
				imeiAparelho: imeiAparelho,
				tipoAparelho: tipoAparelho,
				statusAparelho: statusAparelho,
				dataEnvioManutencao: dataEnvioManutencao,
				acessorios: acessorios,				
				observacoes: observacoes
			},
			success: function (data){
				alert(data);
			}
		})
	});	
})