<?php
	include("../../../conf/conn.php");

	$valor = $_POST['valor'];

	//Carrega dados
	$sql = $pdo->prepare("Select * From ipsum_usuarioslinhamoveis Where nome like :termo");

	$sql->execute(array(":termo" => "%" . $valor . "%"));

	$arr = array();
	$i = 0;

	while($usuarios = $sql->fetch(PDO::FETCH_OBJ)){
		$arr[$i] = $usuarios->nome;
		$i++;
	}

	echo json_encode ($arr);
?>