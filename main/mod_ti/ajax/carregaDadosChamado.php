<?php
	include("../../../conf/conn.php");
	include("../../../actions/security.php"); 
	
	$idChamado = $_POST['idChamado'];

	$sql = $pdo->prepare("
		Select prioridade, status From ipsum_tichamados Where idChamado = ?
	");

	$sql->execute(array($idChamado));

	$res = $sql->fetch(PDO::FETCH_OBJ);

	echo json_encode ($res);

	//Fecha conexão
	$pdo = null;

?>