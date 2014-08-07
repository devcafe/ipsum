<?php
	require("../conf/conn.php");

	session_start();

	$usuario = $_POST['usuario'];
	$senha = sha1($_POST['senha']);

	$sql = $pdo->prepare("Select usuario, id, nome, sobrenome From ipsum_usuarios Where usuario = '". $usuario ."' And senha = '". $senha ."' ");
	$sql->execute();

	$usuarios = $sql->fetchAll(PDO::FETCH_OBJ);

	$rows = $sql->rowCount();
	
	if($rows > 0){
		$_SESSION['loged'] = true;		
		$_SESSION['usuario'] = $usuarios[0]->usuario;
		$_SESSION['idUsuario'] = $usuarios[0]->id;
		$_SESSION['nomeUsuario'] = $usuarios[0]->nome . ' ' . $usuarios[0]->sobrenome;
		$autenticado = 0;
	} else {
		$autenticado = 1;
	}

	echo $autenticado;
?>