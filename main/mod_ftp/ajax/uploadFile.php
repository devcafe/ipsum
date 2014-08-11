<?php
	//Formatos aceitos
	$file_formats = array("jpg", "png", "gif", "bmp", "xls", "xlsx", "doc", "docx", "txt", "avi", "mp3");

 	//Verifica a plataforma
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $path = 'C:\wamp\www\ipsum\main\mod_ftp\files\\';
            $bar = "\\";
    } else {
            $path = '/var/www/html/ipsum/main/mod_ftp/files/';
            $bar = "/";
    }

	//Pega diretório que o usuário esta
    $dir = $path . $_POST['whereIamFolder'];

   //Diretório onde o arquivo será salvo
    $realPath = realpath($dir). $bar;

    //echo $realPath;

	//Onde arquivo será salvo
	$filepath = $realPath;

	//Dados do arquivo
	$name = $_FILES['theFile']['name'];
	$size = $_FILES['theFile']['size'];

	//Data
	$date = date('Y_m_d_h_i_s');

	//Caso haja arquivo
	if (strlen($name)) {
		//Pega a extensão do arquivo
		$extension = substr($name, strrpos($name, '.')+1);
		
		//Verifica se a extensão do arquivo é aceita
		if (in_array($extension, $file_formats)) { 
			//Verifica se o arquivo ultrapassou o tamanho máximo
			if ($size < (2048 * 1024)) {
				//Gera um nome aleatório para o arquivo
				//$fileName = md5(uniqid().time()).".".$extension;
				$fileName = preg_replace('/\\.[^.\\s]{3,4}$/', '', $name). '_'. $date . '.'. $extension;
				
				$tmp = $_FILES['theFile']['tmp_name'];

				//Faz upload
				if (move_uploaded_file($tmp, $filepath . $fileName)) {
					$msg = '<div class = "successUpload"> Upload realizado com sucesso. </div>';
				} else {
					$msg = "Falha ao fazer upload.";
				}
			} else {
				$msg = "O tamanho do arquivo excedeu o limite de 2MB.";
			}
		} else {
			$msg = "Formato de arquivo inválido.";
		}
	} else {
		$msg = "Por favor, selecione um arquivo.";
	}

	echo $msg;

	exit();
?>