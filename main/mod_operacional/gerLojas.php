<?php require("../../conf/conn.php"); ?>

<!-- Javascript -->
<script src="mod_operacional/resources/js/gerLojas.js"></script>

<!-- CSS -->
<link rel="stylesheet" href = "mod_operacional/resources/css/gerLojas.css">

<div class = "formInner">
	<form method = "post">
		<legend> Gerenciar lojas </legend>
		<div class = "painel">
			<div class = "filtro">
				<form method = "post" id = "formFiltro">
					<div class = "filtro01">
						<input type = "text" name = "cnpj" id = "cnpj" placeholder = "CNPJ">
						<input type = "text" name = "razaoSocial" id = "razaoSocial" placeholder = "Razão Social">
						<input type = "text" name = "nomeFantasia" id = "nomeFantasia" placeholder = "Nome Fantasia">
						<input type = "text" name = "bairro" id = "bairro" placeholder = "Bairro">
						<input type = "text" name = "rua" id = "rua" placeholder = "Rua">
					</div>
					<div class = "filtro02">
						<input type = "text" name = "bandeira" id = "bandeira" placeholder = "Bandeira">
						<input type = "text" name = "cep" id = "cep" placeholder = "CEP">
						<input type = "text" name = "cidade" id = "cidade" placeholder = "Cidade">
						<input type = "text" name = "uf" id = "uf" placeholder = "UF">
						<input type = "text" name = "numero" id = "numero" placeholder = "Nº">
					</div>
				</form>
			</div>
			<div class = "chooseFields">
				<form method = "post">
					<h5> <b> Campos com dados da loja </b> </h5>
					<table class = "fieldsToShow">
						<tr>
							<td> <input type = "checkbox" class = "checkBox" value = "1" name = "id" id = "id">  <span> ID  </span> </td>
							<td> <input type = "checkbox" class = "checkBox" value = "2" name = "cnpj" id = "cnpj"><span> CNPJ </span> </td>
							<td> <input type = "checkbox" class = "checkBox" value = "3" name = "bandeira" id = "bandeira"> <span>Bandeira </span> </td>
							<td> <input type = "checkbox" class = "checkBox" value = "4" name = "nome" id = "nome"> <span>Nome </span> </td>
							<td> <input type = "checkbox" class = "checkBox" value = "5" name = "cep" id = "cep"><span> Cep </span> </td>
							<td> <input type = "checkbox" class = "checkBox" value = "6" name = "bairro" id = "bairro"><span> Bairro </span> </td>
							<td> <input type = "checkbox" class = "checkBox" value = "7" name = "rua" id = "rua"><span> Rua </span> </td>
							<td> <input type = "checkbox" class = "checkBox" value = "8" name = "numero" id = "numero"><span> Numero</span> </td>
							<td> <input type = "checkbox" class = "checkBox" value = "9" name = "complemento" id = "complemento"><span> Complemento </span> </td>
							<td> <input type = "checkbox" class = "checkBox" value = "10" name = "cidade" id = "cidade"><span> Cidade </span> </td>
							<td> <input type = "checkbox" class = "checkBox" value = "11" name = "uf" id = "uf"><span> UF</span> </td>
						</tr>
					</table>
					
					<h5> <b> Campos com dados da receita </b> </h5>
					<table class = "fieldsToShow">
						<tr>
							<td> <input type = "checkbox" class = "checkBox" value = "12" name = "receitaDataAbertura" id = "receitaDataAbertura"><span> Data abertura </span> </td>
							<td> <input type = "checkbox" class = "checkBox" value = "13" name = "receitaRazaoSocial" id = "receitaRazaoSocial"><span> Razão social</span>  </td>
							<td> <input type = "checkbox" class = "checkBox" value = "14" name = "receitaNomeFantasia" id = "receitaNomeFantasia"><span> Nome Fantasia</span>  </td>
							<td> <input type = "checkbox" class = "checkBox" value = "15" name = "receitaEndereco" id = "receitaEndereco"><span> Endereço</span>  </td>
							<td> <input type = "checkbox" class = "checkBox" value = "16" name = "receitaNumero" id = "receitaNumero"><span>Número </span> </td>
							<td> <input type = "checkbox" class = "checkBox" value = "17" name = "receitaComplemento" id = "receitaComplemento"><span> Complemento</span>  </td>
							<td> <input type = "checkbox" class = "checkBox" value = "18" name = "receitaBairro" id = "receitaBairro"><span> Bairro</span>  </td>
							<td> <input type = "checkbox" class = "checkBox" value = "19" name = "receitaCidade" id = "receitaCidade"><span> Cidade </span> </td>
							<td> <input type = "checkbox" class = "checkBox" value = "20" name = "receitaUF" id = "receitaUF"><span> UF</span>  </td>
							<td> <input type = "checkbox" class = "checkBox" value = "21" name = "receitaCEP" id = "receitaCEP"><span> CEP</span>  </td>
						</tr>

						<tr>
							<td> <input type = "checkbox" class = "checkBox" value = "22" name = "receitaSituacao" id = "receitaSituacao"><span> Situação </span> </td>
							<td> <input type = "checkbox" class = "checkBox" value = "23" name = "receitaSituacaoData" id = "receitaSituacaoData"><span> Situação data </span> </td>
							<td> <input type = "checkbox" class = "checkBox" value = "24" name = "receitaTel01" id = "receitaTel01"><span> Tel 01 </span> </td>
							<td> <input type = "checkbox" class = "checkBox" value = "25" name = "receitaTel02" id = "receitaTel02"><span> Tel 02 </span> </td>
							<td> <input type = "checkbox" class = "checkBox" value = "26" name = "receitaDataFechamento" id = "receitaDataFechamento"><span> Data fechamento</span>  </td>
						</tr>

						<tr>
							<td colspan = "12" class = "toCenter"> <input type = "button" name = "sendFields" id = "sendFields" value = "Consultar"> </td>
						</tr>
					</table>

				</form>
			</div>
				<div class = "btnFiltrar" id = "btnFiltrar" title = "Filtrar"> <img src = "../main/resources/images/filter.png" width = "20" > </div>
				<div class = "btnSelFields" id = "btnSelFields" title = "Selecionar campos"> <img src = "../main/resources/images/checkbox.png" width = "18" > </div>
				<div class = "btnToCSV" id = "btnToCSV" title = "Exportar CSV"> <img src = "../main/resources/images/csv.png" width = "22" > </div>
		</div>
		<div id = "listaLojas">

		</div>
		<input type = "hidden" id = "pagina" value = "1">
		<input type = "hidden" id = "checkFiltro" value = "0">
	</form>
</div>

<!-- Modals -->
<!-- Visualizar dados da loja -->
<div id = "lojasModal" title = "Dados da loja">
	<table>	
		<tr>
			<td> <label for = "cnpjList"> CNPJ: </label> </td>
		</tr>
		<tr>
			<td> <input disabled type = "text" name = "cnpjList" id = "cnpjList"> </td>
		</tr>
	</table>

	<table>	
		<tr>
			<td> <label for = "bandeiraList"> Bandeira: </label> </td>
		</tr>
		<tr>
			<td> <input disabled type = "text" name = "bandeiraList" id = "bandeiraList"> </td>
		</tr>
	</table>

	<table>	
		<tr>
			<td> <label for = "razaoSocialList"> Razão Social: </label> </td>
		</tr>
		<tr>
			<td> <input disabled type = "text" name = "razaoSocialList" id = "razaoSocialList"> </td>
		</tr>
	</table>

	<table>	
		<tr>
			<td> <label for = "nomeFantasiaList"> Nome Fantasia: </label> </td>
		</tr>
		<tr>
			<td> <input disabled type = "text" name = "nomeFantasiaList" id = "nomeFantasiaList"> </td>
		</tr>
	</table>

	<table>	
		<tr>
			<td> <label for = "cepList"> CEP: </label> </td>
		</tr>
		<tr>
			<td> <input disabled type = "text" name = "cepList" id = "cepList"> </td>
		</tr>
	</table>

	<table>	
		<tr>
			<td> <label for = "ruaList"> Rua: </label> </td>
		</tr>
		<tr>
			<td> <input disabled type = "text" name = "ruaList" id = "ruaList"> </td>
		</tr>
	</table>

	<table>	
		<tr>
			<td> <label for = "bairroList"> Bairro: </label> </td>
			<td> <label for = "numeroList"> Nº: </label> </td>
		</tr>
		<tr>
			<td> <input disabled type = "text" name = "bairroList" id = "bairroList"> </td>
			<td> <input disabled type = "text" name = "numeroList" id = "numeroList"> </td>
		</tr>
	</table>

	<table>	
		<tr>
			<td> <label for = "cidadeList"> Cidade: </label> </td>
			<td> <label for = "ufList"> UF: </label> </td>
		</tr>
		<tr>
			<td> <input disabled type = "text" name = "cidadeList" id = "cidadeList"> </td>
			<td> <input disabled type = "text" name = "ufList" id = "ufList"> </td>
		</tr>

		<tr class = "fakeRow"> </tr>

		<tr>
			<td colspan = "12"> <input  id = "alteraLojaBtn" name = "alteraLojaBtn" type = "button" value = "Alterar loja"> </td>
		</tr>
	</table>
</div>