<?php require("../../conf/conn.php"); ?>

<!-- Javascript -->
<script src="mod_telefonia/resources/js/gerUsuarios.js"></script>

<!-- CSS -->
<link rel="stylesheet" href = "mod_telefonia/resources/css/gerUsuarios.css">

<div class = "formInner">
	<legend> Gerenciar usuários </legend>
	<div class = "painel">
		<div class = "filtro">
			<form method = "post">
				<div class = "filtro01">
					<input type = "text" name = "nomeFiltro" id = "nomeFiltro" placeholder = "Nome">
					<input type = "text" name = "telefoneFiltro" id = "telefoneFiltro" placeholder = "Telefone">
					<input type = "text" name = "celularFiltro" id = "celularFiltro" placeholder = "Celular">
					<input type = "text" name = "profissaoFiltro" id = "profissaoFiltro" placeholder = "Profissão">
					<!--<input type = "text" name = "emailFiltro" id = "emailFiltro" placeholder = "Email">-->
				</div>
				<div class = "filtro02">
					<input type = "text" name = "enderecoFiltro" id = "enderecoFiltro" placeholder = "Endereço">
					<input type = "text" name = "rgFiltro" id = "rgFiltro" placeholder = "RG">
					<input type = "text" name = "cpfFiltro" id = "cpfFiltro" placeholder = "CPF">
					<!--<input type = "text" name = "empresaAcaoFiltro" id = "empresaAcaoFiltro" placeholder = "Empresa/Ação">-->
				</div>
			</form>
		</div>
		<div class = "delete" id = "delete"> <img src = "../main/resources/images/delete.png" > </div>
		<div class = "btnFiltrar" id = "btnFiltrar"> <img src = "../main/resources/images/filter.png" width = "20" > </div>
	</div>
	<div id = "listaUsuarios">

	</div>
</div>

<div id = "alterarItemModal" title = "Alterar Usuário">
	<form method = "post">
		<input type = "hidden" id = "idUsuario">

		<label for = "nomeUsuario"> Nome: </label>
		<input type = "text" name = "nomeUsuario" id = "nomeUsuario">

		<label for = "telefone"> Telefone: </label>
		<input type = "text" name = "telefone" id = "telefone">

		<label for = "celular"> Celular: </label>
		<input type = "text" name = "celular" id = "celular">

		<!--<label for = "email"> Email: </label>
		<input type = "text" name = "email" id = "email">-->

		<label for = "endereco"> Endereço: </label>
		<input type = "text" name = "endereco" id = "endereco"> 

		<label for = "rg"> RG: </label>
		<input type = "text" name = "rg" id = "rg"> 

		<label for = "cpf"> CPF: </label>
		<input type = "text" name = "cpf" id = "cpf"> 

		<label for = "profissao"> Profissão: </label>
		<input type = "text" name = "profissao" id = "profissao"> 

		<!--<div class = "fullInput"> <a href = "#" id = "selecionaEmpresaAcao"> Selecionar empresa/ação </a> </div>
		<input type = "hidden" id = "empresaAcao" value = "">
		<input type = "text" id = "showEmpresaAcao" disabled>-->

		<label for = "observacoes"> Observações: </label>
		<textarea name = "observacoes" id = "observacoes"> </textarea>

		<input type = "button" name = "cadastrar" value = "Gravar" id = "cadUsuario">
	</form>
</div>