<?php require("../../conf/conn.php"); ?>

<!-- Javascript -->
<script src="mod_operacional/resources/js/gerRoteiro.js"></script>

<!-- CSS -->
<link rel="stylesheet" href = "mod_operacional/resources/css/gerRoteiro.css">

<div class = "formInner">	
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
					<table id = "addDataRoteiro">

					</table>
				</table>
			</div>			
		</div>	
</div>

<!-- modal -->

<div id ="criarRoteiroModal" class = "criarRoteiroModal" title = "Criar roteiros">
	<div id = "criarRoteiro">
	
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
			<td><label for = "lojasRoteiro"> Lojas do roteiro: </label> </td>
			<td><a href = "#" id = "selectLojasBtn">  <img src = "../main/resources/images/operacional/addStores.png" width = "20" >  </a></td>
		</tr>		
	</table>
	<table id = 'lojasForm'>
		<tr>			
			<td>ID</td>
			<td>CNPJ</td>
			<td>Nome da Loja</td>
			<td>seg</td>
			<td>ter</td>
			<td>qua</td>
			<td>qui</td>
			<td>sex</td>
			<td>sab</td>
			<td>dom</td>			
		</tr>	
		<div class = "addDataLoja">	 
		</div>

	</table>
	<input type = "button" value = "Cadastrar roteiro" id = "cadastrarRoteiro"> 

	</div>



</div>
<!-- Calaboradores modal -->

<div id = "colaboradorModal" class = "modalColaboradores" title = "Colaboradores">
	<div id = "colaboradoresForm">
		<label for = "toSearch"> Buscar: </label> <input type = "text" name = "toSearch" id = "toSearch">
		<input type="radio" name="buscaCampo" value="matricula" checked="checked">Matricula
		<input type="radio" name="buscaCampo" value="nome">Nome
		<input type = "button" name = "consultarColaborador" id = "consultarColaborador" value = "Pesquisar colaborador">
	</div>
	<div class = "listaColaboradores">

	</div>


</div>

<!-- Lojas modal -->

<div id = "lojasModal" class = "lojasModal" title = "lojas Modal">
	<div id = "lojasFormToAdd">
		<!-- Pesquisa loja -->
		<label for = "toSearchLoja"> Buscar: </label> <input type = "text" name = "toSearchLoja" id = "toSearchLoja">
		<input type="radio" name="buscaCampoLoja" class = "radioLoja" id ="idRadio" value="idLoja" checked="checked">ID
		<input type="radio" name="buscaCampoLoja" class = "radioLoja" id = "cnpjRadio" value="cnpj">CNPJ
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
	</div>
	<div class = "listaLoja">
	</div>

	<input type = "button" nome = "adicionarLoja" id = "adicionarLoja" value = "Adicionar" >
	<div class = "contadorLojas"></div>


</div>



<!-- ./modal -->