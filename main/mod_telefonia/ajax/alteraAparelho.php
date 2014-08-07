<?php
	include("../../../conf/conn.php");
	
	//Pega data atual
	$dataAtual = date('d/m/Y');

	//Recebe dados e atribui valores em array
	$i = 0;

	foreach($_POST as $res){
		$dados[$i] = $res;
		$i++;
	}

	//Faz update do aparelho
	$sql = $pdo->prepare("
		Update 
			ipsum_linhasmoveisaparelhos 
		Set 
			`marcaAparelho` = ?
			,`modeloAparelho` = ?
			,`imeiAParelho` = ?
			,`idAparelhoStatus` = ?
			,`dataEnvioManutencao` = ?
			,`acessorios` = ?
			,`observacoes` = ?
			,`dataAlteracao` = ?
		Where	
			`idAparelho` = ?
	");

	$sql->execute(array($dados[1], $dados[2], $dados[3], $dados[4], $dados[5], $dados[6], $dados[7], $dataAtual, $dados[0]));

	/************* Insere no histórico *************/
	//Verifica se o status do aparelho é diferente do que esta no histórico
	$aparelhoStatus = $pdo->prepare("
		SELECT `idAparelhoStatus` FROM `ipsum_linhasmoveishist` 
		WHERE idAparelho = ?
		Order By idHistLinha Desc Limit 1
	");
	$aparelhoStatus->execute(array($dados[0]));

	//Verifica se o aparelho já possui histórico
	$countAparelho = $aparelhoStatus->rowCount();

	$resAparelhoStatus = $aparelhoStatus->fetch(PDO::FETCH_OBJ);

	$msg = "Aparelho alterado com sucesso.";

	//Se o aparelho já possui histórico, salva, caso contrário, apenas será feito a alteração conforme update acima
	if($countAparelho > 0){
		//Aqui verifica se o status do aparelho mudou para inserir no historico
		if($resAparelhoStatus->idAparelhoStatus != $dados[4]){
			//Pega dados para inserir no histórico
			$getData = $pdo->prepare("
				Select a.idLinha, a.idEmpresa, a.idLinhaStatus, a.idUsuarioMovel
				From ipsum_linhasmoveis a
				Inner Join ipsum_linhasmoveisaparelhos b On (a.idAparelho = b.idAparelho)
				Inner Join ipsum_linhasmoveisempresas c On (a.`idEmpresa` = c.`idEmpresa`)
				Where
					b.checkedAparelho = 1
				And a.`idAparelho` = ?
			");

			$getData->execute(array($dados[0]));
			$resData = $getData->fetch(PDO::FETCH_OBJ);

			$toHist = $pdo->prepare("
				INSERT INTO `ipsum_linhasmoveishist`
					(`idHistLinha`, `idLinha`, `idAparelho`, `idEmpresa`, `idAparelhoStatus`, `idLinhaStatus`, `idUsuarioMovel`, `dataAlteracao`) 
				VALUES 
				(?, ?, ?, ?, ?, ?, ?, ?)
			");

			$toHist->execute(array('', $resData->idLinha, $dados[0], $resData->idEmpresa, $dados[4], $resData->idLinhaStatus, $resData->idUsuarioMovel, $dataAtual ));

			$msg = "Aparelho alterado com sucesso. E status atualizado no histórico.";
		}

		$msg = "Aparelho alterado com sucesso.";
	}


	/************* Insere no histórico *************/
	
	echo $msg;

	//Fecha conexão
	$pdo = null;

?>