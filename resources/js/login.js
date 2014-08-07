$(document).ready(function(){

	//Armazena campos em variaveis
	var loginError = $('.loginMsg');

	//Função para limpar campos
	function clearFields(){
		loginError.empty();
	}

	//Submit do login ao pressionar enter
	$("input").keypress(function(event) {
	    if (event.which == 13) {
	        event.preventDefault();

	        //Recebe dados do formulário
			var usuario = $('#usuario').val();
			var senha = $('#senha').val();
			
			//Envia dados para página de logon
			$.ajax({
				type: 'POST',
				url: 'actions/logon.php',
				data: {
					usuario: usuario,
					senha: senha
				},
				success: function(data){
					if(data == 1){
						clearFields();
						loginError.append('Falha ao autenticar.');
						loginError.css('background', '#FF3333');
					} else {
						clearFields();
						window.location.href = "main/home.php";
					}
				}
			});
    	}
    });
	
	//Dispara evento ao clicar no botão para logar
	$('#loginBtn').on('click', function(){
		//Recebe dados do formulário
		var usuario = $('#usuario').val();
		var senha = $('#senha').val();
		
		//Envia dados para página de logon
		$.ajax({
			type: 'POST',
			url: 'actions/logon.php',
			data: {
				usuario: usuario,
				senha: senha
			},
			success: function(data){
				if(data == 1){
					clearFields();
					loginError.append('Falha ao autenticar.');
					loginError.css('background', '#FF3333');
				} else {
					clearFields();
					window.location.href = "main/home.php";
				}
			}
		});
	});
});