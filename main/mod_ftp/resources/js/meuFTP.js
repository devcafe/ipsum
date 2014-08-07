$(document).ready(function(){

	//Esconde modals
	$( "#addFolderModal" ).hide();
	$('#uploadFileModal').hide();

	//Carrega arquivos e pastas na inicialização
	loadFilesList();

	//Abre modal para criar uma nova pasta
	$('#addFolderBtn').on('click', function(){
            //Pega local onde o usuário pretende criar a pasta
            $('#whereIamFolder').val();

            $( "#addFolderModal" ).dialog({
                width: 600,
                show: {
                effect: "blind",
                duration: 500
            }
            });
	});

	//Grava no banco o caminho da pasta e cria nova pasta no servidor
	$('#addNewFolder').on('click', function(){
            //Nome da pasta
            var folderName = $('#folderName').val();

            //Usuario ID
            var idUser = $('#idHiddenUsuario').val();

            //Onde a pasta será criada
            var whereIamFolder = $('#whereIamFolder').val();

            //Grava no banco e cria nova pasta
            $.ajax({
                type: 'POST',
                data: { 
                    idUser: idUser,
                    folderName: folderName,
                    whereIamFolder: whereIamFolder
                },
                url: 'mod_ftp/ajax/cadPasta.php',
                success: function (data){
                    alert(data);

                    //Recarrega lista
                    reloadFilesList();

                    //Destroi modal
                    $( "#addFolderModal" ).dialog('destroy');
                }
            })
	});

	//Recarrega lista
	function reloadFilesList(){
		//Verifica em que pasta o usuario está
		var whereIamFolder = $('#whereIamFolder').val();

		//Usuario ID
		var idUser = $('#idHiddenUsuario').val();

		//Pasta raiz
		var raiz = $('#raiz').val();

		//Dependendo da pasta que o usuário está, será carregado os arquivos e subpastas
		//da pasta selecionada
		$.ajax({
			type: 'POST',
			data: { 
				op: 'reload',
				idUser: idUser,
				raiz: raiz,
				whereIamFolder: whereIamFolder
			},
			url: 'mod_ftp/ajax/carregaPastasArquivos.php',
			success: function (data){
				//Limpa arquivos e pastas
				$('.fileArea').empty();

				//Carrega lista
				$('.fileArea').append(data);
			}
		})
	}

	//Carrega lista de pastas e arquivos
	function loadFilesList(){
		//Verifica em que pasta o usuario está
		var whereIamFolder = $('#whereIamFolder').val();

		//Usuario ID
		var idUser = $('#idHiddenUsuario').val();

		//Pasta raiz
		var raiz = $('#raiz').val();

		//Dependendo da pasta que o usuário está, será carregado os arquivos e subpastas
		//da pasta selecionada
		$.ajax({
			type: 'POST',
			data: { 
				op: '',
				idUser: idUser,
				raiz: raiz,
				whereIamFolder: whereIamFolder
			},
			url: 'mod_ftp/ajax/carregaPastasArquivos.php',
			success: function (data){
				//Limpa arquivos e pastas
				$('.fileArea').empty();

				//Carrega lista
				$('.fileArea').append(data);
			}
		})
	}


	//Ao clicar em uma pasta, modifica a pasta atual
	$('.fileArea').on('click', '.open', function(){	

		//Pasta raiz
		var raiz = $('#raiz').val();

		//Pega nome da pasta que o usuário clicou
		var pasta = $(this).html();
		var whereIamFolder = $('#whereIamFolder').val();

		var pastaAcessada = '';

		var checkOS = raiz.split('\\')[1];

		//Verifica se o sistema utiliza "\" ou "/" como separador
		if(checkOS == ''){
			//Modifica elemento que contém a pasta atual
			pastaAcessada = whereIamFolder + pasta + '\\';	
		} else {
			//Modifica elemento que contém a pasta atual
			pastaAcessada = whereIamFolder + pasta + '/';
		}
	

		$('#whereIamFolder').val(pastaAcessada);

		//Acessa pasta que o usuário clicou
		$.ajax({
			type: 'POST',
			url: 'mod_ftp/ajax/carregaPastasArquivos.php',
			data:{
				raiz: raiz,
				op: 'click',
				pastaAcessada: pastaAcessada
			},
			success: function(data){
				//Limpa arquivos e pastas
				$('.fileArea').empty();

				//Carrega lista
				$('.fileArea').append(data);
			}
		})
	})

        //Apagar arquivo
        $('#btnDelete').on('click', function(){
            var i = 0;
            var itens = [];
            
            var whereIamFolder = $('#whereIamFolder').val();
            
            //Pega o id de todos os itens selecionados e guarda em um array
            $('.fileArea ul li input[type=checkbox]:checked').each(function(){
                itens[i] = $(this).val();
                i++;
            });

            //Solicita confirma��o antes de apagar
            var answer = confirm("Tem certeza que deseja apagar o(s) iten(s) selecionado(s)?");

            if(answer){
                $.ajax({
                    type: 'POST',
                    url: 'mod_ftp/ajax/deletaPastasArquivos.php',
                    data:{
                        whereIamFolder: whereIamFolder,
                        itens: itens
                    },
                    success: function(data){
                        alert(data);

						//Recarrega lista de arquivos
						reloadFilesList();
                    }
                });
            }
        });

    //Abre tela para fazer upload de arquivo
    $('#btnUploadFile').on('click', function(){
    	//Abre modal com formulario de upload
		$( "#uploadFileModal" ).dialog({
			width: 600,
			show: {
		        effect: "blind",
		        duration: 500
	     	}
		});
    })

	//Faz upload de arquivos        
	$('#uploadFileSubmit').click(function() {
		//Reseta campo que exibe uma imagem do arquivo
		//$("#viewImage").html('');

		//Exibe loader enquanto a imagem � carregada
		//$("#viewImage").html('<img src="img/loading.gif" />');
		$(".uploadFileForm").ajaxForm({
			target: '#viewImage'
		}).submit();

		//Recarrega lista de arquivos
		reloadFilesList();
	});

});