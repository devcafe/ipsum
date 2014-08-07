<?php
	include("../../../conf/conn.php");

	//Consulta para retornar todas as linhas moveis cadastradas
	$sql = $pdo->prepare("Select * From ipsum_linhasmoveis");

	$sql->execute();

	$lista = '';

	$lista .= "<table>";
		$lista .= '<tr>';
			$lista .= '<td> Número </td>';
			$lista .= '<td> Plano </td>';
			$lista .= '<td> Usuário </td>';
			$lista .= '<td> Empresa/Ação </td>';
			$lista .= '<td> Modelo </td>';
			$lista .= '<td> Memoria </td>';
			$lista .= '<td> IMEI </td>';
			$lista .= '<td> ICCID </td>';
			$lista .= '<td> Status </td>';
			$lista .= '<td> Operadora </td>';
			$lista .= '<td> Acessorios </td>';
			$lista .= '<td> Observações </td>';
		$lista .= '</tr>';

		$i = 0;

		//Itera resultado e monta tabela para retorno
		while($linhasMoveis = $sql->fetch(PDO::FETCH_OBJ)){
			if($i % 2 == 0){
				$lista .= '<tr class = "par" id = '. $linhasMoveis->idLinha .'>';
					$lista .= '<td>'. $linhasMoveis->numLinha .'</td>';
					$lista .= '<td>'. $linhasMoveis->plano .'</td>';
					$lista .= '<td>'. $linhasMoveis->usuarioLinha .'</td>';
					$lista .= '<td>'. $linhasMoveis->empresaAcao .'</td>';
					$lista .= '<td>'. $linhasMoveis->modelo .'</td>';
					$lista .= '<td>'. $linhasMoveis->memoria .'</td>';
					$lista .= '<td>'. $linhasMoveis->imei .'</td>';
					$lista .= '<td>'. $linhasMoveis->iccid .'</td>';
					$lista .= '<td>'. $linhasMoveis->status .'</td>';
					$lista .= '<td>'. $linhasMoveis->operadora .'</td>';
					$lista .= '<td>'. $linhasMoveis->acessorios .'</td>';
					$lista .= '<td>'. $linhasMoveis->observacoes .'</td>';
				$lista .= '</tr>';
			} else {
				$lista .= '<tr class = "impar" id = '. $linhasMoveis->idLinha .'>';
					$lista .= '<td>'. $linhasMoveis->numLinha .'</td>';
					$lista .= '<td>'. $linhasMoveis->plano .'</td>';
					$lista .= '<td>'. $linhasMoveis->usuarioLinha .'</td>';
					$lista .= '<td>'. $linhasMoveis->empresaAcao .'</td>';
					$lista .= '<td>'. $linhasMoveis->modelo .'</td>';
					$lista .= '<td>'. $linhasMoveis->memoria .'</td>';
					$lista .= '<td>'. $linhasMoveis->imei .'</td>';
					$lista .= '<td>'. $linhasMoveis->iccid .'</td>';
					$lista .= '<td>'. $linhasMoveis->status .'</td>';
					$lista .= '<td>'. $linhasMoveis->operadora .'</td>';
					$lista .= '<td>'. $linhasMoveis->acessorios .'</td>';
					$lista .= '<td>'. $linhasMoveis->observacoes .'</td>';
				$lista .= '</tr>';
			}
			$i++;
		}

	$lista .= "</table>";

	echo $lista;
?>