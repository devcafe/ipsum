<?php
	include("../../../conf/conn.php");

	if($_POST['op'] == 'filtro'){
		//Recebe dados para filtrar
		$nomeFantasiaFiltro = $_POST['nomeFantasiaFiltro'];
		$responsavelNomeFiltro = $_POST['responsavelNomeFiltro'];
		$responsavelTelFiltro = $_POST['responsavelTelFiltro'];
		$responsavelEmailFiltro = $_POST['responsavelEmailFiltro'];
		$cnpjFiltro = $_POST['cnpjFiltro'];
		$razaoFiltro = $_POST['razaoFiltro'];
		$enderecoFiltro = $_POST['enderecoFiltro'];

		//Consulta para retornar empresas de acordo com o filtro
		$sql = $pdo->prepare("
			Select * 
			From ipsum_linhasmoveisempresas 
			Where 
				nomeEmpresa like :nomeEmpresa
			And nomeContatoResponsavel like :nomeContatoResponsavel
			And telContatoResponsavel like :telContatoResponsavel
			And emailContatoResponsavel like :emailContatoResponsavel
			And cnpj like :cnpj
			And razaoSocial like :razaoSocial
			And endereco like :endereco
			And idEmpresa <> 1
		");

		$sql->execute(array(":nomeEmpresa" => "%" . $nomeFantasiaFiltro . "%", ":nomeContatoResponsavel" => "%" . $responsavelNomeFiltro . "%", ":telContatoResponsavel" => "%" . $responsavelTelFiltro . "%", ":emailContatoResponsavel" => "%" . $responsavelEmailFiltro . "%", ":cnpj" => "%" . $cnpjFiltro . "%", ":razaoSocial" => "%" . $razaoFiltro . "%", ":endereco" => "%" . $enderecoFiltro . "%"));
	} else {
		//Consulta para retornar todas as empresas
		$sql = $pdo->prepare("Select * From ipsum_linhasmoveisempresas Where idEmpresa <> 1");

		$sql->execute();
	}

	

	$lista = '';

	$lista .= "<table>";
		$lista .= '<tr>';
			$lista .= '<td> Nome Fantasia </td>';
			$lista .= '<td> Contato Responsável </td>';
			$lista .= '<td> Tel Responsável </td>';
			$lista .= '<td> Email Responsável </td>';
			$lista .= '<td> CNPJ </td>';
			$lista .= '<td> Razão Social </td>';
			$lista .= '<td> Endereço </td>';
			$lista .= '<td> Observações </td>';
		$lista .= '</tr>';

		$i = 0;

		//Itera resultado e monta tabela para retorno
		while($empresas = $sql->fetch(PDO::FETCH_OBJ)){
			if($i % 2 == 0){
				$lista .= '<tr class = "par" id = '. $empresas->idEmpresa .'>';
					$lista .= '<td>'. $empresas->nomeEmpresa .'</td>';
					$lista .= '<td>'. $empresas->nomeContatoResponsavel .'</td>';
					$lista .= '<td>'. $empresas->telContatoResponsavel .'</td>';
					$lista .= '<td>'. $empresas->emailContatoResponsavel .'</td>';
					$lista .= '<td>'. $empresas->cnpj .'</td>';
					$lista .= '<td>'. $empresas->razaoFiltroSocial .'</td>';
					$lista .= '<td>'. $empresas->endereco .'</td>';
					$lista .= '<td>'. $empresas->observacoes .'</td>';
				$lista .= '</tr>';
			} else {
				$lista .= '<tr class = "impar" id = '. $empresas->idEmpresa .'>';
					$lista .= '<td>'. $empresas->nomeEmpresa .'</td>';
					$lista .= '<td>'. $empresas->nomeContatoResponsavel .'</td>';
					$lista .= '<td>'. $empresas->telContatoResponsavel .'</td>';
					$lista .= '<td>'. $empresas->emailContatoResponsavel .'</td>';
					$lista .= '<td>'. $empresas->cnpj .'</td>';
					$lista .= '<td>'. $empresas->razaoSocial .'</td>';
					$lista .= '<td>'. $empresas->endereco .'</td>';
					$lista .= '<td>'. $empresas->observacoes .'</td>';
				$lista .= '</tr>';
			}
			$i++;
		}

	$lista .= "</table>";

	echo $lista;
?>