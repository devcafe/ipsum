<?php
	include("../../../conf/conn.php");

	$idLinha = $_POST['idLinha'];

	//Carrega dados
	$sql = $pdo->prepare("Select * From ipsum_linhasmoveis Where idLinha = ?");

	$sql->execute(array($idLinha));

	$linhasMoveis = $sql->fetch(PDO::FETCH_OBJ);

	echo json_encode ($linhasMoveis);
?>