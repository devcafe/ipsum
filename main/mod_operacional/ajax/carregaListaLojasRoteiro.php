<?php
	include("../../../conf/conn.php");

	$toSearchLoja = $_POST['toSearchLoja'];
	$buscaCampoLoja = $_POST['buscaCampoLoja'];

	$sql = $pdo->prepare('Select * From ipsum_operacionallojas where ? = ?');
	$sql->execute(array($buscaCampoLoja, $toSearchLoja));
	

	$lista = "";

	$i = 0;

	while($lojas = $sql->fetch(PDO::FETCH_OBJ)){
		#if($i % 2 == 0)){
			$lista .= '<tr class = "par" id = "'. $lojas->idLoja .'">';
					$lista .= '<td> </td>';
					$lista .= '<td>' . $lojas->nome .'</td>';
					$lista .= '<td>' . $lojas->nome .'</td>';
				$lista .= '</tr>';
		#}else {
			#$lista .= '<tr class = "par" id = "'. $sql->idLoja .'">';
			#		$lista .= '<td> </td>';
			#		$lista .= '<td>' . $res->nome .'</td>';
		#			$lista .= '<td>' . $res->nome .'</td>';
		#		$lista .= '</tr>';

		#}
		#$i++;
	} 

	echo $lista;
	echo "ok";


?>