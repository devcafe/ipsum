<?php 
	include("../../../conf/conn.php");

	$bandeira = $_POST['bandeira'];

	if($bandeira == ''){
		$msg = 'Favor informar o nome da bandeira.';
	} else {
		$sql = $pdo->prepare("Insert Into ipsum_operacionalbandeiras Values (?, ?)");
		$sql->execute(array('', $bandeira));

		$msg = 'Bandeira cadastrada com sucesso';
	}

	echo $msg;
?>
