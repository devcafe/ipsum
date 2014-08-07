<?php
	include("../../../conf/conn.php");

	//Recebe dados e atribui valores em array
	$i = 0;

	foreach($_POST as $res){
		$dados[$i] = $res;
		$i++;
	}

	//Verifica se o usuário já existe no banco
	$check = $pdo->prepare("
		Select cpf From ipsum_usuarioslinhamoveis Where cpf = ?
	");

	$check->execute(array($dados[5]));

	$res = $check->rowCount();

	if($dados[5] == ''){
		$msg = "Favor informar o CPF.";
	} else if($res <= 0){
		
		//Querie para inserir dados no banco
		$sql01 = $pdo->prepare("
			INSERT INTO `ipsum_usuarioslinhamoveis`(`idUsuarioMovel`, `nome`, `telefone`, `celular`, `endereco`, rg, profissao, `cpf`, `observacoes`)
			Values (?, ?, ?, ?, ?, ?, ?, ?, ?)");

		//Executa consulta e passa parâmetros (insere linha)
		$sql01->execute(array('', $dados[0], $dados[1], $dados[2], $dados[5], $dados[3], $dados[4], $dados[5], $dados[6]));

		$msg = "Usuário cadastrado com sucesso.";

	} else {
		$msg = "Esse usuário já foi cadastrado.";
	}

	echo $msg;

	//Fecha conexão
	$pdo = null;

?>