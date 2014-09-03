<?php
	include("../../../conf/conn.php");
	include("../../../actions/security.php");

	header('Content-Type: text/html; charset=UTF-8');


	$itens = $_POST['itens'];

	$lista = '';
	$i = 0;

	#foreach ($itens as $res) {
		$lista .= "<tr class = 'lojasAdicionadas'>";			
				#foreach ($res as $row) {
					#$lista .= '<td>'. $row .'</td>';
			#	
			$lista .= "<td><input type = 'hidden' value = " . $itens[0]['idLoja'] . " class = 'idLojaSelecionada ". $itens[0]['idLoja'] ."'>" . $itens[0]['idLoja'] . "</td>";
			$lista .= "<td>" . $itens[0]['cnpj'] . "</td>";
			$lista .= "<td>" . $itens[0]['nome'] . "</td>";

			$lista .= "<td><input type = 'text' class = 'ordemDiaRoteiro seg' id = '". $itens[0]['idLoja'] ."_seg''></td>";
			$lista .= "<td><input type = 'text' class = 'ordemDiaRoteiro ter' id = 'ter'></td>";
			$lista .= "<td><input type = 'text' class = 'ordemDiaRoteiro qua' id = 'qua'></td>";
			$lista .= "<td><input type = 'text' class = 'ordemDiaRoteiro qui' id = 'qui'></td>";
			$lista .= "<td><input type = 'text' class = 'ordemDiaRoteiro sex' id = 'sex'></td>";
			$lista .= "<td><input type = 'text' class = 'ordemDiaRoteiro sab' id = 'sab'></td>";
			$lista .= "<td><input type = 'text' class = 'ordemDiaRoteiro dom' id = 'dom'></td>";
		$lista .= "</tr>";
	#}
	

	echo $lista;

?>