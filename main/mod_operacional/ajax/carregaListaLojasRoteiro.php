<?php
	include("../../../conf/conn.php");

	$toSearchLoja = $_POST['toSearchLoja'];

	$buscaCampoLoja = isset($_POST['buscaCampoLoja']) ? $_POST['buscaCampoLoja'] : '' ;

	if($buscaCampoLoja == "cnpj"){
		$criterio = "cnpj like '%$toSearchLoja%'";
	}else {
		$criterio = "idLoja = $toSearchLoja";
	}

	$sqlLojas = $pdo->prepare("Select * From ipsum_operacionallojas where {$criterio} limit 0,10");
	$sqlLojas->execute();
	
	$lista = "";


	$i = 0;
	$lista .='<table class ="carregaListaLojas" >';

	while($lojas = $sqlLojas->fetch(PDO::FETCH_OBJ)){		
		if($i % 2 == 0){
			$lista .= '<tr class = "par" id = "'. $lojas->idLoja .'">';
					$lista .= '<td> <input type = "checkbox" id = "'. $lojas->idLoja .'" > </td>';
					$lista .= '<td>' . $lojas->idLoja .'</td>';
					$lista .= '<td>' . $lojas->cnpj .'</td>';
					$lista .= '<td>' . $lojas->nome .'</td>';
				$lista .= '</tr>';
		}else {
			$lista .= '<tr class = "impar" id = "'. $lojas->idLoja .'">';
					$lista .= '<td> <input type = "checkbox" id = "'. $lojas->idLoja .'" > </td>';
					$lista .= '<td>' . $lojas->idLoja .'</td>';
					$lista .= '<td>' . $lojas->cnpj .'</td>';
					$lista .= '<td>' . $lojas->nome .'</td>';
				$lista .= '</tr>';
		}
		$i++;
	}
	$lista .='</table>'; 

	echo $lista;


?>