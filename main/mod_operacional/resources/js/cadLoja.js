$(document).ready(function(){

	//Esconde modal
	$('#bandeirasModal').hide();
	$('#cadBandeirasModal').hide();

	$("#numero").keypress(verificaNumero);
	$("#estabReceitaNumero").keypress(verificaNumero);
	$("#uf").keypress(verificaLetra);
	$("#estabReceitaUF").keypress(verificaLetra);

	//Mascara campos
	$("#cnpj").mask("99.999.999/9999-99");
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


	//Cadastrar loja
	$('#cadLojaBtn').on('click', function(){

		//Dados do formulário
		var dados = $('#formCadLoja').serialize();

		$('#formCadLoja input').each( function() {
			dados = dados + '&' + $(this).attr('name') + '=' + $(this).val();
		});
		

		if($('#numero').val() == '' || $('#numero').val() == 'S/N'){
			var answer = confirm("Atenção! O estabelecimento será cadastrado sem número");
			if(answer)
				$('#numero').val('S/N');
		} else {
			var answer = true;
		}

		if($('#estabReceitaNumero').val() == '' || $('#estabReceitaNumero').val() == 'S/N'){
			var answer2 = confirm("Atenção! O estabelecimento será cadastrado sem número da receita");
			if(answer2)
				$('#estabReceitaNumero').val('S/N');
		} else {
			var answer2 = true;
		}

		if(answer && answer2){
			//Envia formulário
			$.ajax({
				type: 'POST',
				url: 'mod_operacional/ajax/cadLoja.php',
				data: {
					dados: dados
				},
				success: function (data){
					alert(data);
					if(data == "Loja Cadastrada com Sucesso"){
						$('#formCadLoja')[0].reset();
						$('#cnpj').focus();
					} else {
						$('#cnpj').focus();
					}
				}
			})
		}
		
	})

	//Abre modal para selecionar bandeira
	$('#selectBandeira').on('click', function(){
		//Abre modal com dados da loja
		$( "#bandeirasModal" ).dialog({
			width: 600,
			show: {
		        effect: "blind",
		        duration: 500
	     	}
		});
	})

	//Abre modal para adicionar bandeira
	$('#addBandeira').on('click', function(){
		//Abre modal com dados da loja
		$( "#cadBandeirasModal" ).dialog({
			width: 600,
			show: {
		        effect: "blind",
		        duration: 500
	     	}
		});
	})

	//Consulta bandeira
	$('#searchBandeiraBtn').on('click', function(){
		carregaBandeiras();
	})

	/*$("#bandeiraSearch").keypress(function(event) {
	    if (event.which == 13) {
	    		carregaBandeiras();
	    		console.log("ok");
		    }
	})*/



	function carregaBandeiras(){
		$('#searchBandeiraResults').empty();

		var searchVal = $('#bandeiraSearch').val();
		var pag = $('#pagina').val();

		//Envia formulário
		$.ajax({
			type: 'POST',
			url: 'mod_operacional/ajax/carregaListaBandeiras.php',
			data: {
				searchVal: searchVal,
				pag: pag
			},
			success: function (data){
				$('#searchBandeiraResults').append(data);
			}
		})
	}

	//Muda de página
	$('#searchBandeiraResults').on('click', '.toPage', function(){

		//Verifica o novo id
		var newPage = $(this).attr('id');

		//Passa o novo id a um elemento hidden
		$('#pagina').val(newPage);

		//Chama a função para carregar proxima pagina
		carregaBandeiras();

	})

	$('#searchBandeiraResults').on('click', '#addBandeiraToList', function(){
		var selectedBandeiraId = $('input[name=estaBandeira]:checked', '#bandeirasForm').val();
		var selectedBandeiraNome = $('input[name=estaBandeira]:checked', '#bandeirasForm').next('label').html()

		$('#bandeira').val(selectedBandeiraNome);
		$('#idBandeiraHidden').val(selectedBandeiraId);

		//Destroy modal
      	$('#bandeirasModal').dialog("destroy");
	})


	//Tratamento dos campos para não aceitar acentuação
	$('input[type=text]').on('keypress', function(e,args){
		if (document.all){ var evt=event.keyCode; } //Caso seja IE
		else{ var evt = e.charCode; }	//Do contrário deve ser Mozilla

		var valid_chars = ' 0123456789abcdefghijlmnopqrstuvxzwykABCDEFGHIJLMNOPQRSTUVXZWYK-_'+args; //Lista de teclas permitidas

		var chr= String.fromCharCode(evt);	//Pega a tecla digitada

		if (valid_chars.indexOf(chr)>-1 ){ return true; }	//Verifica se a tecla digitada esta na lista

		//Para permitir teclas como <BACKSPACE>
		if (valid_chars.indexOf(chr)>-1 || evt < 9){return true;}	//Verifica se a tecla digitada esta na lista
			return false;	//Caso contrário nega
	})

	function verificaNumero(e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    }

	  //só aceita letras
	function verificaLetra(e){
	     var tecla = (window.event) ? event.keyCode : e.which;

	     if((tecla > 65 && tecla < 90)
	         ||(tecla > 97 && tecla < 122))
	               return true;
	     else{
	          if (tecla != 8) return false;
	          else return true;
	     }
	}

	//Cadastra bandeira
	$('#cadBandeiraBtn').on('click', function(){
		var bandeira = $('#cadBandeiraNome').val();

		$.ajax({
			type: 'POST',
			url: 'mod_operacional/ajax/cadBandeiras.php',
			data: {
				bandeira: bandeira
			},
			success: function (data){
				//Destroy modal
      			//$('#cadBandeirasModal').dialog("destroy");

				alert(data);
			}
		})
	})

})