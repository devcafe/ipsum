<?php
	include("../../../conf/conn.php");

	//Caso seja feito um filtro, executa consulta de acordo com dados fornecidos, caso contrário
	//retorna todas as linhas
	if($_POST['op'] == 'filtro'){

		//Recebe dados para filtrar
		$marcaFiltro = $_POST['marcaFiltro'];
		$modeloFiltro = $_POST['modeloFiltro'];
		$imeiFiltro = $_POST['imeiFiltro'];
		$envioFiltro = $_POST['envioFiltro'];	
		$tipoAparelho = $_POST['tipoAparelho'];
		$statusFiltro = $_POST['statusFiltro'];

		//Condições para filtros mudam de acordo com valor do select no evento "change"
		//essas condições são necessários pois estamos trabalhando com "keyup" e "change" ao mesmo tempo
		if($tipoAparelho != '' && $statusFiltro == ''){
			//Consulta para retornar linhas moveis de acordo com o filtro
			$sql = $pdo->prepare("
				Select *
				From ipsum_linhasmoveisaparelhos a
				Inner Join ipsum_linhasmoveisaparelhosstatus b On (a.idAparelhoStatus = b.idAparelhoStatus)
				Where 
					a.marcaAparelho like :marcaAparelho
				And a.modeloAparelho like :modeloAparelho
				And a.imeiAparelho like :imeiAparelho
				And a.dataEnvioManutencao like :dataEnvioManutencao				
				And a.tipo like :tipo	
				And idAparelho <> 1
			");

			$sql->execute(array(":marcaAparelho" => "%" . $marcaFiltro . "%", ":modeloAparelho" => "%" . $modeloFiltro . "%", ":imeiAparelho" => "%" . $imeiFiltro . "%", ":dataEnvioManutencao" => "%" . $envioFiltro . "%", ":tipo" =>  "%" . $tipoAparelho . "%"));
		} elseif($tipoAparelho == '' && $statusFiltro != ''){
			//Consulta para retornar linhas moveis de acordo com o filtro
			$sql = $pdo->prepare("
				Select *
				From ipsum_linhasmoveisaparelhos a
				Inner Join ipsum_linhasmoveisaparelhosstatus b On (a.idAparelhoStatus = b.idAparelhoStatus)
				Where 
					a.marcaAparelho like :marcaAparelho
				And a.modeloAparelho like :modeloAparelho
				And a.imeiAparelho like :imeiAparelho
				And a.dataEnvioManutencao like :dataEnvioManutencao				
				And a.idAparelhoStatus like :idAparelhoStatus	
				And idAparelho <> 1
			");

			$sql->execute(array(":marcaAparelho" => "%" . $marcaFiltro . "%", ":modeloAparelho" => "%" . $modeloFiltro . "%", ":imeiAparelho" => "%" . $imeiFiltro . "%", ":dataEnvioManutencao" => "%" . $envioFiltro . "%", ":idAparelhoStatus" =>  "%" . $statusFiltro . "%"));
		} elseif($tipoAparelho != '' && $statusFiltro != '') {
			//Consulta para retornar linhas moveis de acordo com o filtro
			$sql = $pdo->prepare("
				Select *
				From ipsum_linhasmoveisaparelhos a
				Inner Join ipsum_linhasmoveisaparelhosstatus b On (a.idAparelhoStatus = b.idAparelhoStatus)
				Where 
					a.marcaAparelho like :marcaAparelho
				And a.modeloAparelho like :modeloAparelho
				And a.imeiAparelho like :imeiAparelho
				And a.dataEnvioManutencao like :dataEnvioManutencao	
				And a.tipo like :tipo				
				And a.idAparelhoStatus like :idAparelhoStatus	
				And idAparelho <> 1
			");

			$sql->execute(array(":marcaAparelho" => "%" . $marcaFiltro . "%", ":modeloAparelho" => "%" . $modeloFiltro . "%", ":imeiAparelho" => "%" . $imeiFiltro . "%", ":dataEnvioManutencao" => "%" . $envioFiltro . "%", ":tipo" =>  "%" . $tipoAparelho . "%", ":idAparelhoStatus" =>  "%" . $statusFiltro . "%"));
		} else {
			//Consulta para retornar linhas moveis de acordo com o filtro
			$sql = $pdo->prepare("
				Select *
				From ipsum_linhasmoveisaparelhos a
				Inner Join ipsum_linhasmoveisaparelhosstatus b On (a.idAparelhoStatus = b.idAparelhoStatus)
				Where 
					a.marcaAparelho like :marcaAparelho
				And a.modeloAparelho like :modeloAparelho
				And a.imeiAparelho like :imeiAparelho
				And a.dataEnvioManutencao like :dataEnvioManutencao		
				And idAparelho <> 1		
			");

			$sql->execute(array(":marcaAparelho" => "%" . $marcaFiltro . "%", ":modeloAparelho" => "%" . $modeloFiltro . "%", ":imeiAparelho" => "%" . $imeiFiltro . "%", ":dataEnvioManutencao" => "%" . $envioFiltro . "%"));
		}

	} else {
		//Consulta para retornar todos os aparelhos cadastrados
		$sql = $pdo->prepare("
			SELECT * FROM `ipsum_linhasmoveisaparelhos` a Inner Join ipsum_linhasmoveisaparelhosstatus b On (a.idAparelhoStatus = b.idAparelhoStatus) Where a.idAparelho <> 1
		");

		$sql->execute();
	}	

	$lista = '';

	$lista .= "<table>";
		$lista .= '<tr>';
			$lista .= '<td> Marca </td>';
			$lista .= '<td> Modelo </td>';
			$lista .= '<td> IMEI </td>';
			$lista .= '<td> Tipo </td>';
			$lista .= '<td> Status </td>';
			$lista .= '<td> Envio manutenção </td>';			
			$lista .= '<td> Acessórios </td>';
			$lista .= '<td> Observações </td>';
		$lista .= '</tr>';

		$i = 0;

		//Itera resultado e monta tabela para retorno
		while($aparelhos = $sql->fetch(PDO::FETCH_OBJ)){
			if($i % 2 == 0){
				$lista .= '<tr class = "par" id = '. $aparelhos->idAparelho .'>';
					$lista .= '<td>'. $aparelhos->marcaAparelho .'</td>';
					$lista .= '<td>'. $aparelhos->modeloAparelho .'</td>';
					$lista .= '<td>'. $aparelhos->imeiAparelho .'</td>';
					$lista .= '<td>'. $aparelhos->tipo .'</td>';
					$lista .= '<td>'. $aparelhos->statusAparelho .'</td>';
					$lista .= '<td>'. $aparelhos->dataEnvioManutencao .'</td>';					
					$lista .= '<td>'. $aparelhos->acessorios .'</td>';
					$lista .= '<td>'. $aparelhos->observacoes .'</td>';
				$lista .= '</tr>';
			} else {
				$lista .= '<tr class = "impar" id = '. $aparelhos->idAparelho .'>';
					$lista .= '<td>'. $aparelhos->marcaAparelho .'</td>';
					$lista .= '<td>'. $aparelhos->modeloAparelho .'</td>';
					$lista .= '<td>'. $aparelhos->imeiAparelho .'</td>';
					$lista .= '<td>'. $aparelhos->tipo .'</td>';
					$lista .= '<td>'. $aparelhos->statusAparelho .'</td>';
					$lista .= '<td>'. $aparelhos->dataEnvioManutencao .'</td>';					
					$lista .= '<td>'. $aparelhos->acessorios .'</td>';
					$lista .= '<td>'. $aparelhos->observacoes .'</td>';
				$lista .= '</tr>';
			}
			$i++;
		}

	$lista .= "</table>";

	echo $lista;

	$pdo = null;
?>