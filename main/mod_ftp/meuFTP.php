<?php 
	require("../../conf/conn.php"); 
	include("../../actions/security.php"); 

	$idUsuario = $_SESSION['idUsuario'];

	//Pega pasta do usuario no FTP
	$sql = $pdo->prepare("Select usuario From ipsum_usuarios Where id = :idUser");
	$sql->execute(array(":idUser" => $idUsuario));

	$resUser = $sql->fetch(PDO::FETCH_OBJ);
?>

<!-- Javascript -->
<script src="mod_ftp/resources/js/meuFTP.js"></script>

<!-- CSS -->
<link rel="stylesheet" href = "mod_ftp/resources/css/meuFTP.css">

<div class = "formInner">
	<legend> Meu FTP </legend>

	<div class = "painel">
		<div class = "addFolderBtn" id = "addFolderBtn"> <img src = "../main/resources/images/addFolder.png" > </div>
		<div class = "btnDelete" id = "btnDelete"> <img src = "../main/resources/images/delete.png" width = "20" > </div>
		<div class = "btnUploadFile" id = "btnUploadFile"> <img src = "../main/resources/images/uploadFile.png" width = "20" > </div>
	</div>

	<div class = "fileArea">

	</div>
	
</div>

<!-- Modal para criar pasta -->
<div id = "addFolderModal" title = "Criar pasta">
	<label for = "folderName"> Nome da pasta: </label>
	<input type = "text" name = "folderName" id = "folderName" />
	<input type = "hidden" id = "idHiddenUsuario" value = "<?php echo $idUsuario; ?>"/>	

	<input type = "button" name = "addNewFolder" id = "addNewFolder" value = "Criar nova pasta">
</div>

<!-- Modal para fazer upload de arquivo -->
<div id = "uploadFileModal" title = "Selecionar arquivo">
	<form class="uploadFileForm" method="post" enctype="multipart/form-data" action='mod_ftp/ajax/uploadFile.php'>
		<input type="file" name="theFile" id = "theFile"/>
		
	<?php //Verifica a plataforma e cria a pasta no servidor
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') { ?>
			<input type = "hidden" name = "whereIamFolder" id = "whereIamFolder" value = "<?php echo $resUser->usuario ."\\"; ?>"/>
			<input type = "hidden" name = "raiz" id = "raiz" value = "<?php echo $resUser->usuario ."\\"; ?>"/>
	<?php } else { ?>
			<input type = "hidden" name = "whereIamFolder" id = "whereIamFolder" value = "<?php echo $resUser->usuario ."/"; ?>"/>
			<input type = "hidden" name = "raiz" id = "raiz" value = "<?php echo $resUser->usuario ."/"; ?>"/>
		<?php }	?>

		<input type="submit" value="Fazer upload" name="uploadFileSubmit" id="uploadFileSubmit">
	</form>

	<!-- Exibe uma visualização da imagem carregada -->
	<div id='viewImage'></div>
</div>