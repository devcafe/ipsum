<?php
	include("../../../conf/conn.php");

	$idModuloSelecionado = $_POST['idModuloSelecionado'];
	$idModulosItems = $_POST['idModulosItems'];

	$sql = $pdo->prepare("select * from  `ipsum_modulos` where idmodulo = ?");

	$sql->execute(array($idModuloSelecionado));

	// contador e controle

	$c = count($idModulosItems);

	$i = 0;
	// trata o array multidimensional

	while ($c > $i){
		$exp[$i] = explode('_',$idModulosItems[$i]);
		$i++;			
	}

	$sv = "";
	foreach($exp as $v => $vv){
    	if(is_array($vv)){
         	$sv .= $vv[1]. ',';
         }	
	}
	// array já tratada
	$itemModuloFinal = substr($sv,0,-1);

	// faz a pesquisa no banco de acordo com os itens selecionados	

	$sql01 = $pdo->prepare("select * from ipsum_modulositems a inner join ipsum_modulos b where b.idModulo = $idModuloSelecionado and a.idModuloItem in ($itemModuloFinal)");
	$sql01->execute();
	$res = $sql->fetch(PDO::FETCH_OBJ);

	//$count = $sql01->rowCount();
	
	$lista = '<ul class ='.'m_' . $res->idModulo . '>';

		$lista .= '<li>' . $res->nomeModulo;
			$lista .= '<ul id = "l_'. $res->idModulo.'">';
				while($res = $sql01->fetch(PDO::FETCH_OBJ)){
					$lista .= '	<li class = "moduloSelecionadoFinal" id = i_'. $res->idModulo . '_' .$res->idModuloItem .'>	
									<img src="resources/images/minus.png" class = "minus" />'. $res->nomeModuloItem . 
								'</li>';
				}
			$lista .= '</ul>';

		$lista .= '</li>';

	$lista .='</ul>';



	echo $lista;


?>
