<?php
	include("../../../conf/conn.php");
	
	//Dados do formulário
	$dados = $_POST['dados'];

	parse_str($dados); 		

	#print_r($dados);

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

	$sql->execute(array('', $cnpj, $idBandeiraHidden, $nome, $rua, $numero, $complemento, $bairro, $cidade, $uf, $cep, $estabReceitaAberturaData, $estabReceitaRazaoSocial, $estabReceitaNF, $estabReceitaEndereco, $estabReceitaNumero, $estabReceitaComplemento, $estabReceitaBairro, $estabReceitaCidade, $estabReceitaUF, $estabReceitaCEP, $estabReceitaSituacao, $estabReceitaSituacaoData, $estabTel01, $estabTel02, $dataFechamento, $userAdd));
	
	//Fecha conexão
	$pdo = null;

?>