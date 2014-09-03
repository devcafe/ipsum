<?php
	include("../../../conf/conn.php");
	
	//Dados do formulário
	$dados = $_POST['dados'];

	parse_str($dados); 		

	$sql = $pdo->prepare("
		Insert Into `ipsum_tidespesas`
			(
				`idDespesa`,
				`despesa`, 
				`idDespesaNatureza`, 
				`idDespesaTipo`, 
				`qtdeItens`, 
				`idContaContabil`,
				`dataAquisicao`, 
				`idFornecedor`, 
				`nf`, 
				`descricao`, 
				`observacao`, 
				`jan`, 
				`fev`, 
				`mar`, 
				`abr`, 
				`mai`, 
				`jun`, 
				`jul`, 
				`ago`, 
				`sete`,
				`outu`, 
				`nov`, 
				`dez`) 
		VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )
	");

	$sql->execute(array('', $despesa, $_POST['selectNatureza'], $_POST['selectTipo'], $qtdeItens, $_POST['contaContabil'], $dataAquisicao, $fornecedor, $nf, $descricao, $observacao, 'R$ 00.00', 'R$ 00.00', 'R$ 00.00', 'R$ 00.00', 'R$ 00.00', 'R$ 00.00', 'R$ 00.00', 'R$ 00.00', 'R$ 00.00', 'R$ 00.00', 'R$ 00.00', 'R$ 00.00'));

	$msg = "Despesa cadastrada com sucesso";

	echo $msg;

?>