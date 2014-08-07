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

	//Verifica se o aparelho já existe no banco
	$check = $pdo->prepare("
		Select imeiAparelho From ipsum_linhasmoveisaparelhos Where imeiAparelho = ?
	");

	$check->execute(array($dados[2]));

	$res = $check->rowCount();

	if($dados[2] == ''){
		$msg = "Favor informe o imei do aparelho.";
	} else if($res <= 0){

		//Querie para inserir dados no banco (insere linha)
		$sql01 = $pdo->prepare("
			INSERT INTO `ipsum_linhasmoveisaparelhos`
				(`idAparelho`, `idAparelhoStatus`, `marcaAparelho`, `modeloAparelho`, `imeiAparelho`, `tipo`, `dataEnvioManutencao`, `dataCadastro`, `dataAlteracao`, `checkedAparelho`, `acessorios`, `observacoes`)
			Values 
				(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

		//Executa consulta e passa parâmetros (insere linha)
		$sql01->execute(array('', $dados[4], $dados[0], $dados[1], $dados[2], $dados[3], $dados[5], $dataAtual, $dataAtual, 0, $dados[6], $dados[7]));

		$msg = "Aparelho cadastrado com sucesso.";

	} else {
		$msg = "Esse aparelho já foi cadastrado.";
	}

	echo $msg;

	//Fecha conexão
	$pdo = null;

?>