<?php 
	require("../../conf/conn.php");
	include("../../actions/security.php"); 
?>
<!-- Javascript -->
<script src="mod_gerencial/resources/js/gerUsuario.js"></script>

<!-- CSS -->
<link rel="stylesheet" href = "mod_gerencial/resources/css/gerUsuario.css">

<div class = "formInner">
	<legend> Gerenciar usuários </legend>
	<div class="painel">
		<div style="display: none;" class="filtro">
			<form method="post">
				<div class="filtro01">
					<input name="nomeFiltro" id="nomeFiltro" placeholder="Nome" type="text">
					<input name="usuárioFiltro" id="telefoneFiltro" placeholder="Telefone" type="text">
					<input name="celularFiltro" id="celularFiltro" placeholder="Celular" type="text">
					<input name="profissaoFiltro" id="profissaoFiltro" placeholder="Profissão" type="text">
				</div>				
			</form>
		</div>
		<div class="delete" id="delete"> <img src="../main/resources/images/delete.png"> </div>
		<div class="btnFiltrar" id="btnFiltrar"> <img src="../main/resources/images/filter.png" width="20"> </div>
	</div>

	<div id="listaUsuarios">
	</div>
	
</div>

<div id = "alterarItemModal" title = "Alterar Usuario">
	<form method = "post">
		<input type = "hidden" id = "id">

		<label for = "primeiroNome"> Primeiro Nome: </label>
		<input type = "text" name = "primeiroNome" id = "primeiroNome">
		
		<label for = "sobrenome"> Sobrenome: </label>
		<input type = "text" name = "sobrenome" id = "sobrenome">

		<label for = "email"> Email: </label>
		<input type = "text" name = "email" id = "email">

		<label for = "departamento"> Departamento </label>
		<input type = "text" name = "departamento" id = "departamento">

		<label for = "empresa"> Empresa: </label>
		<input type = "text" name = "empresa" id = "empresa">

		<label for = "cnpj"> CNPJ: </label>
		<input type = "text" name = "cnpj" id = "cnpj">

		<label for = "usuario"> Usuario: </label>
		<input type = "text" name = "usuario" id = "usuario">

		<label for = "senha"> Senha: </label>
		<input type = "password" name = "senha" id = "senha">

		<label for = "acessos"> Acessos: </label>
		<input type = "text" name = "acessos" id = "acessos">

		<input type = "button" name = "gravar" value = "Gravar" id = "gravar">		
		
	</form>
</div>