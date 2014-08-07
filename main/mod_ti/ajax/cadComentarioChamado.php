<?php
	include("../../../conf/conn.php");
	include("../../../actions/security.php"); 
	
	//Dados do formulário
	$idComentarioChamado = $_POST['idChamadoAdd'];

	//Data de cadastro do novo comentário
	$dataAlteracao = date("d/m/y");

	//Comentário
	$comentario = $_POST['comentario'];

	//Prioridade e status
	$prioridade = $_POST['prioridade'];
	$status = $_POST['status'];

	//Não adicionar comentario caso campo esteja em branco
	if($comentario != ''){
		//Adiciona comentario no banco
		$sql = $pdo->prepare("
			Insert Into 	
				`ipsum_tichamadoshist` 
				(`idChamadoHist`, `idChamado`, `descricaoChamadoHist`, `idUsuarioResponsavel`, dataAlteracao) 
			Values 
				(?, ?, ?, ?, ?)
		");

		$sql->execute(array('', $idComentarioChamado, $comentario, $_SESSION['idUsuario'], $dataAlteracao ));
	}

	//Atualiza prioridade e status
	$sql01 = $pdo->prepare("
		Update `ipsum_tichamados` 
		Set 
			`prioridade`= ?
			,`status`= ?
		Where 
			idChamado = ?
	");

	$sql01->execute(array($prioridade, $status, $idComentarioChamado ));

	if($sql01){
		$msg = 'Chamado atualizado';
	} else {
		$msg = 'Falha ao atualizar chamado';
	}

	echo $msg;

	//Fecha conexão
	$pdo = null;

?>