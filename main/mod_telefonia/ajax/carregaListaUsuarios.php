<?php
	include("../../../conf/conn.php");

	if($_POST['op'] == 'filtro'){
		//Recebe dados para filtrar
		$nomeFiltro = $_POST['nomeFiltro'];
		$telefoneFiltro = $_POST['telefoneFiltro'];
		$celularFiltro = $_POST['celularFiltro'];
		$enderecoFiltro = $_POST['enderecoFiltro'];
		$rgFiltro = $_POST['rgFiltro'];
		$cpfFiltro = $_POST['cpfFiltro'];
		$profissaoFiltro = $_POST['profissaoFiltro']		;

		//Consulta para retornar usuários de acordo com o filtro
		$sql = $pdo->prepare("
			Select * 
			From ipsum_usuarioslinhamoveis
			Where 
				nome like :nome
			And telefone like :telefone
			And celular like :celular
			And endereco like :endereco
			And cpf like :cpf
			And rg like :rg
			And profissao like :profissao
			And idUsuarioMovel <> 1
		");

		$sql->execute(array(":nome" => "%" . $nomeFiltro . "%", ":telefone" => "%" . $telefoneFiltro . "%", ":celular" => "%" . $celularFiltro . "%", ":endereco" => "%" . $enderecoFiltro . "%", ":cpf" => "%" . $cpfFiltro . "%", ":rg" => "%" . $rgFiltro . "%", ":profissao" => "%" . $profissaoFiltro . "%"));
	} else{
		//Consulta para retornar todos os usuarios
		$sql = $pdo->prepare("Select * From ipsum_usuarioslinhamoveis Where idUsuarioMovel <> 1");

		$sql->execute();
	}	

	$lista = '';

	$lista .= "<table>";
		$lista .= '<tr>';
			$lista .= '<td> Nome </td>';
			$lista .= '<td> Telefone </td>';
			$lista .= '<td> Celular </td>';
			//$lista .= '<td> Email </td>';
			$lista .= '<td> Endereço </td>';
			$lista .= '<td> RG </td>';		
			$lista .= '<td> CPF </td>';		
			$lista .= '<td> Profissão </td>';			
			$lista .= '<td> Observações </td>';
		$lista .= '</tr>';

		$i = 0;

		//Itera resultado e monta tabela para retorno
		while($usuarios = $sql->fetch(PDO::FETCH_OBJ)){
			if($i % 2 == 0){
				$lista .= '<tr class = "par" id = '. $usuarios->idUsuarioMovel .'>';
					$lista .= '<td>'. $usuarios->nome .'</td>';
					$lista .= '<td>'. $usuarios->telefone .'</td>';
					$lista .= '<td>'. $usuarios->celular .'</td>';
					//$lista .= '<td>'. $usuarios->email .'</td>';
					$lista .= '<td>'. $usuarios->endereco .'</td>';
					$lista .= '<td>'. $usuarios->rg .'</td>';
					$lista .= '<td>'. $usuarios->cpf .'</td>';
					$lista .= '<td>'. $usuarios->profissao .'</td>';
					$lista .= '<td>'. $usuarios->observacoes .'</td>';
				$lista .= '</tr>';
			} else {
				$lista .= '<tr class = "impar" id = '. $usuarios->idUsuarioMovel .'>';
					$lista .= '<td>'. $usuarios->nome .'</td>';
					$lista .= '<td>'. $usuarios->telefone .'</td>';
					$lista .= '<td>'. $usuarios->celular .'</td>';
					//$lista .= '<td>'. $usuarios->email .'</td>';
					$lista .= '<td>'. $usuarios->endereco .'</td>';
					$lista .= '<td>'. $usuarios->rg .'</td>';
					$lista .= '<td>'. $usuarios->cpf .'</td>';
					$lista .= '<td>'. $usuarios->profissao .'</td>';
					$lista .= '<td>'. $usuarios->observacoes .'</td>';
				$lista .= '</tr>';
			}
			$i++;
		}

	$lista .= "</table>";

	echo $lista;

	$pdo = null;
?>