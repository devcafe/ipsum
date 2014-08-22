<?php 
	include("../../../conf/conn.php");

	$bandeira = $_POST['bandeira'];

	$sql = $pdo->prepare("Insert Into ipsum_operacionalbandeiras Values (?, ?)");
	$sql->execute(array('', $bandeira));

	if($sql)
		$msg = 'Bandeira cadastrada com sucesso';

	echo $msg;
?>
