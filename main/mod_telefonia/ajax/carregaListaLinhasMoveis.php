<?php
	include("../../../conf/conn.php");

	//Caso seja feito um filtro, executa consulta de acordo com dados fornecidos, caso contrário
	//retorna todas as linhas
	if($_POST['op'] == 'filtro'){

		//Recebe dados para filtrar
		$linhaFiltro = $_POST['linhaFiltro'];
		$planoFiltro = $_POST['planoFiltro'];
		$usuarioFiltro = $_POST['usuarioFiltro'];
		$empresaAcaoFiltro = $_POST['empresaAcaoFiltro'];
		$aparelhoFiltro = $_POST['aparelhoFiltro'];
		$iccidFiltro = $_POST['iccidFiltro'];
		$statusFiltro = $_POST['statusFiltro'];
		$operadoraFiltro = $_POST['operadoraFiltro'];

		//Condições para filtros mudam de acordo com valor do select no evento "change"
		//essas condições são necessários pois estamos trabalhando com "keyup" e "change" ao mesmo tempo
		if($statusFiltro != '' && $operadoraFiltro == ''){
			//Consulta para retornar linhas moveis de acordo com o filtro
			$sql = $pdo->prepare("
				Select *
				From ipsum_linhasmoveis a 
				Inner Join ipsum_linhasmoveisempresas b On (a.idEmpresa = b.idEmpresa)
				Inner Join ipsum_usuarioslinhamoveis c On (a.idUsuarioMovel = c.idUsuarioMovel)
				Inner Join ipsum_linhasmoveisaparelhos d On (a.idAparelho = d.idAparelho)
				Inner Join ipsum_linhasmoveislinhasstatus e On (a.idLinhaStatus = e.idLinhaStatus)
				Inner Join ipsum_linhasmoveisoperadoras f On (a.operadora = f.idOperadora)
				Where 
					a.numLinha like :numLinha
				And a.plano like :plano
				And c.nome like :nome
				And b.nomeEmpresa like :idEmpresa
				And d.marcaAparelho like :idAparelho
				And a.iccid like :iccid
				And a.`idLinhaStatus` = :idLinhaStatus
			");

			$sql->execute(array(":numLinha" => "%" . $linhaFiltro . "%", ":plano" => "%" . $planoFiltro . "%", ":nome" => "%" . $usuarioFiltro . "%", ":idEmpresa" => "%" . $empresaAcaoFiltro . "%", ":idAparelho" => "%" . $aparelhoFiltro . "%", ":iccid" => "%" . $iccidFiltro . "%", ":idLinhaStatus" => $statusFiltro));
		} elseif($statusFiltro == '' && $operadoraFiltro != ''){
			//Consulta para retornar linhas moveis de acordo com o filtro
			$sql = $pdo->prepare("
				Select *
				From ipsum_linhasmoveis a 
				Inner Join ipsum_linhasmoveisempresas b On (a.idEmpresa = b.idEmpresa)
				Inner Join ipsum_usuarioslinhamoveis c On (a.idUsuarioMovel = c.idUsuarioMovel)
				Inner Join ipsum_linhasmoveisaparelhos d On (a.idAparelho = d.idAparelho)
				Inner Join ipsum_linhasmoveislinhasstatus e On (a.idLinhaStatus = e.idLinhaStatus)
				Inner Join ipsum_linhasmoveisoperadoras f On (a.operadora = f.idOperadora)
				Where 
					a.numLinha like :numLinha
				And a.plano like :plano
				And c.nome like :nome
				And b.nomeEmpresa like :idEmpresa
				And d.marcaAparelho like :idAparelho
				And a.iccid like :iccid
				And a.`operadora` = :operadora
			");

			$sql->execute(array(":numLinha" => "%" . $linhaFiltro . "%", ":plano" => "%" . $planoFiltro . "%", ":nome" => "%" . $usuarioFiltro . "%", ":idEmpresa" => "%" . $empresaAcaoFiltro . "%", ":idAparelho" => "%" . $aparelhoFiltro . "%", ":iccid" => "%" . $iccidFiltro . "%", ":operadora" => $operadoraFiltro));
		} elseif($statusFiltro != '' && $operadoraFiltro != '') {
			//Consulta para retornar linhas moveis de acordo com o filtro
			$sql = $pdo->prepare("
				Select *
				From ipsum_linhasmoveis a 
				Inner Join ipsum_linhasmoveisempresas b On (a.idEmpresa = b.idEmpresa)
				Inner Join ipsum_usuarioslinhamoveis c On (a.idUsuarioMovel = c.idUsuarioMovel)
				Inner Join ipsum_linhasmoveisaparelhos d On (a.idAparelho = d.idAparelho)
				Inner Join ipsum_linhasmoveislinhasstatus e On (a.idLinhaStatus = e.idLinhaStatus)
				Inner Join ipsum_linhasmoveisoperadoras f On (a.operadora = f.idOperadora)
				Where 
					a.numLinha like :numLinha
				And a.plano like :plano
				And c.nome like :nome
				And b.nomeEmpresa like :idEmpresa
				And d.marcaAparelho like :idAparelho
				And a.iccid like :iccid
				And a.`idLinhaStatus` = :idLinhaStatus
				And a.`operadora` = :operadora
			");

			$sql->execute(array(":numLinha" => "%" . $linhaFiltro . "%", ":plano" => "%" . $planoFiltro . "%", ":nome" => "%" . $usuarioFiltro . "%", ":idEmpresa" => "%" . $empresaAcaoFiltro . "%", ":idAparelho" => "%" . $aparelhoFiltro . "%", ":iccid" => "%" . $iccidFiltro . "%", ":idLinhaStatus" => $statusFiltro, ":operadora" => $operadoraFiltro));
		} else {
			//Consulta para retornar linhas moveis de acordo com o filtro
			$sql = $pdo->prepare("
				Select *
				From ipsum_linhasmoveis a 
				Inner Join ipsum_linhasmoveisempresas b On (a.idEmpresa = b.idEmpresa)
				Inner Join ipsum_usuarioslinhamoveis c On (a.idUsuarioMovel = c.idUsuarioMovel)
				Inner Join ipsum_linhasmoveisaparelhos d On (a.idAparelho = d.idAparelho)
				Inner Join ipsum_linhasmoveislinhasstatus e On (a.idLinhaStatus = e.idLinhaStatus)
				Inner Join ipsum_linhasmoveisoperadoras f On (a.operadora = f.idOperadora)
				Where 
					a.numLinha like :numLinha
				And a.plano like :plano
				And c.nome like :nome
				And b.nomeEmpresa like :idEmpresa
				And d.marcaAparelho like :idAparelho
				And a.iccid like :iccid
			");

			$sql->execute(array(":numLinha" => "%" . $linhaFiltro . "%", ":plano" => "%" . $planoFiltro . "%", ":nome" => "%" . $usuarioFiltro . "%", ":idEmpresa" => "%" . $empresaAcaoFiltro . "%", ":idAparelho" => "%" . $aparelhoFiltro . "%", ":iccid" => "%" . $iccidFiltro . "%"));
		}

	} else {
		//Consulta para retornar todas as linhas moveis cadastradas
		$sql = $pdo->prepare("
			Select a.idLinha, a.numLinha, a.plano, c.nome, b.nomeEmpresa, d.modeloAparelho, d.marcaAparelho, d.imeiAparelho, a.iccid, a.`idLinhaStatus`, a.operadora, a.observacoes, e.statusLinha, f.operadoraNome
			From ipsum_linhasmoveis a 
			Inner Join ipsum_linhasmoveisempresas b On (a.idEmpresa = b.idEmpresa)
			Inner Join ipsum_usuarioslinhamoveis c On (a.idUsuarioMovel = c.idUsuarioMovel)
			Inner Join ipsum_linhasmoveisaparelhos d On (a.idAparelho = d.idAparelho)
			Inner Join ipsum_linhasmoveislinhasstatus e On (a.idLinhaStatus = e.idLinhaStatus)
			Inner Join ipsum_linhasmoveisoperadoras f On (a.operadora = f.idOperadora)
		");

		$sql->execute();
	}	

	$lista = '';

	$lista .= "<table>";
		$lista .= '<tr>';
			$lista .= '<td> Número </td>';
			$lista .= '<td> Plano </td>';
			$lista .= '<td> Usuário </td>';
			$lista .= '<td> Empresa/Ação </td>';
			$lista .= '<td> Aparelho </td>';
			$lista .= '<td> ICCID </td>';
			$lista .= '<td> Status </td>';
			$lista .= '<td> Operadora </td>';
			$lista .= '<td> Observações </td>';
		$lista .= '</tr>';

		$i = 0;

		//Itera resultado e monta tabela para retorno
		while($linhasMoveis = $sql->fetch(PDO::FETCH_OBJ)){
			if($i % 2 == 0){
				$lista .= '<tr class = "par" id = '. $linhasMoveis->idLinha .'>';
					$lista .= '<td>'. $linhasMoveis->numLinha .'</td>';
					$lista .= '<td>'. $linhasMoveis->plano .'</td>';
					$lista .= '<td>'. $linhasMoveis->nome .'</td>';
					$lista .= '<td>'. $linhasMoveis->nomeEmpresa .'</td>';
					$lista .= '<td>'. $linhasMoveis->marcaAparelho .'</td>';
					$lista .= '<td>'. $linhasMoveis->iccid .'</td>';
					$lista .= '<td>'. $linhasMoveis->statusLinha .'</td>';
					$lista .= '<td>'. $linhasMoveis->operadoraNome .'</td>';
					$lista .= '<td>'. $linhasMoveis->observacoes .'</td>';
				$lista .= '</tr>';
			} else {
				$lista .= '<tr class = "impar" id = '. $linhasMoveis->idLinha .'>';
					$lista .= '<td>'. $linhasMoveis->numLinha .'</td>';
					$lista .= '<td>'. $linhasMoveis->plano .'</td>';
					$lista .= '<td>'. $linhasMoveis->nome .'</td>';
					$lista .= '<td>'. $linhasMoveis->nomeEmpresa .'</td>';
					$lista .= '<td>'. $linhasMoveis->marcaAparelho .'</td>';
					$lista .= '<td>'. $linhasMoveis->iccid .'</td>';
					$lista .= '<td>'. $linhasMoveis->statusLinha .'</td>';
					$lista .= '<td>'. $linhasMoveis->operadoraNome .'</td>';
					$lista .= '<td>'. $linhasMoveis->observacoes .'</td>';
				$lista .= '</tr>';
			}
			$i++;
		}

	$lista .= "</table>";

	echo $lista;

	$pdo = null;
?>