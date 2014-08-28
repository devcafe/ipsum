$(document).ready(function(){

	var conteudo = $('#conteudoInner');

	/***************************************/
	// Modulo gerencial 				   
	/***************************************/
	
	//Abre página para cadastro de usuário
	$('#cadUsuario').click(function(){
		conteudo.load( "mod_gerencial/cadUsuario.php" );
	});

	//Abre página para gerenciar usuários
	$('#gerUsuario').click(function(){
		conteudo.load( "mod_gerencial/gerUsuario.php" );
	});

	/***************************************/
	// Modulo telefonia 				   
	/***************************************/
	//Abre página para cadastrar linha movel
	$('#cadLinhaMovel').click(function(){
		conteudo.load( "mod_telefonia/cadLinhaMovel.php" );
	});

	//Abre página para gerenciar linhas moveis
	$('#gerLinhaMovel').click(function(){
		conteudo.load( "mod_telefonia/gerLinhaMovel.php" );
	});

	//Abre página para visualizar histórico
	$('#histLinhaMovel').click(function(){
		conteudo.load( "mod_telefonia/histLinhaMovel.php" );
	});
	
	//Abre página para cadastrar empresas
	$('#cadEmpresas').click(function(){
		conteudo.load( "mod_telefonia/cadEmpresas.php" );
	});

	//Abre página para gerenciar empresas
	$('#gerEmpresas').click(function(){
		conteudo.load( "mod_telefonia/gerEmpresas.php" );
	});
	
	//Abre página para cadastrar usuários
	$('#cadUsuarios').click(function(){
		conteudo.load( "mod_telefonia/cadUsuarios.php" );
	});

	//Abre página para gerenciar usuários
	$('#gerUsuarios').click(function(){
		conteudo.load( "mod_telefonia/gerUsuarios.php" );
	});

	//Abre página para cadastrar aparelhos
	$('#cadAparelhos').click(function(){
		conteudo.load( "mod_telefonia/cadAparelhos.php" );
	});

	//Abre página para gerenciar aparelhos
	$('#gerAparelhos').click(function(){
		conteudo.load( "mod_telefonia/gerAparelhos.php" );
	});

	/***************************************/
	// Modulo T.I 				   
	/***************************************/
	//Abre página para abrir chamado
	$('#cadChamados').click(function(){
		conteudo.load( "mod_ti/cadChamados.php" );
	});

	// Acrir cadChamados a partir de gerChamados
	$('#conteudoInner').on('click', '#gerCadChamado', function(){
		conteudo.load( "mod_ti/cadChamados.php" );
	});

	//Abre página para gerenciar chamados
	$('#gerChamados').click(function(){
		conteudo.load( "mod_ti/gerChamados.php" );
	});

	//Abre página para gerenciar despesas
	$('#gerDespesas').click(function(){
		conteudo.load( "mod_ti/gerDespesas.php" );
	});

	/***************************************/
	// Modulo FTP				   
	/***************************************/
	//Abre página para gerenciar FTP
	$('#meuFTP').click(function(){
		conteudo.load( "mod_ftp/meuFTP.php" );
	});

	/***************************************/
	// Modulo RH				   
	/***************************************/
	//Abre página para cadastrar curriculo
	$('#cadCVRH').click(function(){
		conteudo.load( "mod_rh/cadCurriculo.php" );
	});


	/***************************************/
	// Modulo Operacional				   
	/***************************************/
	//Abre página para cadastrar lojas
	$('#cadLojaOpe').click(function(){
		conteudo.load( "mod_operacional/cadLoja.php" );
	});

	//Abre página para consultar lojas
	$('#listLojas').click(function(){
		conteudo.load( "mod_operacional/listLojas.php" );
	});

	//Abre página para gerenciar lojas
	$('#gerLojaOpe').click(function(){
		conteudo.load( "mod_operacional/gerLojas.php" );
	});	

})