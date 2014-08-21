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
	$nome = u($nome);

	//valida os numeros
	if($numero == '')
		$numero = 'S/N';

	if($estabReceitaNumero == '')
		$estabReceitaNumero = 'S/N';
	
	// Pesquisa no banco de existe nom eou cnpj igual
	$sql = $pdo->prepare("select cnpj, nome from ipsum_operacionallojas where cnpj = ? or nome = ? ");
	$sql->execute(array($cnpj, $nome));
	$validaCNPJ = $sql->rowCount();

	//Valida CNPJ
	if ($validaCNPJ == 0){	

	// valida se todos os campos estão vazios
	if($cnpj == ""){
		$msg = "O campo CNPJ é obrigatório!";
	}elseif($idBandeiraHidden == ""){
		$msg = "O Campo Bandeira é obrigatório" ;
	}elseif($nome == ""){
		$msg = "O Campo Nome do estabelecimento é obrigatório" ;
	}elseif($cep == "" or $bairro == "" or $rua =="" or $cidade == "" or $uf == ""){
		$msg = "O endereço completo da loja é obrigatório, isto inclui: CEP, Bairro, Rua, Ciade e Estado (UF)" ;
	}elseif($estabReceitaNomeEmpresarial == ""){
		$msg = "O Campo Nome empresarial é obrigatório" ;
	}elseif($estabReceitaEndereco == "" or $estabReceitaNumero == "" or $estabReceitaBairro == "" or $estabReceitaCidade == "" or $estabReceitaCEP == "" or $estabReceitaUF == ""){
		$msg = "O endereço completo na receia federal é obrigatório, insto inclui: Nome Empresarial, CEP, Bairro, Rua, Ciade e Estado (UF)" ;
	}elseif($estabReceitaSituacaoData == ""){
		$msg = "O Campo situação data é obrigatório" ;
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
										`estabReceitaNomeEmpresarial`,
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
									(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");


			$sql->execute(array('', $cnpj, $idBandeiraHidden, u($nome), u($rua), $numero, u($complemento), u($bairro), u($cidade), u($uf), $cep, u($estabReceitaAberturaData), u($estabReceitaRazaoSocial), u($estabReceitaNomeEmpresarial), u($estabReceitaNF), u($estabReceitaEndereco), $estabReceitaNumero, u($estabReceitaComplemento), u($estabReceitaBairro), u($estabReceitaCidade), u($estabReceitaUF), $estabReceitaCEP, u($estabReceitaSituacao), $estabReceitaSituacaoData, $estabTel01, $estabTel02, $dataFechamento, $userAdd));
			$msg = "Loja Cadastrada com Sucesso";
		}
	}else{		
		if ($cnpj != ""){
			$msg = "CNPJ ou nome da loja ja existe, favor fornecer outro!"; 
		}else{
			$msg = "O campo CNPJ precisa ser preenchido!";
		}
	}

	echo $msg;

	//Fecha conexão
	$pdo = null;

?>