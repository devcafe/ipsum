$(document).ready(function(){

	//Carrega lista de linhas moveis na inicialização
	carregaLista();

	//Função para alterar "+" e "-" da lista
	function alternaBotoes(classe, ref){
		//Variavel de controle para esconder ou mostrar os subitens
		var controle;

		//Se a classe for "plus" altera para "minus"
		if(classe == 'plus'){
			$('.' + ref).removeClass('plus');
			$('.' + ref).addClass('minus');

			controle = 0;
		} else {
			$('.' + ref).removeClass('minus');
			$('.' + ref).addClass('plus');

			controle = 1;
		}

		return controle;
	}

	//Função para retornar lista de linhas moveis
	function carregaLista(){
		$.ajax({
			type: 'POST',
			url: 'mod_telefonia/ajax/carregaListaHist.php',
			success: function (data){
				//Carrega lista em div
				$('#listaHistorico').append(data);
			}
		})
	}

	$('#listaHistorico').on('click', '#expand', function(){
		//Pega classe do botão que foi clicado como referência
		var ref = $(this).attr('class').split(' ')[0];

		//Pega subitem que será expandido/retraido
		var sub = $('#' + ref).attr('id');

		//Pega classe para alternar imagens "+" e "-"
		var classe = $(this).attr('class').split(' ')[1];

		//Se a classe do botão clicado for igual ao id encontrado expande apenas subitens com o id selecionado
		if(ref == sub){
			//Chama função e dependendo do retorno exibe ou retrai os subitens
			if(alternaBotoes(classe, ref) == 0){
				$('#' + ref).css('display', 'block');
			} else {
				$('#' + ref).css('display', 'none');
			}
		}
	})

})