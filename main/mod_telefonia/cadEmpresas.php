<!-- Javascript -->
<script src="mod_telefonia/resources/js/cadEmpresas.js"></script>

<!-- CSS -->
<link rel="stylesheet" href = "mod_telefonia/resources/css/cadEmpresas.css">

<div class = "formInner">
	<form method = "post">
		<legend> Cadastrar Empresas </legend>
		<table>
			<!-- Linha 1 -->
			<tr>
				<td> <label for = "nomeEmpresa"> Empresa/Acao: </label> </td>
				<td colspan = "4"> <input type = "text" name = "nomeEmpresa" id = "nomeEmpresa"> </td>
			</tr>

			<!-- Linha fake -->
			<tr class = "fakeRow"> </tr>

			<!-- Linha 2 -->
			<tr>
				<td> <label for = "nomeContatoResponsavel"> Nome Responsavel: </label> </td>
				<td colspan = "4"> <input type = "text" name = "nomeContatoResponsavel" id = "nomeContatoResponsavel"> </td>
			</tr>

			<!-- Linha fake -->
			<tr class = "fakeRow"> </tr>

			<!-- Linha 3 -->
			<tr>
				<td> <label for = "emailContatoResponsavel"> Email Responsável: </label> </td>
				<td> <input type = "text" name = "emailContatoResponsavel" id = "emailContatoResponsavel"> </td>

				<td> <label for = "telContatoResponsavel"> Tel Responsável: </label> </td>
				<td> <input type = "text" name = "telContatoResponsavel" id = "telContatoResponsavel"> </td>
			</tr>

			<!-- Linha fake -->
			<tr class = "fakeRow"> </tr>

			<!-- Linha 4 -->
			<tr>
				<td> <label for = "cnpj"> CNPJ: </label> </td>
				<td> <input type = "text" name = "cnpj" id = "cnpj"> </td>
			</tr>
			
			<!-- Linha fake -->
			<tr class = "fakeRow"> </tr>

			<!-- Linha 5 -->
			<tr>
				<td> <label for = "razaoSocial"> Razão Social: </label> </td>
				<td colspan = "4"> <input type = "text" name = "razaoSocial" id = "razaoSocial"> </td>
			</tr>

			<!-- Linha fake -->
			<tr class = "fakeRow"> </tr>

			<!-- Linha 6 -->
			<tr>
				<td> <label for = "endereco"> Endereço:: </label> </td>
				<td colspan = "4"> <input type = "text" name = "endereco" id = "endereco"> </td>
			</tr>

			<!-- Linha fake -->
			<tr class = "fakeRow"> </tr>

			<!-- Linha 7 -->
			<tr>
				<td> <label for = "observacoes"> Observações: </label> </td>
				<td colspan = "4"> <textarea name = "observacoes" id = "observacoes"> </textarea> </td>				
			</tr>

			<!-- Linha fake -->
			<tr class = "fakeRow"> </tr>

			<!-- Linha 8 -->
			<tr>
				<td colspan = "4"> <input type = "button" name = "cadastrar" value = "Cadastrar" id = "cadEmpresa"> </td>				
			</tr>
		</table>
	</form>
</div>