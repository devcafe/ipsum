<?php
	include("../../../conf/conn.php");
	
	//Dados do formulário
	$contaContabil = $_POST['contaContabil'];

	//Insere conta contabil
	$sql = $pdo->prepare("	Insert into `ipsum_ticontacontabil` (`idContaContabil`, `contaContabil`)
							Values (?, ?) ");
	$sql->execute(array('', $contaContabil));

	if($sql){
		$msg = "Conta contabil cadastrada com sucesso.";
	} else {
		$msg = "Falha ao cadastrar conta contabil.";
	}

	echo $msg;

	//Fecha conexão
	$pdo = null;

?>