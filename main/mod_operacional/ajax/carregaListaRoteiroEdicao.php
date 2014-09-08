<?php
	include("../../../conf/conn.php");

	//recebe o id do item selecionado para o select
	$idRoteiro = $_POST['idRoteiro'];

	$sql = $pdo->prepare("select * from ipsum_operacionalroteiros where idRoteiro = ?");
	$sql->execute(array($idRoteiro));
	$res = $sql->fetch(PDO::FETCH_OBJ);
	echo json_encode($res);

?>