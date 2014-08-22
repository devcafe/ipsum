<?php
	include("../../../conf/conn.php");

	header('Content-Type: text/html; charset=UTF-8');

	if($_POST['op'] == 'filtro'){
		if($_POST['statusFiltro'] == 'Todos'){
			//Consulta para retornar todos os chamados
			$sql = $pdo->prepare("Select * From ipsum_tichamados Where status <> 'Fechado' ");

			$sql->execute();
		} else {
			//Consulta para retornar todos os chamados de acordo com o status
			$sql = $pdo->prepare("Select * From ipsum_tichamados Where status = '". $_POST['statusFiltro'] ."'");

			$sql->execute();
		}


	} else {
		//Consulta para retornar todos os chamados diferentes de fechado
		$sql = $pdo->prepare("Select * From ipsum_tichamados Where status <> 'Fechado'");

		$sql->execute();

	}

	$lista = '';
	
	$i = 0;

	$lista .= "<table>";
		$lista .= '<tr>';
			$lista .= '<td>  </td>';
			$lista .= '<td> Breve descrição </td>';
			$lista .= '<td> Solicitante </td>';
			$lista .= '<td> Departamento </td>';
			$lista .= '<td> Prioridade </td>';
			$lista .= '<td> Status </td>';
			$lista .= '<td> Data de abertura </td>';
			//$lista .= '<td> Data de Alteração </td>';
		$lista .= '</tr>';

		// Intera resulados

		while($chamados = $sql->fetch(PDO::FETCH_OBJ)){
			if($i % 2 == 0){
				$lista .= '<tr class = "par" id = '. $chamados->idChamado .'>';
					$lista .= '<td class = "expand '. $chamados->idChamado .' plus" >  </td>';
					$lista .= '<td>'. $chamados->breveDescricaoChamado .'</td>';
					$lista .= '<td>'. $chamados->solicitante .'</td>';
					$lista .= '<td>'. $chamados->departamento .'</td>';
					$lista .= '<td>'. $chamados->prioridade .'</td>';
					$lista .= '<td>'. $chamados->status .'</td>';
					$lista .= '<td>'. $chamados->dataAbertura .'</td>';
					//$lista .= '<td>'. $chamados->dataAlteracao .'</td>';
				$lista .= '</tr>';

				//Subitens (descrição)
				$sub = $pdo->prepare("Select a.*, b.* From ipsum_tichamadoshist a Inner Join ipsum_usuarios b On (a.idUsuarioResponsavel = b.id) Where idChamado = ? ORDER BY a.idChamadoHist ASC");
				$sub->execute(array($chamados->idChamado));

				$lista .= '<tr class = "subContainner sub_'. $chamados->idChamado .'">';
					$lista .= '<td> </td>';
					$lista .= '<td class="descricaoChamado" colspan="8">' . $chamados->descricaoChamado .'</td>';
				$lista .= '</tr>';

				//Itera descrições do chamado
				while($descricoes = $sub->fetch(PDO::FETCH_OBJ)){					
					$lista .= '<tr class = "subContainner sub_'. $chamados->idChamado .'">';
						$lista .= '<td class = "atualizadoPor" colspan="8">Atualizado por ' . $descricoes->nome . ' ' . $descricoes->sobrenome .' em '. $descricoes->dataAlteracao .'</td>';
					$lista .= '</tr>';
					$lista .= '<tr class = "subContainner sub_'. $chamados->idChamado .'">';
						$lista .= '<td> </td>';
						$lista .= '<td class="descricaoChamado" colspan = "7">'. $descricoes->descricaoChamadoHist  .'</td>';
					$lista .= '</tr>';
				}
				$lista .= '<tr class = "addComentario" id = "comentario_'. $chamados->idChamado .'">';
					$lista .= '<td colspan = "8"><img src="resources/images/add.png"/></td>';
				$lista .= '</tr>';

			} else {
				$lista .= '<tr class = "impar" id = '. $chamados->idChamado .'>';
					$lista .= '<td class = "expand '. $chamados->idChamado .' plus" >  </td>';
					$lista .= '<td>'. $chamados->breveDescricaoChamado .'</td>';
					$lista .= '<td>'. $chamados->solicitante .'</td>';
					$lista .= '<td>'. $chamados->departamento .'</td>';
					$lista .= '<td>'. $chamados->prioridade .'</td>';
					$lista .= '<td>'. $chamados->status .'</td>';
					$lista .= '<td>'. $chamados->dataAbertura .'</td>';
					//$lista .= '<td>'. $chamados->dataAlteracao .'</td>';
				$lista .= '</tr>';

				//Subitens (descrição)
				$sub = $pdo->prepare("Select a.*, b.* From ipsum_tichamadoshist a Inner Join ipsum_usuarios b On (a.idUsuarioResponsavel = b.id) Where idChamado = ? ORDER BY a.idChamadoHist ASC");
				$sub->execute(array($chamados->idChamado));

				$lista .= '<tr class = "subContainner sub_'. $chamados->idChamado .'">';
					$lista .= '<td> </td>';
					$lista .= '<td class="descricaoChamado" colspan="8">' . $chamados->descricaoChamado .'</td>';
				$lista .= '</tr>';

				//Itera descrições do chamado
				while($descricoes = $sub->fetch(PDO::FETCH_OBJ)){					
					$lista .= '<tr class = "subContainner sub_'. $chamados->idChamado .'">';
						$lista .= '<td class = "atualizadoPor" colspan="8">Atualizado por ' . $descricoes->nome . ' ' . $descricoes->sobrenome . ' em '. $descricoes->dataAlteracao . '</td>';
					$lista .= '</tr>';
					$lista .= '<tr class = "subContainner sub_'. $chamados->idChamado .'">';
						$lista .= '<td> </td>';
						$lista .= '<td class="descricaoChamado" colspan = "7">'. $descricoes->descricaoChamadoHist  .'</td>';
					$lista .= '</tr>';

				}
				$lista .= '<tr class = "addComentario" id = "comentario_'. $chamados->idChamado .'">';
					$lista .= '<td colspan = "8"><img src="resources/images/add.png"/></td>';
				$lista .= '</tr>';
			}
			$i++;
		}
	$lista .= "</table>";

	echo $lista;
?>