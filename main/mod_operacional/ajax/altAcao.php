<?php
	include("../../../conf/conn.php");

	/*$sql = $pdo->prepare("
		Update ipsum_operacionalacao
		Values(
			:idAcao,
			:nomeAcao,
			:users
		)
	");

	$sql->execute(array(":idAcao" => '',":nomeAcao" => $_POST['nomeAcao'], ":users" => $_POST['itens'] ));

	$msg = "Ação cadastrada com sucesso";*/
echo $_POST['itens'];
?>