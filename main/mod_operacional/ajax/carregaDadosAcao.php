<?php
	include("../../../conf/conn.php");

	$sql = $pdo->prepare("Select * From ipsum_operacionalacao Where idAcao = ?");
	$sql->execute(array($_POST['id']));

	$res = $sql->fetch(PDO::FETCH_OBJ);

	$lista = '
		<table>
			<tr>
				<td> <label for = "nomeAcaoAlt"> Ação: </td>
				<td> <input type = "text" name = "nomeAcaoAlt" id = "nomeAcaoAlt" value = '. $res->nomeAcao .'> </td>
			</tr>

			<tr class = "fakeRow"> </tr>

			<tr>
				<td> <label for = "colaboradoresAlt"> Pesquisar colaboradores: </td>
				<td> <input type = "text" name = "colaboradoresAlt" id = "colaboradoresAlt"> </td>
			</tr>

			<tr class = "fakeRow"> </tr>
		</table>

		<table id = "colaboradoresTableAlt">
			<tr>
				<td> <b> Colaboradores </b> </td>
			</tr>

			<tr class = "rowLine"><td colspan = "10"> </td> </tr>

			<tr class = "listaColaboradoresAcaoAlt"> 

			</tr>		
			<tr class = "fakeRow"> </tr>
			<tr class = "fakeRow"> </tr>	
		</table>

		<table class = "colaboradoresToSaveAlt">
			<tr>
				<td> <b> Colaboradores na ação: </b></td>
			</tr>
		
			<tr class = "rowLine"><td colspan = "10"> </td> </tr>			
		</table>

		<table>
			<tr class = "fakeRow"> </tr>

			<tr>
				<td> <input type = "button" name = "alterarAcao" id = "alterarAcao" value = "Alterar ação"> </td>
			</tr>
		</table>';

	echo $lista;

?>