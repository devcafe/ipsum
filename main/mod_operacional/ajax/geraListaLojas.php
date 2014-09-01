<?php
	include("../../../conf/conn.php");
	include("../../../actions/security.php");

	header('Content-Type: text/html; charset=UTF-8');


	$itens = $_POST['itens'];

	$lista = '';
	$i = 0;

	
	foreach ($itens as $res) {
		$lista .= '<tr class = "lojasAdicionadas">';
			
				foreach ($res as $row) {
					$lista .= '<td>'. $row .'</td>';
			}
			$lista .= '<td><input type = "text" class = "ordemDiaRoteiro"></td>';
			$lista .= '<td><input type = "text" class = "ordemDiaRoteiro"></td>';
			$lista .= '<td><input type = "text" class = "ordemDiaRoteiro"></td>';
			$lista .= '<td><input type = "text" class = "ordemDiaRoteiro"></td>';
			$lista .= '<td><input type = "text" class = "ordemDiaRoteiro"></td>';
			$lista .= '<td><input type = "text" class = "ordemDiaRoteiro"></td>';
			$lista .= '<td><input type = "text" class = "ordemDiaRoteiro"></td>';
		$lista .= '</tr>';
	}
	

	echo $lista;

?>