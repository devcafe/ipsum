<?php
	include("../../../conf/conn.php");

	$idEmpresa = $_POST['idEmpresa'];

	//Carrega dados
	$sql = $pdo->prepare("Select * From ipsum_linhasmoveisempresas Where idEmpresa = ?");

	$sql->execute(array($idEmpresa));

	$empresas = $sql->fetch(PDO::FETCH_OBJ);

	echo json_encode ($empresas);
?>