<?php
	include("../../../conf/conn.php");

	$itens = $_POST['itens'];
	$inQuery = implode(',', array_fill(0, count($itens), '?'));

	if($itens == ''){
		$msg = 'Favor selecione ao menos um item.';
	} else {
		$sql = $pdo->prepare("
			Delete From 
				ipsum_ticontacontabil
			Where
				idContaContabil in ($inQuery)
		");

		//Para cada id é adicionado um parametro
		foreach ($itens as $k => $item)
   			$sql->bindValue(($k+1), $item);

		$sql->execute();

		$msg = 'Itens excluídos com sucesso.';
	}

	//Como retorno envia mensagem
	echo $msg;
?>