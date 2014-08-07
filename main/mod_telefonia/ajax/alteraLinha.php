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

	//Verifica se foi informado um usuario, caso contrário insere "nenhum"
	if($dados[4] == '' || $dados[4] == 'Nenhum'){
		$dados[4] = 1;
	}

	//Verifica se foi informado uma empresa, caso contrário insere "nenhum"
	if($dados[5] == ''  || $dados[5] == 'Nenhum'){
		$dados[5] = 1;
	}

	//Verifica se foi informado um aparelho, caso contrário insere "nenhum"
	if($dados[9] == '' || $dados[9] == 'Nenhum'){
		$dados[9] = 1;
	}

	//Verifica se o id do aparelho selecionado é o mesmo atrelado a linha
	//caso seja, não faz update e o aparelho continua com status 1, caso contrário, o status seria 0 pois o mesmo foi liberado
	$checkAparelho = $pdo->prepare("Select a.idAparelho, b.idAparelhoStatus From ipsum_linhasmoveis a Inner Join ipsum_linhasmoveisaparelhos b On (a.idAparelho = b.idAparelho) Where a.idLinha = ?");

	$checkAparelho->execute(array($dados[0]));

	$resAparelhos = $checkAparelho->fetch(PDO::FETCH_OBJ);

	if($resAparelhos->idAparelho != $dados[9]){
		//Se foi selecionado "nenhum", não ocupa aparelho
		if($dados[9] == 1){
			//Faz update do aparelho antigo, pois o mesmo foi liberado
			$liberaAparelho = $pdo->prepare("Update ipsum_linhasmoveisaparelhos Set checkedAparelho = 0 Where idAparelho = ?");

			$liberaAparelho->execute(array($resAparelhos->idAparelho));
		} else {
			//Faz update do aparelho antigo, pois o mesmo foi liberado
			$liberaAparelho = $pdo->prepare("Update ipsum_linhasmoveisaparelhos Set checkedAparelho = 0 Where idAparelho = ?");
			//O novo aparelho agora esta em uso
			$ocupaAparelho = $pdo->prepare("Update ipsum_linhasmoveisaparelhos Set checkedAparelho = 1 Where idAparelho = ?");

			$liberaAparelho->execute(array($resAparelhos->idAparelho));
			$ocupaAparelho->execute(array($dados[9]));
		}
	}

	/************* Insere no histórico *************/
	//Pega o status do aparelho
	$aparelhoStatus = $pdo->prepare("Select idAparelhoStatus From ipsum_linhasmoveisaparelhos Where idAparelho = ". $dados[9] ."");
	$aparelhoStatus->execute(array($dados[0]));

	$resAparelhoStatus = $aparelhoStatus->fetch(PDO::FETCH_OBJ);

	$check = $pdo->prepare("Select a.idAparelho, a.idUsuarioMovel, a.idLinhaStatus, a.idAparelhoStatus FROM `ipsum_linhasmoveishist` a
							Inner Join ipsum_linhasmoveis b On (a.idLinha = b.idLinha)
							Where b.numLinha = ? Order By a.idHistLinha Desc Limit 1");

	$check->execute(array($dados[1]));
	$toHist = $check->fetch(PDO::FETCH_OBJ);

	if($toHist->idAparelho != $dados[9] || $toHist->idUsuarioMovel != $dados[4] || $toHist->idLinhaStatus != $dados[6]){
		
		//Pega o id da ultima linha inserida para inserir no histórico
		$getLinha = $pdo->prepare("Select max(idLinha) As idLinha From ipsum_linhasmoveis Where numLinha = ?");
		$getLinha->execute(array($dados[1]));
		$resLinhas = $getLinha->fetch(PDO::FETCH_OBJ);
		
		//Guarda histórico da linha
		$sql01 = $pdo->prepare("
		INSERT INTO `ipsum_linhasmoveishist`
				(`idHistLinha`, `idLinha`, `idAparelho`, `idEmpresa`, `idAparelhoStatus`, `idLinhaStatus`, `idUsuarioMovel`, `dataAlteracao`)
			Values 
				(?, ?, ?, ?, ?, ?, ?, ?)");

		$sql01->execute(array('', $resLinhas->idLinha, $dados[9], $dados[5], $resAparelhoStatus->idAparelhoStatus, $dados[6], $dados[4], $dataAtual));
	}

	/************* Insere no histórico *************/


	//Faz update da linha
	$sql = $pdo->prepare("
		Update 
			ipsum_linhasmoveis 
		Set 
			`plano` = ?
			,`iccid` = ?
			,`idUsuarioMovel` = ?
			,`idEmpresa` = ?
			,`idLinhaStatus` = ?
			,`operadora` = ?
			,`observacoes` = ?
			,`dataAlteracao` = ?
			,`idAparelho` = ?
		Where	
			`idLinha` = ?
	");

	$sql->execute(array($dados[2], $dados[3], $dados[4], $dados[5], $dados[6], $dados[7], $dados[8], $dataAtual, $dados[9], $dados[0]));

	$msg = "Linha alterada com sucesso";

	echo $msg;

	//Fecha conexão
	$pdo = null;

?>