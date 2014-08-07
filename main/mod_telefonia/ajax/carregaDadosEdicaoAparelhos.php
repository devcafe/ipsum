<?php
	include("../../../conf/conn.php");

	$idAparelho = $_POST['idAparelho'];

	//Carrega dados
	$sql = $pdo->prepare("
		Select *
		From ipsum_linhasmoveisaparelhos a 
		Inner Join ipsum_linhasmoveisaparelhosstatus b On (a.idAparelhoStatus = b.idAparelhoStatus)
		Where a.idAparelho = ?
	");

	$sql->execute(array($idAparelho));

	$aparelhos = $sql->fetch(PDO::FETCH_OBJ);

	echo json_encode ($aparelhos);
?>