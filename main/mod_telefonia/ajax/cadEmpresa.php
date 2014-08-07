<?php
	include("../../../conf/conn.php");

	//Recebe dados e atribui valores em array
	$i = 0;

	foreach($_POST as $res){
		$dados[$i] = $res;
		$i++;
	}

	//Verifica se a empresa já existe no banco
	$check = $pdo->prepare("
		Select cnpj From ipsum_linhasmoveisempresas Where cnpj = ?
	");

	$check->execute(array($dados[4]));

	$res = $check->rowCount();

	if($dados[4] == ''){
		$msg = "Favor informe o CNPJ da empresa.";
	} else if($res <= 0){
		//Querie para inserir dados no banco
		$sql01 = $pdo->prepare("
			Insert Into `ipsum_linhasmoveisempresas` (`idEmpresa`, `nomeEmpresa`, `nomeContatoResponsavel`, `telContatoResponsavel`, `emailContatoResponsavel`, `cnpj`, `razaoSocial`, `endereco`, `observacoes`) 
			Values (?, ?, ?, ?, ?, ?, ?, ?, ?)");

		//Executa consulta e passa parâmetros
		$sql01->execute(array('', $dados[0], $dados[1], $dados[2], $dados[3], $dados[4], $dados[5], $dados[6], $dados[7]));

		$msg = "Empresa cadastrada com sucesso.";

	} else {
		$msg = "Essa empresa já foi cadastrada.";
	}

	echo $msg;

	//Fecha conexão
	$pdo = null;

?>