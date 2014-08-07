<?php
	include("../../../conf/conn.php");
	
	//Dados do formulário
	$dados = $_POST['dados'];

	parse_str($dados); 		

	//Data para abertura do chamado
	$dataAbertura = date("d/m/y");

	//Insere chamado
	$sql = $pdo->prepare("	Insert into `ipsum_tichamados` (`idChamado`, `breveDescricaoChamado`, `solicitante`, `departamento`, `prioridade`, `idUsuarioAbertura`, `status`, `descricaoChamado`, `dataAbertura`)
							Values (?, ?, ?, ?, ?, ?, ?, ?, ?) ");
	$sql->execute(array('', $breveDescricaoChamado, $solicitante, $departamento, $prioridade, $idUsuarioAbertura, $status, $descricaoChamado, $dataAbertura));

	if($sql){
		$msg = "Chamado cadastrado com sucesso.";
	} else {
		$msg = "Falha ao registrar chamado.";
	}

	echo $msg;

	//Fecha conexão
	$pdo = null;

?>