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

    //Verifica se o usuário selecionou uma pasta ou se é a pasta raiz
    if($_POST['op'] == 'click'){
        $pastaAcessada = $_POST['pastaAcessada'];
        $raiz = substr($_POST['raiz'],0,-1);

        //Pega diretório que o usuário esta
        $dir = $path . $pastaAcessada;

        //Monta lista do diretório em uma variavel
        $lista = '';

        $realPath = realpath($dir. $bar);

        //Verifica se é um diretório
        if(is_dir($dir)){
            //Se for um diretório, abre o mesmo
            if ($dh = opendir($dir)) {
                $lista .= '<ul>';
                        //Percorre arquivos e pastas do diretório
                while (($file = readdir($dh)) !== false) {						
                    if($realPath == $path . $raiz){
                        $ignoreList = array('cgi-bin', '.', '..', '._');

                        if(is_dir($dir. $bar . $file) && substr($file, 0, 1) != '.'){
                            $lista .= '<li class = "checkboxFile"> <input type = "checkbox" value = '. $file . '> </li>' ;
                            $lista .= '<li class = "icon"> <img src = "resources/images/folderIcon.png"> </li>' ;
                            $lista .= '<li class = "open">'. $file . '</li>';
                            $lista.= '<li class = "fake"> </li>';
                        } elseif(substr($file, -3) == 'txt') {
                            $lista .= '<li class = "checkboxFile"> <input type = "checkbox" value = '. $file . '> </li>' ;
                            $lista .= '<li class = "icon"> <img src = "resources/images/notepadIcon.png"> </li>' ;
                            $lista .= '<li class = "open">'. $file . '</li>';
                            $lista.= '<li class = "fake"> </li>';
                        } elseif(substr($file, -3) == 'doc' || substr($file, -3) == 'docx'){
                            $lista .= '<li class = "checkboxFile"> <input type = "checkbox" value = '. $file . '> </li>' ;
                            $lista .= '<li class = "icon"> <img src = "resources/images/word.png"> </li>' ;
                            $lista .= '<li class = "open">'. $file . '</li>';
                            $lista.= '<li class = "fake"> </li>';
                        }
                    } else {
                        if(is_dir($dir. $bar . $file) && substr($file, 0, 1) != '.' || substr($file, 0, 2) == '..'){
                            if(is_dir($dir. $bar . $file)){
                                $lista .= '<li class = "checkboxFile"> <input type = "checkbox" value = '. $file . '> </li>' ;
                                $lista .= '<li class = "icon"> <img src = "resources/images/folderIcon.png"> </li>' ;
                                $lista .= '<li class = "open">'. $file . '</li>';
                                $lista.= '<li class = "fake"> </li>';

                            }
                        } elseif(substr($file, -3) == 'txt'){
                            $lista .= '<li class = "checkboxFile"> <input type = "checkbox" value = '. $file . '> </li>' ;
                            $lista .= '<li class = "icon"> <img src = "resources/images/notepadIcon.png"> </li>' ;
                            $lista .= '<li class = "open">'. $file . '</li>';
                            $lista.= '<li class = "fake"> </li>';
                        } elseif(substr($file, -3) == 'doc' || substr($file, -3) == 'docx'){
                            $lista .= '<li class = "checkboxFile"> <input type = "checkbox" value = '. $file . '> </li>' ;
                            $lista .= '<li class = "icon"> <img src = "resources/images/word.png"> </li>' ;
                            $lista .= '<li class = "open">'. $file . '</li>';
                            $lista.= '<li class = "fake"> </li>';
                        }
                    }
                }
                $lista .= '</ul>';
                closedir($dh);
            }
        }

        echo $lista;
    } elseif($_POST['op'] == 'reload') {
            //Recebe dados do formulário
            $idUser = $_POST['idUser'];
            $whereIamFolder = $_POST['whereIamFolder'];

            //Pega diretório que o usuário esta
            $dir = $path . $whereIamFolder;

            //Monta lista do diretório em uma variavel
            $lista = '';

            $realPath = realpath($dir. $bar);

            $raiz = $_POST['raiz'];

            //Verifica se é um diretório
            if(is_dir($dir)){
                    //Se for um diretório, abre o mesmo
                    if ($dh = opendir($dir)) {
                            $ignoreList = array('cgi-bin', '.', '..', '._');

                            $lista .= '<ul>';
                                    //Percorre arquivos e pastas do diretório
                            while (($file = readdir($dh)) !== false) {						


                                    if($realPath . $bar == $path . $raiz){
                                            $ignoreList = array('cgi-bin', '.', '..', '._');

                                            if(is_dir($dir. $bar . $file) && substr($file, 0, 1) != '.' && substr($file, 0, 2) != '..'){
                                                $lista .= '<li class = "checkboxFile"> <input type = "checkbox" value = '. $file . '> </li>' ;
                                                $lista .= '<li class = "icon"> <img src = "resources/images/folderIcon.png"> </li>' ;
                                                $lista .= '<li class = "open">'. $file . '</li>';
                                                $lista.= '<li class = "fake"> </li>';
                                            } elseif(substr($file, -3) == 'txt') {
                                                $lista .= '<li class = "checkboxFile"> <input type = "checkbox" value = '. $file . '> </li>' ;
                                                $lista .= '<li class = "icon"> <img src = "resources/images/notepadIcon.png"> </li>' ;
                                                $lista .= '<li class = "open">'. $file . '</li>';
                                                $lista.= '<li class = "fake"> </li>';
                                            } elseif(substr($file, -3) == 'doc' || substr($file, -3) == 'docx'){
                                                $lista .= '<li class = "checkboxFile"> <input type = "checkbox" value = '. $file . '> </li>' ;
                                                $lista .= '<li class = "icon"> <img src = "resources/images/word.png"> </li>' ;
                                                $lista .= '<li class = "open">'. $file . '</li>';
                                                $lista.= '<li class = "fake"> </li>';
                                            }
                                    } else {
                                            if(is_dir($dir. $bar . $file) && substr($file, 0, 1) != '.' || substr($file, 0, 2) == '..'){
                                                if(is_dir($dir. $bar . $file)){
                                                    $lista .= '<li class = "checkboxFile"> <input type = "checkbox" value = '. $file . '> </li>' ;
                                                    $lista .= '<li class = "icon"> <img src = "resources/images/folderIcon.png"> </li>' ;
                                                    $lista .= '<li class = "open">'. $file . '</li>';
                                                    $lista.= '<li class = "fake"> </li>';
                                                }
                                            } elseif(substr($file, -3) == 'txt'){
                                                $lista .= '<li class = "checkboxFile"> <input type = "checkbox" value = '. $file . '> </li>' ;
                                                $lista .= '<li class = "icon"> <img src = "resources/images/notepadIcon.png"> </li>' ;
                                                $lista .= '<li class = "open">'. $file . '</li>';
                                                $lista.= '<li class = "fake"> </li>';
                                            } elseif(substr($file, -3) == 'doc' || substr($file, -3) == 'docx'){
                                                $lista .= '<li class = "checkboxFile"> <input type = "checkbox" value = '. $file . '> </li>' ;
                                                $lista .= '<li class = "icon"> <img src = "resources/images/word.png"> </li>' ;
                                                $lista .= '<li class = "open">'. $file . '</li>';
                                                $lista.= '<li class = "fake"> </li>';
                                            }
                                    }

                            }
                    $lista .= '</ul>';
                    closedir($dh);
                }
            }
            echo $lista;
    } else {
            //Recebe dados do formulário
            $idUser = $_POST['idUser'];
            $whereIamFolder = $_POST['whereIamFolder'];

            //Pega diretório que o usuário esta
            $dir = $path . $whereIamFolder;

            //Monta lista do diretório em uma variavel
            $lista = '';

            $raiz = $_POST['raiz'];

            //Verifica se é um diretório
            if(is_dir($dir)){
                    //Se for um diretório, abre o mesmo
                    if ($dh = opendir($dir)) {
                            $ignoreList = array('cgi-bin', '.', '..', '._');

                            $lista .= '<ul>';
                                    //Percorre arquivos e pastas do diretório
                            while (($file = readdir($dh)) !== false) {
                                    //Verifica se o usuário esta no diretório raiz para impedir que o mesmo
                                    //volte um nivel acima
                                    if(!in_array($file, $ignoreList) and substr($file, 0, 1) != '.' && $dir == $path . $_POST['raiz']){
                                            if(is_dir($dir. $bar . $file)){
                                                $lista .= '<li class = "checkboxFile"> <input type = "checkbox" value = '. $file . '> </li>' ;
                                                $lista .= '<li class = "icon"> <img src = "resources/images/folderIcon.png"> </li>' ;
                                                $lista .= '<li class = "open">'. $file . '</li>';
                                                $lista.= '<li class = "fake"> </li>';
                                            } elseif(substr($file, -3) == 'txt') {
                                                $lista .= '<li class = "checkboxFile"> <input type = "checkbox" value = '. $file . '> </li>' ;
                                                $lista .= '<li class = "icon"> <img src = "resources/images/notepadIcon.png"> </li>' ;
                                                $lista .= '<li class = "open">'. $file . '</li>';
                                                $lista.= '<li class = "fake"> </li>';
                                            } elseif(substr($file, -3) == 'doc' || substr($file, -3) == 'docx'){
                                                $lista .= '<li class = "checkboxFile"> <input type = "checkbox" value = '. $file . '> </li>' ;
                                                $lista .= '<li class = "icon"> <img src = "resources/images/word.png"> </li>' ;
                                                $lista .= '<li class = "open">'. $file . '</li>';
                                                $lista.= '<li class = "fake"> </li>';
                                            }
                                    } elseif(!in_array($file, $ignoreList) and substr($file, 0, 1) != '.') {
                                            if(is_dir($dir. $bar . $file)){
                                                $lista .= '<li class = "checkboxFile"> <input type = "checkbox" value = '. $file . '> </li>' ;
                                                $lista .= '<li class = "icon"> <img src = "resources/images/folderIcon.png"> </li>' ;
                                                $lista .= '<li class = "open">'. $file . '</li>';
                                                $lista.= '<li class = "fake"> </li>';
                                            } elseif(substr($file, -3) == 'txt') {
                                                $lista .= '<li class = "checkboxFile"> <input type = "checkbox" value = '. $file . '> </li>' ;
                                                $lista .= '<li class = "icon"> <img src = "resources/images/notepadIcon.png"> </li>' ;
                                                $lista .= '<li class = "open">'. $file . '</li>';
                                                $lista.= '<li class = "fake"> </li>';
                                            } elseif(substr($file, -3) == 'doc' || substr($file, -3) == 'docx'){
                                                $lista .= '<li class = "checkboxFile"> <input type = "checkbox" value = '. $file . '> </li>' ;
                                                $lista .= '<li class = "icon"> <img src = "resources/images/word.png"> </li>' ;
                                                $lista .= '<li class = "open">'. $file . '</li>';
                                                $lista.= '<li class = "fake"> </li>';
                                            }
                                    }
                            }
                    $lista .= '</ul>';
                    closedir($dh);
                }
            }
            echo $lista;
    }



?>