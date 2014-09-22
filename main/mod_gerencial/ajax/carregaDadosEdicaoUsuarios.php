<?php
	include("../../../conf/conn.php");

	$id = $_POST['id'];

	//Carrega dados
	$sql = $pdo->prepare("Select id, usuario, nome, sobrenome, email, departamento, empresa, cnpj, acessos From ipsum_usuarios Where id = ?");

	$sql->execute(array($id));

	$usuarios = $sql->fetch(PDO::FETCH_OBJ);

	echo json_encode ($usuarios);

	$pdo = null;
?>