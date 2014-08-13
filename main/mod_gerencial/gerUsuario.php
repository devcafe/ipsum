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
					<input name="telefoneFiltro" id="telefoneFiltro" placeholder="Telefone" type="text">
					<input name="celularFiltro" id="celularFiltro" placeholder="Celular" type="text">
					<input name="profissaoFiltro" id="profissaoFiltro" placeholder="Profissão" type="text">
					<!--<input type = "text" name = "emailFiltro" id = "emailFiltro" placeholder = "Email">-->
				</div>
				<div class="filtro02">
					<input name="enderecoFiltro" id="enderecoFiltro" placeholder="Endereço" type="text">
					<input name="rgFiltro" id="rgFiltro" placeholder="RG" type="text">
					<input name="cpfFiltro" id="cpfFiltro" placeholder="CPF" type="text">
					<!--<input type = "text" name = "empresaAcaoFiltro" id = "empresaAcaoFiltro" placeholder = "Empresa/Ação">-->
				</div>
			</form>
		</div>
		<div class="delete" id="delete"> <img src="../main/resources/images/delete.png"> </div>
		<div class="btnFiltrar" id="btnFiltrar"> <img src="../main/resources/images/filter.png" width="20"> </div>
	</div>

	<div id="listaUsuarios"></div>
	
</div>