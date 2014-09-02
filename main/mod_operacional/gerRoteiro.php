<?php require("../../conf/conn.php"); ?>

<!-- Javascript -->
<script src="mod_operacional/resources/js/gerRoteiro.js"></script>

<!-- CSS -->
<link rel="stylesheet" href = "mod_operacional/resources/css/gerRoteiro.css">

<div class = "formInner">
	<form method = "post">
		<legend> Criar Roteiro </legend>
		<!--<div class = "painel">
			<div class = "btnFiltrar" id = "btnFiltrar" title = "Filtrar"> <img src = "../main/resources/images/filter.png" width = "20" > </div>
		</div>-->
		<div id = "cadRoteiro">
			<div id = "selLoja">
				<!-- <a href = "#" id = ""> <img src = "../main/resources/images/addUser.png" width = "20" > </a> -->
				<a href = "#" id = "criarRoteiroBtn">  <img src = "../main/resources/images/operacional/script.png" width = "20" >  </a>
			</div>
			<div id = "colaboradorData">

				<table class = "theFirst">
					<tr>
						<td class = "idRoteiro"> Id roteiro </td>
						<td> Nome roteiro </td>
						<td> Ação </td>
						<td> Responsavel </td>
					</tr>
					<table id = "addDataUser">
						<a href = "#"  name = "geraCartaApresentacao"> Gerar carta </a>
					</table>
				</table>
			</div>
		</div>
	</form>
</div>

<!-- Modals -->

<div id ="criarRoteiroModal" class = "criarRoteiroModal" title = "Criar roteiros">
	<form method = "post" id = "criarRoteiro">
	
	<table>	
		<tr>
			<td><label for = "nomeRoteiro"> Nome do Roteiro: </label></td>
			<td><label for = "nomeAcao"> Nome da Ação: </label></td>
		</tr>
		<tr>	
			<td><input type = "text" name = "nomeRoteiro" id = "nomeRoteiro"></td>
			<td><input type = "text" name = "nomeAcao" id = "nomeAcao"></td>
		</tr>	
		<tr> 
			<td><label for = "nomeColaborador">Colaborador: </label></td>
		</tr>	
		<tr>
			<td id = 'nomeColaborador'>Selecione um colaborador...</td>
			<td><a href = "#" id = "selectColaBtn"> <img src = "../main/resources/images/addUser.png" width = "20" disabled></td>
		</tr>
		<tr>	
			<td><label for = "lojasRoteiro"> Lojas do roteiro: </label></td>			
		</tr>
		<tr>
			<td>Selecione as lojas para o roteiro</td>
			<td><a href = "#" id = "selectLojasBtn">  <img src = "../main/resources/images/operacional/addStores.png" width = "20" >  </a></td>
		</tr>		
	</table>	
	</form>



</div>
<!-- Calaboradores modal -->

<div id = "colaboradorModal" class = "modalColaboradores" title = "Colaboradores">
	<form method = "post" id = "colaboradoresForm">
		<label for = "toSearch"> Buscar: </label> <input type = "text" name = "toSearch" id = "toSearch">
		<input type="radio" name="buscaCampo" value="matricula" checked="checked">Matricula
		<input type="radio" name="buscaCampo" value="nome">Nome
		<input type = "button" name = "consultarColaborador" id = "consultarColaborador" value = "Pesquisar colaborador">
	</form>
	<div class = "listaColaboradores">

	</div>


</div>

<!-- Lojas modal -->

<div id = "lojasModal" class = "lojasModal" title = "lojas Modal">
	<form method = "post" id = "lojasForm">
		<!-- Pesquisa loja -->
		<label for = "toSearchLoja"> Buscar: </label> <input type = "text" name = "toSearchLoja" id = "toSearchLoja">
		<input type="radio" name="buscaCampoLoja" id ="idRadio" value="id" checked="checked">ID
		<input type="radio" name="buscaCampoLoja" id = "cnpjRadio" value="cnpj">CNPJ
		<input type = "button" name = "consultarLoja" id = "consultarLoja" value = "Pesquisar loja">
		<!-- Pesquisa loja -->
		<table id = "tableLojas">
			<tr>
				<td></td>
			 	<td>ID</td>
			 	<td>CNPJ</td>
			 	<td>Nome da Loja</td>
			</tr>
		</table>
	</form>
	<div class = "listaLoja">

	</div>


</div>



<!-- ./modal -->