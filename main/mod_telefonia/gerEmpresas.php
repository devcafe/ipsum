<!-- Javascript -->
<script src="mod_telefonia/resources/js/gerEmpresas.js"></script>

<!-- CSS -->
<link rel="stylesheet" href = "mod_telefonia/resources/css/gerEmpresas.css">

<div class = "formInner">
	<legend> Gerenciar empresas </legend>
	<div class = "painel">
		<div class = "filtro">
			<form method = "post">
				<div class = "filtro01">
					<input type = "text" name = "nomeFantasiaFiltro" id = "nomeFantasiaFiltro" placeholder = "Nome Fantasia">
					<input type = "text" name = "responsavelNomeFiltro" id = "responsavelNomeFiltro" placeholder = "Nome do responsável">
					<input type = "text" name = "responsavelTelFiltro" id = "responsavelTelFiltro" placeholder = "Telefone do responsável">
					<input type = "text" name = "responsavelEmailFiltro" id = "responsavelEmailFiltro" placeholder = "Email do responsável">
					<input type = "text" name = "cnpjFiltro" id = "cnpjFiltro" placeholder = "CNPJ">
				</div>
				<div class = "filtro02">
					<input type = "text" name = "razaoFiltro" id = "razaoFiltro" placeholder = "Razão Social">
					<input type = "text" name = "enderecoFiltro" id = "enderecoFiltro" placeholder = "Endereço">
				</div>
			</form>
		</div>
		<div class = "delete" id = "delete"> <img src = "../main/resources/images/delete.png" > </div>
		<div class = "btnFiltrar" id = "btnFiltrar"> <img src = "../main/resources/images/filter.png" width = "20" > </div>
	</div>
	<div id = "listaEmpresas">

	</div>
</div>

<div id = "alterarItemModal" title = "Alterar Empresa">
	<form method = "post">
		<input type = "hidden" id = "idEmpresa">

		<label for = "nomeEmpresa"> Empresa/Acao: </label>
		<input type = "text" name = "nomeEmpresa" id = "nomeEmpresa">

		<label for = "nomeContatoResponsavel"> Nome Responsavel: </label>
		<input type = "text" name = "nomeContatoResponsavel" id = "nomeContatoResponsavel">

		<label for = "telContatoResponsavel"> Tel Responsável: </label>
		<input type = "text" name = "telContatoResponsavel" id = "telContatoResponsavel">

		<label for = "emailContatoResponsavel"> Email Responsável: </label>
		<input type = "text" name = "emailContatoResponsavel" id = "emailContatoResponsavel">

		<label for = "cnpj"> CNPJ: </label>
		<input type = "text" name = "cnpj" id = "cnpj"> 

		<label for = "razaoSocial"> Razão Social: </label>
		<input type = "text" name = "razaoSocial" id = "razaoSocial"> 

		<label for = "endereco"> Endereço:: </label>
		<input type = "text" name = "endereco" id = "endereco">

		<label for = "observacoes"> Observações: </label>
		<textarea name = "observacoes" id = "observacoes"> </textarea>

		<input type = "button" name = "gravar" value = "Gravar" id = "gravar">
	</form>
</div>
