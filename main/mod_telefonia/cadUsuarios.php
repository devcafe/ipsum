<?php require("../../conf/conn.php"); ?>

<!-- Javascript -->
<script src="mod_telefonia/resources/js/cadUsuarios.js"></script>

<!-- CSS -->
<link rel="stylesheet" href = "mod_telefonia/resources/css/cadUsuarios.css">

<div class = "formInner">
	<form method = "post">
		<legend> Cadastrar usuários </legend>
		<table>
			<!-- Linha 1 -->
			<tr>
				<td> <label for = "nomeUsuario"> Nome: </label> </td>
				<td> <input type = "text" name = "nomeUsuario" id = "nomeUsuario"> </td>

				<td> <label for = "telefone"> Telefone: </label> </td>
				<td> <input type = "text" name = "telefone" id = "telefone"> </td>

				<td> <label for = "celular"> Celular: </label> </td>
				<td> <input type = "text" name = "celular" id = "celular"> </td>

				<td> <label for = "cpf"> CPF: </label> </td>
				<td> <input type = "text" name = "cpf" id = "cpf"> </td>
			</tr>

			<!-- Linha fake -->
			<tr class = "fakeRow"> </tr>

			<!-- Linha 2 -->
			<tr>
				<td> <label for = "endereco"> Endereço: </label> </td>
				<td colspan = "3"> <input type = "text" name = "endereco" id = "endereco"> </td>

				<td> <label for = "rg"> RG: </label> </td>
				<td> <input type = "text" name = "rg" id = "rg">  </td>

				<td> <label for = "profissao"> Profissão: </label> </td>
				<td> <input type = "text" name = "celular" id = "celular"> </td>
			</tr>

			<!-- Linha fake -->
			<tr class = "fakeRow"> </tr>

			<!-- Linha 3 -->
			<tr>
				<td> <label for = "observacoes"> Observações: </label> </td>
				<td colspan = "7"> <textarea name = "observacoes" id = "observacoes"> </textarea> </td>
			</tr>

			<!-- Linha fake -->
			<tr class = "fakeRow"> </tr>

			<!-- Linha 4 -->
			<tr>
				<td colspan = "8"> <input type = "button" name = "cadastrar" value = "Cadastrar" id = "cadUsuario"> </td>
			</tr>

		</table>
	</form>
</div>