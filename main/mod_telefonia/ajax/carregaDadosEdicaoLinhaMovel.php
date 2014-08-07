<?php
	include("../../../conf/conn.php");

	$idLinha = $_POST['idLinha'];

	//Carrega dados
	$sql = $pdo->prepare("
		Select a.idLinha, a.numLinha, a.plano, c.nome, b.nomeEmpresa, d.modeloAparelho, d.marcaAparelho, d.imeiAparelho, a.iccid, a.`idLinhaStatus`, a.operadora, a.observacoes, b.idEmpresa, a.idUsuarioMovel, d.idAparelho
		From ipsum_linhasmoveis a 
		Inner Join ipsum_linhasmoveisempresas b On (a.idEmpresa = b.idEmpresa)
		Inner Join ipsum_usuarioslinhamoveis c On (a.idUsuarioMovel = c.idUsuarioMovel)
		Inner Join ipsum_linhasmoveisaparelhos d On (a.idAparelho = d.idAparelho)
		Inner Join ipsum_linhasmoveislinhasstatus e On (a.idLinhaStatus = e.idLinhaStatus)
		Where a.idLinha = ?
	");

	$sql->execute(array($idLinha));

	$linhasMoveis = $sql->fetch(PDO::FETCH_OBJ);

	echo json_encode ($linhasMoveis);
?>