<?php 

	include("../../../conf/conn.php");
	
	$idAcaoSelect = isset($_POST['idAcaoSelect']) ? $_POST['idAcaoSelect'] : '';

	//pesquisa no banco as ações
 	$sqlAcao = $pdo->prepare('select * from ipsum_operacionalacao');
 	$sqlAcao->execute();
 	$lista = "";
 	$lista .= '<select name = "nomeAcao" id = "nomeAcao">'; 		
	 	//faz um laço e gera os options para ser inserido no php	 	
	 	while ($acao = $sqlAcao->fetch(PDO::FETCH_OBJ)) {
	 		if($acao->idAcao == $idAcaoSelect){
	 		$lista .= "<option value = '" . $acao->idAcao . "' selected>" . $acao->nomeAcao . "</option>";	 			
	 		}
	 		$lista .= "<option value = '" . $acao->idAcao . "'>" . $acao->nomeAcao . "</option>";
	 	}
	 $lista .= "</select>";	

 	echo $lista;



?>