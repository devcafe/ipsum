<?php 
	include("../../../conf/conn.php");

	$bandeira = trim($_POST['bandeira']);

	$check = $pdo->prepare("
		Select
			bandeira
		From
			ipsum_operacionalbandeiras
		Where
			bandeira = ?
	");

	$check->execute(array($bandeira));
	$rowCount = $check->rowCount();

	if($bandeira == ''){
		$msg = 'Favor informar o nome da bandeira.';
	} elseif($rowCount > 0) {
		$msg = "Esta bandeira já foi cadastrada";
	} else {
		$sql = $pdo->prepare("Insert Into ipsum_operacionalbandeiras Values (?, ?)");
		$sql->execute(array('', $bandeira));

		$msg = 'Bandeira cadastrada com sucesso';
	}

	echo $msg;
?>
