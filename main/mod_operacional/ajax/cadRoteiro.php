<?php
	include("../../../conf/conn.php");
	include("../../../actions/security.php");

	$nomeRoteiro = $_POST['nomeRoteiro'];
	$nomeAcao = $_POST['nomeAcao'];
	$matricula = $_POST['matricula'];
	$lojasItens = $_POST['lojasItens'];
	$dataCadastro = date('d/m/Y');
	$idUsuarioCad = $_SESSION['idUsuario'];

	// verifica quantos registro tem ordenado por idROteiro e gera um idoteiro
	$sqlCount = $pdo->prepare('select * from ipsum_operacionalroteiros group by idRoteiro');
	$sqlCount->execute();
	$idRoteiro = $sqlCount->rowCount();
	$idRoteiro = $idRoteiro + 1;
	
	
	//grava no banco 
	foreach ($lojasItens as $loja) {
		
		 $sqlInsert = $pdo->prepare(
			'INSERT INTO `ipsum`.`ipsum_operacionalroteiros` 
				(
				`idRoteiro`, `nomeRoteiro`, `idAcao`, `idColaborador`, `dataCadastro`, `idUsuarioCad`, `idLoja`, `seg`, `ter`, `qua`, `qui`, `sex`, `sab`, `dom`
				) VALUES (
					?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
				)'
			);
		$sqlInsert->execute(array($idRoteiro, $nomeRoteiro, $nomeAcao, $matricula, $dataCadastro, $idUsuarioCad, $loja['idLoja'], $loja['seg'], $loja['ter'], $loja['qua'], $loja['qui'], $loja['sex'], $loja['sab'], $loja['dom']));		
	}


?>