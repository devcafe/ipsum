<?php
	include("../../../conf/conn.php");
	
	//Faz update do usuário
	$sql = $pdo->prepare("
		Update 
			ipsum_usuarios
		Set 
			`nome` = ?
			,`sobrenome` = ?
			,`email` = ?
			,`departamento` = ?
			,`empresa` = ?
			,`cnpj` = ?
			,`usuario` = ?
			,`senha` = ?
			,`acessos` = ?
		Where	
			`id` = ?
	");

	//Recebe dados e atribui valores em array
	$i = 0;

	foreach($_POST as $res){
		$dados[$i] = $res;
		$i++;
	}
	var_dump($dados);

	$sql->execute(array($dados[1], $dados[2], $dados[3], $dados[4], $dados[5], $dados[6], $dados[7], sha1($dados[8]), $dados[9], $dados[0]));

	$msg = "Cadastro alterado com sucesso.";

	//Fecha conexão
	$pdo = null;

?>