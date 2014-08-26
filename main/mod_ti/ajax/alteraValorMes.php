<?php
	include("../../../conf/conn.php");

	$idDespesa = $_POST['idDespesa'];
	$newContent = $_POST['newContent'];
	$month = $_POST['month'];

	$content = str_replace(",",".",str_replace(".","",$newContent));

	$sql = $pdo->prepare("
		Update 
			ipsum_tidespesas
		Set 
			$month = '$content'
		Where 
			idDespesa = $idDespesa
	");

	$sql->execute();	
?>