<?php
	include("../../../conf/conn.php");
	
	//Dados do formulário
	$dados = $_POST['dados'];

	parse_str($dados); 		

	//print_r($dados);

	//função para deixar os valores em letra maiuscula
	function u($str){
		$str = strtoupper($str);
		return $str;
	}
	// validar campos

	if ($cnpj == ""){

	} elseif($idBandeiraHidden == ""){

	} elseif($cep == "") $bairro == "" or $rua == "" or $ciade == "" or $uf == ""){
		
	}else{
	//Insere chamado
	$sql = $pdo->prepare("	Insert into `ipsum_operacionallojas` 
								(
									`idLoja`, 
									`cnpj`, 
									`idEstabBandeira`, 
									`nome`, 
									`rua`, 
									`numero`, 
									`complemento`, 
									`bairro`, 
									`cidade`, 
									`uf`, 
									`cep`, 
									`estabReceitaAberturaData`, 
									`estabReceitaRazaoSocial`,
									`estabReceitaNF`,
									`estabReceitaEndereco`, 
									`estabReceitaNumero`, 
									`estabReceitaComplemento`, 
									`estabReceitaBairro`, 
									`estabReceitaCidade`, 
									`estabReceitaUF`, 
									`estabReceitaCEP`, 
									`estabReceitaSituacao`, 
									`estabReceitaSituacaoData`, 
									`estabTel01`, 
									`estabTel02`, 
									`dataFechamento`, 
									`userAdd`)
							Values 
								(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");

	$sql->execute(array('', $cnpj, $idBandeiraHidden, u($nome), u($rua), $numero, u($complemento), u($bairro), u($cidade), u($uf), $cep, u($estabReceitaAberturaData), u($estabReceitaRazaoSocial), u($estabReceitaNF), u($estabReceitaEndereco), $estabReceitaNumero, u($estabReceitaComplemento), u($estabReceitaBairro), u($estabReceitaCidade), u($estabReceitaUF), $estabReceitaCEP, u($estabReceitaSituacao), $estabReceitaSituacaoData, $estabTel01, $estabTel02, $dataFechamento, $userAdd));
	}
	//Fecha conexão
	$pdo = null;

?>