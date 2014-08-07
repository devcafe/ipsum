<?php
	include("../../../conf/conn.php");

	$idUsuario = $_POST['idUsuario'];

	//Carrega dados
	$sql = $pdo->prepare("Select * From ipsum_usuarioslinhamoveis Where idUsuarioMovel = ?");

	$sql->execute(array($idUsuario));

	$usuarios = $sql->fetch(PDO::FETCH_OBJ);

	echo json_encode ($usuarios);
?>