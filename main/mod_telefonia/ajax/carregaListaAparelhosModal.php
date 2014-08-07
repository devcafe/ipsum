<?php
	include("../../../conf/conn.php");

	$aparelhos = $pdo->prepare("Select * From ipsum_linhasmoveisaparelhos Where checkedAparelho <> 1");

	$aparelhos->execute();
	
	$lista = '';

	while($resAparelhos = $aparelhos->fetch(PDO::FETCH_OBJ)){
		$lista .= "<ul>";
			$lista .= "<li> <input type='radio' name='aparelho' value=". $resAparelhos->idAparelho .">". "<label for=". $resAparelhos->marcaAparelho . ' - '. $resAparelhos->modeloAparelho . ' - '. $resAparelhos->imeiAparelho .">". $resAparelhos->marcaAparelho . ' - '. $resAparelhos->modeloAparelho . ' - ' . $resAparelhos->imeiAparelho ."</label> </li>";
		$lista .= "</ul>";
	}
		$lista .= "<input type = 'button' name = 'aparelhosOK' id = 'aparelhosOK' value = 'Ok'>";

	echo $lista;
?>