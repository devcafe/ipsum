<?php
	include("../../../conf/conn.php");
	include("../../../actions/security.php");

	$idRoteiro = $_POST['idRoteiro'];	
	$nomeRoteiro = $_POST['nomeRoteiro'];
	$nomeAcao = $_POST['nomeAcao'];
	$matricula = $_POST['matricula'];
	$lojasItens = $_POST['lojasItens'];
	$dataCadastro = date('d/m/Y');
	$idUsuarioCad = $_SESSION['idUsuario'];

	if($idRoteiro == "null"){
	// verifica quantos registro tem ordenado por idROteiro e gera um idoteiro
		$sqlCount = $pdo->prepare('select max(idRoteiro) as idRoteiro from ipsum_operacionalroteiros');
		$sqlCount->execute();	
		$idRoteiro = $sqlCount->fetch(PDO::FETCH_OBJ);
		$idRoteiro = $idRoteiro->idRoteiro + 1;
	}else{
		//apaga as lojas do banco
		$sqlDelet = $pdo->prepare('Delete From ipsum_operacionalroteiros where idRoteiro = ?');
		$sqlDelet->execute(array($idRoteiro));		
	}
	
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