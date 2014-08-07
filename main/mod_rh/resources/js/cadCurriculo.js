$(document).ready(function(){

	//Esconde etapas
	$('#etapa02').hide();

	//Carrega etapa
	carregaEtapa('');

	function carregaEtapa(etapa){
		
		if(etapa == 1 || etapa == ''){
			$('.breadcrumb').append('<li class = "dadosPessoais_on"> </li>');
			$('.breadcrumb').append('<li class = "documentos"> </li>');
			$('.breadcrumb').append('<li class = "infosGerais"> </li>');
			$('.breadcrumb').append('<li class = "caracteristicas"> </li>');
			$('.breadcrumb').append('<li class = "dadosBancarios"> </li>');
		} else if(etapa == 2){
			$('.breadcrumb').empty();
			$('.breadcrumb').append('<li class = "dadosPessoais_old"> </li>');
			$('.breadcrumb').append('<li class = "documentos_on"> </li>');
			$('.breadcrumb').append('<li class = "infosGerais"> </li>');
			$('.breadcrumb').append('<li class = "caracteristicas"> </li>');
			$('.breadcrumb').append('<li class = "dadosBancarios"> </li>');
		}
	}


	//Carrega segunda etapa
	$('#proximaEtapa_2').on('click', function(){
		//Esconde primera etapa
		$('#etapa1').hide();

		$('#etapa02').show();

		//Verifica em qual etapa o usuario esta
		$('#etapa').val('2');
		var etapa = $('#etapa').val();

		//Carrega etapa
		carregaEtapa(etapa);
	})


})