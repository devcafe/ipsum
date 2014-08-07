<?php
	include("../../../conf/conn.php");
	
	//Pega data atual
	$dataAtual = date('d/m/Y');
	$dataCadastro = $dataAtual;

	//Recebe dados e atribui valores em array
	$i = 0;

	foreach($_POST as $res){
		$dados[$i] = $res;
		$i++;
	}

	//Verifica se a linha já existe no banco
	$check = $pdo->prepare("
		Select numLinha From ipsum_linhasmoveis Where numLinha = ?
	");

	$check->execute(array($dados[0]));

	$res = $check->rowCount();

	if($dados[0] == ''){
		$msg = "Favor informe o número da linha.";
	} else if($res <= 0){
		//Verifica se foi informado um usuario, caso contrário insere "nenhum"
		if($dados[3] == ''){
			$dados[3] = 1;
		}

		//Verifica se foi informado uma empresa, caso contrário insere "nenhum"
		if($dados[4] == ''){
			$dados[4] = 1;
		}

		//Verifica se foi informado um aparelho, caso contrário insere "nenhum"
		if($dados[8] == ''){
			$dados[8] = 1;
			//O status do aparelho é igual a 6 (nenhum)
			$dados[9] = 6;
		}

		//Querie para inserir dados no banco (insere linha)
		$sql01 = $pdo->prepare("
			Insert Into ipsum_linhasmoveis 
				(`idLinha`, `numLinha`, `plano`, `iccid`, `idUsuarioMovel`, `idEmpresa`, `idLinhaStatus`, `operadora`, `observacoes`, `dataCadastro`, `dataAlteracao`, `idAparelho`)
			Values 
				(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

		//Querie para inserir dados no banco (insere linha)
		$sql02 = $pdo->prepare("
			INSERT INTO `ipsum_linhasmoveishist`
				(`idHistLinha`, `idLinha`, `idAparelho`, `idEmpresa`, `idAparelhoStatus`, `idLinhaStatus`, `idUsuarioMovel`, `dataAlteracao`)
			Values 
				(?, ?, ?, ?, ?, ?, ?, ?)");

		//Quando é definido um aparelhos para o usuário, o mesmo não pode pertencer a outro usuário
		$sql03 = $pdo->prepare("Update ipsum_linhasmoveisaparelhos Set checkedAparelho = 1 Where idAparelho = ?");

		//Executa consulta e passa parâmetros (insere linha)
		$sql01->execute(array('', $dados[0], $dados[1], $dados[2], $dados[3], $dados[4], $dados[5], $dados[6], $dados[7], $dataCadastro, $dataCadastro, $dados[8]));

		//Pega o id da ultima linha inserida para inserir no histórico
		$getLinha = $pdo->prepare("Select max(idLinha) As idLinha From ipsum_linhasmoveis");
		$getLinha->execute();
		$resLinhas = $getLinha->fetch(PDO::FETCH_OBJ);

		//Executa consulta e passa parâmetros (insere para histórico)
		$sql02->execute(array('', $resLinhas->idLinha, $dados[8], $dados[5], $dados[9], $dados[5], $dados[3], $dataAtual));

		//Executa consulta e passa parâmetros (muda situação do aparelho)
		$sql03->execute(array($dados[8]));

		$msg = "Linha cadastrada com sucesso.";

	} else {
		$msg = "Essa linha já foi cadastrada.";
	}

	echo $msg;

	//Fecha conexão
	$pdo = null;

?>