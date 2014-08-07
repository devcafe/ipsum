<?php
	include("../../../conf/conn.php");
	
	//Faz update da empresa
	$sql = $pdo->prepare("
		Update 
			ipsum_empresas 
		Set 
			`nomeEmpresa` = ?
			,`nomeContatoResponsavel` = ?
			,`telContatoResponsavel` = ?
			,`emailContatoResponsavel` = ?
			,`cnpj` = ?
			,`razaoSocial` = ?
			,`endereco` = ?
			,`observacoes` = ?
		Where	
			`idEmpresa` = ?
	");

	//Recebe dados e atribui valores em array
	$i = 0;

	foreach($_POST as $res){
		$dados[$i] = $res;
		$i++;
	}

	$sql->execute(array($dados[1], $dados[2], $dados[3], $dados[4], $dados[5], $dados[6], $dados[7], $dados[8], $dados[0]));

	$msg = "Empresa alterada com sucesso.";

	//Fecha conexão
	$pdo = null;

?>