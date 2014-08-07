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
    
    //Diretório raiz dos arquivos
    $realPath = realpath($path. $bar .$_POST['whereIamFolder']);   

    //Arquivos a serem deletados
    foreach($_POST['itens'] as $row){
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            exec('rd '. $realPath . $bar . $row .' /S /Q ');

            $msg = "Arquivo(s) apagado(s) com sucesso.";
        } else {
            exec('rm '. $realPath . $bar . $row .' -Rf ');

            $msg = "Arquivo(s) apagado(s) com sucesso.";
        }
    }
    
    echo $msg;
?>