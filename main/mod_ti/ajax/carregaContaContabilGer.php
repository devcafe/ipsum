<?php
	include("../../../conf/conn.php");
	include("../../../actions/security.php"); 

	$sql = $pdo->prepare("Select * From ipsum_ticontacontabil");
	$sql->execute();

	$lista = '';

	$lista .= "<tr>";
		$lista .= "<td class = 'checkboxModal' > <input type='checkbox' id = 'selectAll' name='contaContabil' value=''></td>";
		$lista .= "<td> Selecionar todos </td>";
	$lista .= "</tr>";

	while($res = $sql->fetch(PDO::FETCH_OBJ)){
		$lista .= "<tr>";
			$lista .= "<td class = 'checkboxModal' > <input type='checkbox' name='contaContabil' value=". $res->idContaContabil ."></td>";
			$lista .= "<td>".  $res->contaContabil ."</td>";
		$lista .= "</tr>";

	}

	$lista .= '<tr class = "delete firstBorder" id = "delete">';
		$lista .= '<td colspan = "8"><img src = "../main/resources/images/delete.png" ></td>';
	$lista .= '</tr>';

	echo $lista;
?>