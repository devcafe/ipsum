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

<!-- Modal  -->
<div id = "alterarItemModal" title = "Alterar Usuario">
	<form method = "post" id = "formModelAlterarUsuario">
		<input type = "hidden" id = "idMod" name = "idMod">

		<table id = "tableformModalEdition">

		<tr>
			<td><label for = "primeiroNomeMod"> Primeiro Nome: </label> </td>
			<td><label for = "sobrenomeMod"> Sobrenome: </label> </td>
		</tr>		
		<tr>			
			<td><input type = "text" name = "primeiroNomeMod" id = "primeiroNomeMod"> </td>
			<td><input type = "text" name = "sobrenomeMod" id = "sobrenomeMod"> </td>
		</tr>

		<tr>			
			<td><label for = "departamentoMod"> Departamento: </label> </td>
			<td><label for = "emailMod"> Email: </label> </td>
		</tr>
		<tr>			
			<td><input type = "text" name = "departamentoMod" id = "departamentoMod"> </td>
			<td><input type = "text" name = "emailMod" id = "emailMod"> </td>
		</tr>

		<tr>
			<td><label for = "empresaMod"> Empresa: </label> </td>
			<td><label for = "cnpjMod"> CNPJ: </label> </td>
		</tr>
		<tr>
			<td><input type = "text" name = "empresaMod" id = "empresaMod"> </td>			
			<td><input type = "text" name = "cnpjMod" id = "cnpjMod"> </td>
		</tr>

		<tr>
			<td><label for = "usuarioMod"> Usuario: </label> </td>
			<td><label for = "senhaMod"> Senha: </label> </td>
		</tr>
		<tr>
			<td><input type = "text" name = "usuarioMod" id = "usuarioMod"> </td>			
			<td><input type = "password" name = "senha" id = "senha"> </td>
		</tr>
	</table>
	<div id = 'teste'>
<!-- 
		
		<label for = "acessosMod"> Acessos: </label> </td>
		
		
		<input type = "text" name = "acessosMod" id = "acessosMod"> </td>
		

		<table>
			<td><input type = "button" name = "gravar" value = "Gravar" id = "gravar"> </td>		
		</table>
				<div id = "teste"> -->

					
		</div>
	</form>
</div>