<?php
	include("../../../conf/conn.php");


	// Consulta para retornar todos os usuários

	$sql = $pdo->prepare("Select * From ipsum_usuarios");
	$sql->execute();
	$lista = '';
	$lista .= '<table>';
		$lista .= '<tr>';
			$lista .= '<td> test</td>';
			$lista .= '<td> Nome </td>';
			$lista .= '<td> Usuário</td>';
			$lista .= '<td> Departamento</td>';
			$lista .= '<td>	Email</td>';
			$lista .= '<td> Empresa</td>';
			$lista .= '<td> Data de Cadastro</td>';
		$lista .= '</tr>';

		$i = 0;

	while($usuarios = $sql->fetch(PDO::FETCH_OBJ)){
		if($i % 2 == 0){
			$lista .= '<tr class = "par" id = '. $usuarios->id .'>';
				$lista .= '<td><input type = "checkbox"></td>';
				$lista .= '<td>'. $usuarios->nome . ' '. $usuarios->sobrenome .'</td>';
				$lista .= '<td>'. $usuarios->departamento .'</td>';
				$lista .= '<td>'. $usuarios->email .'</td>';
				$lista .= '<td>'. $usuarios->empresa .'</td>';
				$lista .= '<td>'. $usuarios->usuario .'</td>';
				$lista .= '<td>'. $usuarios->dataCadastro .'</td>';
		} else {
			$lista .= '<tr class = "impar" id = '. $usuarios->id .'>';
				$lista .= '<td><input type = "checkbox"></td>';
				$lista .= '<td>'. $usuarios->nome . ' '. $usuarios->sobrenome .'</td>';
				$lista .= '<td>'. $usuarios->departamento .'</td>';
				$lista .= '<td>'. $usuarios->email .'</td>';
				$lista .= '<td>'. $usuarios->empresa .'</td>';
				$lista .= '<td>'. $usuarios->usuario .'</td>';
				$lista .= '<td>'. $usuarios->dataCadastro .'</td>';
		}
		$i++;
	}

	$lista .= '</table>';

	
	echo $lista;
