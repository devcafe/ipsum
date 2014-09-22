<?php
	include("../../../conf/conn.php");

	$dados = $_POST['dados'];

	parse_str($dados);	
	
	//Faz update do usuário
	$sql = $pdo->prepare("
		UPDATE `ipsum`.`ipsum_usuarios` 
			SET 
				`usuario`=?,
				`senha`=?,				
				`nome`=?,
				`sobrenome`=?,
				`email`=?,
				`departamento`=?,
				`empresa`=?,
				`cnpj`=?,
				`acessos`=? 
			WHERE 
			`id`=?;
	");
	$sql->execute(array(
		$usuarioMod,
		sha1($senha),
		$primeiroNomeMod,
		$sobrenomeMod,
		$emailMod,
		$departamentoMod,
		$empresaMod,
		$cnpjMod,
		$acessosMod,
		$idMod)
	);   

	
	$msg = "Cadastro alterado com sucesso.";

	
	$pdo = null;

?>