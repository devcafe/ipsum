<?php
	include("../../../conf/conn.php");
	
	$sql = $pdo->prepare("Select * From ipsum_ticontacontabil");
	$sql->execute();

	$lista = '';

	while($resContaContabil = $sql->fetch(PDO::FETCH_OBJ)){
		$lista .= "<option value = ". $resContaContabil->idContaContabil .">". $resContaContabil->contaContabil ."</option>";
	}

	echo $lista;

	//Fecha conexão
	$pdo = null;

?>