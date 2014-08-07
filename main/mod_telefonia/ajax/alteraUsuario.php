<?php
	include("../../../conf/conn.php");

	//Recebe dados e atribui valores em array
	$i = 0;

	foreach($_POST as $res){
		$dados[$i] = $res;
		$i++;
	}

	//Verifica se existe mais de uma ocorrencia para o mesmo CPF no banco
	$check = $pdo->prepare("
		Select cpf From ipsum_usuarioslinhamoveis Where cpf = ? And idUsuarioMovel <> ?
	");

	$check->execute(array($dados[5], $dados[0]));

	$count = $check->rowCount();

	if($count >= 2 || $count == 1){
		$msg = "Este CPF já esta sendo usado por outro usuario.";
	} else {		
		//Faz update do usuario
		$sql = $pdo->prepare("
			Update 
				ipsum_usuarioslinhamoveis 
			Set 
				`nome` = ?
				,`telefone` = ?
				,`celular` = ?
				,`endereco` = ?
				,`rg` = ?
				,`profissao` = ?
				,`cpf` = ?
				,`observacoes` = ?
			Where	
				`idUsuarioMovel` = ?
		");

		$sql->execute(array($dados[1], $dados[2], $dados[3], $dados[4], $dados[5], $dados[7], $dados[6], $dados[8], $dados[0]));

		$msg = "Usuário alterado com sucesso.";
	}	

	echo $msg;

	//Fecha conexão
	$pdo = null;

?>