<?php
	include("../../../conf/conn.php");

	$idModulo = $_POST['idModulo'];

	$sql = $pdo->prepare("Select * From ipsum_modulositems Where idModulo = ?");
	$sql->execute(array($idModulo));

	$lista = '';

	while($res = $sql->fetch(PDO::FETCH_OBJ)){
		$lista .= '<li id = '. $res->idModulo . '_' .$res->idModuloItem .'>'. $res->nomeModuloItem . '</li>';
	}

	echo $lista;
?>