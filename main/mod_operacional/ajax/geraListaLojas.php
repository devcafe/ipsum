<?php
	include("../../../conf/conn.php");
	include("../../../actions/security.php");

	header('Content-Type: text/html; charset=UTF-8');


	$idLojaAdd = $_POST['idLojaAdd'];
	$cnpjAdd = $_POST['cnpjAdd'];
	$nomeAdd = $_POST['nomeAdd'];
		//idroteiro
	$idRoteiro = isset($_POST['idRoteiro']) ? $_POST['idRoteiro'] : '';

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
	if($idLojaAdd != "null") {
		echo $lista;
	}

	$sqlLojas = $pdo->prepare("select a.idLoja, seg, ter, qua, qui, sex, sab, dom, cnpj, nome  from ipsum_operacionalroteiros a inner join ipsum_operacionallojas b on (a.idLoja = b.idLoja) where idRoteiro = ?");
	$sqlLojas->execute(array($idRoteiro));

	$lista = '';
	$lista .= "<tr>" ;
			$lista .= "<td>ID</td>" ;
			$lista .= "<td>CNPJ</td>" ;
			$lista .= "<td>Nome da Loja</td>" ;
			$lista .= "<td>seg</td>" ;
			$lista .= "<td>ter</td>" ;
			$lista .= "<td>qua</td>" ;
			$lista .= "<td>qui</td>" ;
			$lista .= "<td>sex</td>" ;
			$lista .= "<td>sab</td>" ;
			$lista .= "<td>dom</td>" ;			
		$lista .= "</tr>" ;
	while($resLojas = $sqlLojas->fetch(PDO::FETCH_OBJ)){
		$lista .= "<tr id = " . $resLojas->idLoja . " class = 'lojasAdicionadas'>";				
			$lista .= "<td><input type = 'hidden' value = " . $resLojas->idLoja . " class = 'idLojaSelecionada ". $resLojas->idLoja ."'>" . $resLojas->idLoja . "</td>";
			$lista .= "<td>" . $resLojas->cnpj . "</td>";
			$lista .= "<td>" . $resLojas->nome . "</td>";
			$lista .= "<td><input type = 'text' class = 'ordemDiaRoteiro seg' id = '". $resLojas->idLoja ."_seg'' value = '". $resLojas->seg ."'></td>";
			$lista .= "<td><input type = 'text' class = 'ordemDiaRoteiro ter' id = 'ter' value = '". $resLojas->ter ."'></td>";
			$lista .= "<td><input type = 'text' class = 'ordemDiaRoteiro qua' id = 'qua' value = '". $resLojas->qua ."'></td>";
			$lista .= "<td><input type = 'text' class = 'ordemDiaRoteiro qui' id = 'qui' value = '". $resLojas->qui ."'></td>";
			$lista .= "<td><input type = 'text' class = 'ordemDiaRoteiro sex' id = 'sex' value = '". $resLojas->sex ."'></td>";
			$lista .= "<td><input type = 'text' class = 'ordemDiaRoteiro sab' id = 'sab' value = '". $resLojas->sab ."'></td>";
			$lista .= "<td><input type = 'text' class = 'ordemDiaRoteiro dom' id = 'dom' value = '". $resLojas->dom ."'></td>";
		$lista .= "</tr>";
	};

	if($idLojaAdd == "null") {
		echo $lista;
	}


?>