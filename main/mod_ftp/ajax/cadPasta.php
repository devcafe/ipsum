<?php
	include("../../../conf/conn.php");

	//Verifica a plataforma e cria a pasta no servidor
	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
		$path = 'C:\wamp\www\ipsum\main\mod_ftp\files\\';
		$bar = "\\";
	} else {
		$path = '/var/www/html/ipsum/main/mod_ftp/files/';
		$bar = "/";
	}

	//Recebe dados do formulário
	$idUser = $_POST['idUser'];
	$folderName = $_POST['folderName'];
	$whereIamFolder = $_POST['whereIamFolder'];

	//Remove espaços do nome da pasta e substitui por "_"
	$folderName = str_replace(" ", "_", $folderName);

	//Insere no banco
	/*$sql = $pdo->prepare("Insert Into ipsum_ftpfolders Values (:idFolder, :folderName, :idUsuario)");
	$sql->execute(array(":idFolder" => '', ":folderName" => $whereIamFolder . '/'. $folderName, ":idUsuario" => $idUser));*/	

	//Verifica a plataforma e cria a pasta no servidor
	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
		//Verifica se pasta já existe, se existir, renomeia a mesma
		if(file_exists($path. $whereIamFolder . $folderName)){
			$path . $whereIamFolder . $bar. $folderName . '_' . '1';
			
			//Cria um nome aleatório para a pasta duplicada
			exec('mkdir ' . $path . $whereIamFolder . $bar. $folderName . '_' . rand(1, 150));
		} else {
			exec('mkdir '. $path . $whereIamFolder . $bar. $folderName);
		}
	} else {
		//Verifica se pasta já existe, se existir, renomeia a mesma
		if(file_exists($path. $whereIamFolder . $folderName)){
			//Cria um nome aleatório para a pasta duplicada
			exec('mkdir ' . $path . $whereIamFolder . $bar. $folderName . '_' . rand(1, 150));
		} else {
			exec('mkdir '. $path . $whereIamFolder . $bar. $folderName);
		}
	}
	
	$msg = "Pasta criada com sucesso";
	
	echo $msg;
?>