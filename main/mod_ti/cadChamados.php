<?php 
	require("../../conf/conn.php");
	include("../../actions/security.php"); 
?>

<!-- Javascript -->
<script src="mod_ti/resources/js/cadChamados.js"></script>

<!-- CSS -->
<link rel="stylesheet" href = "mod_ti/resources/css/cadChamados.css">

<div class = "formInner">
	<form method = "post" id = "formCadChamado">
		<form method = "post" id = "formCadAparelho">
		<legend>  Abrir Chamado </legend>
		<table>
			<!-- Linha 1 -->
			<tr>
				<td> <label for = "breveDescricaoChamado"> Breve descrição: </label> </td>
				<td> <input type = "text" name = "breveDescricaoChamado" id = "breveDescricaoChamado"> </td>

				<td> <label for = "solicitante"> Solicitante: </label> </td>
				<td> <input type = "text" name = "solicitante" id = "solicitante" value = "<?php echo $_SESSION['nomeUsuario'] ?>"> </td>

				<td> <label for = "departamento"> Departamento: </label> </td>
				<td> <input type = "text" name = "departamento" id = "departamento"> </td>

				<td> <label for = "prioridade"> Prioridade: </label> </td>
				<td>
					<select name = "prioridade" id = "prioridade">
						<option value = "Critica"> Critica </option>
						<option value = "Alta"> Alta </option>
						<option value = "Media"> Media </option>
						<option value = "Baixa"> Baixa </option>
					</select>
				</td>
				<input type = "hidden" value = "<?php echo $_SESSION['idUsuario']; ?>" name = "idUsuarioAbertura" id = "idUsuarioAbertura">
			</tr>

			<!-- Linha fake -->
			<tr class = "fakeRow"> </tr>

			<!-- Linha 2 -->
			<tr>
				<td> <label for = "status"> Status: </label> </td>
				<td>
					<select name = "status" id = "status">
						<option value = "Aberto"> Aberto </option>
						<option value = "Fechado"> Fechado </option>
						<option value = "Aguardando"> Aguardando </option>
						<option value = "Analise"> Em analise </option>
					</select>	
				</td>
				<input type = "hidden" value = "<?php echo $_SESSION['idUsuario']; ?>" name = "idUsuarioAbertura" id = "idUsuarioAbertura">
			</tr>

			<!-- Linha fake -->
			<tr class = "fakeRow"> </tr>

			<!-- Linha 3 -->
			<tr>
				<td> <label for = "descricaoChamado"> Descrição: </label> </td>
				<td colspan = "8"> <textarea name = "descricaoChamado" id = "descricaoChamado"> </textarea> </td>
			</tr>

			<!-- Linha fake -->
			<tr class = "fakeRow"> </tr>

			<!-- Linha 4 -->
			<tr>
				<td colspan = "8"> <input type = "button" name = "cadastrar" value = "Abrir chamado" id = "cadChamado"> </td>
			</tr>
		</table>
	</form>
</div>