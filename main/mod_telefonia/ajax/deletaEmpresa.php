<?php
	include("../../../conf/conn.php");

	$ids = $_POST['itens'];
	$inQuery = implode(',', array_fill(0, count($ids), '?'));

	if($ids == ''){
		$msg = 'Favor selecione ao menos um item.';
	} else {
		$sql = $pdo->prepare("
			Delete From 
				ipsum_linhasmoveisempresas
			Where
				idEmpresa in ($inQuery)
		");

		//Para cada id é adicionado um parametro
		foreach ($ids as $k => $id)
   			$sql->bindValue(($k+1), $id);

		$sql->execute();

		$msg = 'Itens excluídos com sucesso.';
	}

	//Como retorno envia mensagem
	echo $msg;
?>