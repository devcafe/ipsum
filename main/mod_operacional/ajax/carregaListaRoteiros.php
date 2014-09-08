<?php
	include("../../../conf/conn.php");

	$sqlRoteiros = $pdo->prepare('select * from ipsum_operacionalroteiros inner join ipsum_usuarios on idUsuarioCad = id group by idRoteiro');

	$sqlRoteiros->execute();

	$lista = "";

	while ($roteiro = $sqlRoteiros->fetch(PDO::FETCH_OBJ)) {
		$lista .= "<tr id = '" . $roteiro->idRoteiro . "'>";
			$lista .= "<td>" . $roteiro->idRoteiro . "</td>";
			$lista .= "<td>" . $roteiro->nomeRoteiro . "</td>";
			$lista .= "<td>" . $roteiro->idAcao . "</td>";
			$lista .= "<td>" . $roteiro->nome . " " . $roteiro->sobrenome ."</td>";
		$lista .= "</tr>";
	}

	echo $lista;



?>