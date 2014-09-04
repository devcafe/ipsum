<?php
	include("../../../conf/conn.php");
	include("../../../actions/security.php");

	header('Content-Type: text/html; charset=UTF-8');


	$idLojaAdd = $_POST['idLojaAdd'];
	$cnpjAdd = $_POST['cnpjAdd'];
	$nomeAdd = $_POST['nomeAdd'];

	$lista = '';
	$i = 0;	
		$lista .= "<tr id = " . $idLojaAdd . " class = 'lojasAdicionadas'>";				
			$lista .= "<td><input type = 'hidden' value = " . $idLojaAdd . " class = 'idLojaSelecionada ". $idLojaAdd ."'>" . $idLojaAdd . "</td>";
			$lista .= "<td>" . $cnpjAdd . "</td>";
			$lista .= "<td>" . $nomeAdd . "</td>";
			$lista .= "<td><input type = 'text' class = 'ordemDiaRoteiro seg' id = '". $idLojaAdd ."_seg''></td>";
			$lista .= "<td><input type = 'text' class = 'ordemDiaRoteiro ter' id = 'ter'></td>";
			$lista .= "<td><input type = 'text' class = 'ordemDiaRoteiro qua' id = 'qua'></td>";
			$lista .= "<td><input type = 'text' class = 'ordemDiaRoteiro qui' id = 'qui'></td>";
			$lista .= "<td><input type = 'text' class = 'ordemDiaRoteiro sex' id = 'sex'></td>";
			$lista .= "<td><input type = 'text' class = 'ordemDiaRoteiro sab' id = 'sab'></td>";
			$lista .= "<td><input type = 'text' class = 'ordemDiaRoteiro dom' id = 'dom'></td>";
		$lista .= "</tr>";
	echo $lista;

?>