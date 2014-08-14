<?php
	include("../../../conf/conn.php");

	//Pega data atual
	$dataAtual = date('d/m/Y');
	$dataCadastro = $dataAtual;	
	$dados = array();
	$cont = 0;
	// intera os valores do post em um array
	foreach ($_POST as $value) {
		$dados[$cont] = $value;
		$cont++;
	}	
	// Faz a pesquisa no banco de dados e verifica se o usuario já não existe.
	$check = $pdo->prepare ("SELECT `usuario`,`email` FROM `ipsum_usuarios` WHERE  `usuario` = ? or `email` = ? ");

	$check->execute(array($dados[6], $dados[2]));
	
	$res = $check->rowCount();


	// virifica se os dados são consistente
	if($dados[0] == ''){
		$msg = "Favor informe o seu nome.";
	} 
		else if ($dados [1] == "") {
			$msg = "Favor informe um sobrenome.";
	 		}
			else if ($dados [2] == "") {
				$msg = "Favor informe o seu email.";
			}
			else if ($dados [3] == "") {
				$msg = "Informe um departamento.";
			}
			else if ($dados [4] == "") {
				$msg = "Favor informe a sua empresa.";
			}
			else if ($dados [5] == "") {
				$msg = "Preencha corretamente o CNPJ.";
			}
			else if ($dados [6] == "") {
				$msg = "O usuário já existe ou está incorreto.";
			}
			else if ($dados [7] == "") {
				$msg = "Você esqueceu de colocar uma senha!";
			}
			else if ($dados [7] != $dados[8]) {
				$msg = "Duas senhas que você digitou não confere";
			}

			else if ($dados [9] == "") {
				$msg = "Escolha um modulo pelo menos.";
			} 	

			else if ($res <= 0) {
				
			$sql01 = $pdo->prepare ("
				INSERT INTO `ipsum`.`ipsum_usuarios` (`id`,`nome`, `sobrenome`, `email`, `departamento`, `empresa`, `cnpj`,`usuario`, `senha`, `acessos`, `dataCadastro`) 
				VALUES 
				(NULL,?,?,?,?,?,?,?,?,?,?);");

			$sql01->execute(array($dados[0], $dados[1], $dados[2], $dados[3], $dados[4], $dados[5], $dados[6], sha1($dados[7]), $dados[9], $dataCadastro));

			$msg = "Usuário Cadastrado com sucesso.";
			
		 } else { 
			$msg = "Este usuário já existe, favor alterar.";
		}
		



		
	echo $msg;
?>