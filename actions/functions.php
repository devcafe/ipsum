<?php
	#require("security.php");
	include("../conf/conn.php");


	function acessos($codPagina){

		// Recebe os acessos do usuário 	
		$modAcessos = $_SESSION['acessos'];
		if ($modAcessos != 99){
			// tratando os dados
				$arrayAcessosCompleto =	explode(',', $modAcessos);				
				$cont = count($arrayAcessosCompleto);
				for ($i=0; $i < $cont; $i++) { 
						$arrayAcessos[$i] = explode('_', $arrayAcessosCompleto[$i]);
					}				

				$acessosFinal = '';
				foreach ($arrayAcessos as $key => $value) {
						if(is_array($value)){
							$acessosFinal .= $value[2]. ',';
						}
					}

				$acessosFinal = substr($acessosFinal, 0, -1);					
					
					// pesquisa no banco

					global $pdo;
					$sql = $pdo->prepare("select * from ipsum_modulositems where idModuloItem in($acessosFinal)");
					$sql->execute();
					$e=0;
					while ($res = $sql->fetch(PDO::FETCH_OBJ)){
						$moduloItem[$e] = $res->idModuloItem;
						$e++;				
					}			

					// validando o acesso					
					$key = array_search($codPagina, $moduloItem);			
					
					if(is_int($key)){
						return true;			
					} else{						
						return false;
					}
		}else {
			return true;
		}
			                                                 
	}

	
?>	 