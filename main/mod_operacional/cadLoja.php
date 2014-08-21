<?php 
	require("../../conf/conn.php"); 
	include("../../actions/security.php"); 
?>

<!-- Javascript -->
<script src="mod_operacional/resources/js/cadLoja.js"></script>

<!-- CSS -->
<link rel="stylesheet" href = "mod_operacional/resources/css/cadLoja.css">

<div class = "formInner">
	<form method = "post" id = "formCadLoja">
		<legend> Cadastrar Loja </legend>

		<table>	
			<tr>
				<td> <label for = "cnpj"> CNPJ: </label> </td>
			</tr>
			<tr>
				<td> <input  type = "text" name = "cnpj" id = "cnpj" > </td>
			</tr>

			<tr class = "fakeRow"> </tr>
		</table>

		<table>	
			<tr>
				<td> <label for = "bandeira"> Bandeira: </label> </td>
			</tr>
			<tr>
				<td class = "bandeiraTD"> <input  type = "text" name = "bandeira" id = "bandeira" disabled > </td>
				<td> <a href = "#" id = "selectBandeira"> Selecionar bandeira </a> </td>
				<!--<td> <a href = "#" id = "addBandeira"> Cadastrar bandeira </a> </td>-->
				<input type = "hidden" name = "idBandeiraHidden" id = "idBandeiraHidden">
			</tr>

			<tr class = "fakeRow"> </tr>
		</table>

		<table>	
			<tr>
				<td> <label for = "nome"> Nome do estabelecimento: </label> </td>
			</tr>
			<tr>
				<td> <input  type = "text" name = "nome" id = "nome" > </td>
			</tr>

			<tr class = "fakeRow"> </tr>
		</table>

		<table>	
			<tr>
				<td> <label for = "cep"> CEP: </label> </td>
				<td> <label for = "bairro"> Bairro: </label> </td>
			</tr>
			<tr>
				<td class = "cepTD"> <input  type = "text" name = "cep" id = "cep"> </td>
				<td> <input  type = "text" name = "bairro" id = "bairro" maxlength="60"> </td>
			</tr>

			<tr class = "fakeRow"> </tr>
		</table>


		<table>	
			<tr>
				<td> <label for = "rua"> Rua: </label> </td>
				<td> <label for = "numero"> Nº: </label> </td>
				<td> <label for = "complemento"> Complemento: </label> </td>
				<td> <label for = "complemento"> Cidade: </label> </td>
				<td> <label for = "uf"> UF: </label> </td>
			</tr>
			<tr>
				<td class = "ruaTD"> <input  type = "text" name = "rua" id = "rua" maxlength="60"> </td>
				<td class = "numeroTD"> <input  type = "text" step ="9" name = "numero" id = "numero" maxlength="6"> </td>
				<td class = "complementoTD"> <input  type = "text" name = "complemento" id = "complemento"> </td>
				<td class = "cidadeTD"> <input  type = "text" name = "cidade" id = "cidade"> </td>
				<td> <input  type = "text" name = "uf" id = "uf" maxlength="2" > </td>
			</tr>
		</table>

		<div id = "dadosReceita">
			<!-- Dados na receita -->
			<legend> Dados na receita federal </legend>

			<table>	
				<tr>
					<td> <label for = "estabReceitaRazaoSocial"> Razão social: </label> </td>
				</tr>
				<tr>
					<td> <input  type = "text" name = "estabReceitaRazaoSocial" id = "estabReceitaRazaoSocial"> </td>
				</tr>

				<tr class = "fakeRow"> </tr>
			</table>

			<table>	
				<tr>
					<td> <label for = "estabReceitaNF"> Nome fantasia: </label> </td>
				</tr>
				<tr>
					<td> <input  type = "text" name = "estabReceitaNF" id = "estabReceitaNF"> </td>
				</tr>

				<tr class = "fakeRow"> </tr>
			</table>

			<table>	
				<tr>
					<td> <label for = "estabReceitaCEP"> CEP: </label> </td>
					<td> <label for = "estabReceitaBairro"> Bairro: </label> </td>
				</tr>
				<tr>
					<td class = "cepTD"> <input  type = "text" name = "estabReceitaCEP" id = "estabReceitaCEP"> </td>
					<td> <input  type = "text" name = "estabReceitaBairro" id = "estabReceitaBairro"> </td>
				</tr>

				<tr class = "fakeRow"> </tr>
			</table>

			<table>	
				<tr>
					<td> <label for = "estabReceitaEndereco"> Endereço: </label> </td>
					<td> <label for = "estabReceitaNumero"> Nº: </label> </td>
					<td> <label for = "estabReceitaComplemento"> Complemento: </label> </td>
					<td> <label for = "estabReceitaCidade"> Cidade: </label> </td>
					<td> <label for = "estabReceitaUF"> UF: </label> </td>
				</tr>
				<tr>
					<td class = "ruaTD"> <input  type = "text" name = "estabReceitaEndereco" id = "estabReceitaEndereco"> </td>
					<td class = "numeroTD"> <input  type = "text" name = "estabReceitaNumero" id = "estabReceitaNumero" maxlength="6"> </td>
					<td class = "complementoTD"> <input  type = "text" name = "estabReceitaComplemento" id = "estabReceitaComplemento"> </td>
					<td class = "cidadeTD"> <input  type = "text" name = "estabReceitaCidade" id = "estabReceitaCidade"> </td>
					<td> <input  type = "text" name = "estabReceitaUF" id = "estabReceitaUF" maxlength = "2"> </td>
				</tr>

				<tr class = "fakeRow"> </tr>
			</table>

			<table>	
				<tr>
					<td> <label for = "estabTel01"> Telefone 01: </label> </td>
					<td> <label for = "estabTel02"> Telefone 02: </label> </td>
				</tr>
				<tr>
					<td class = "tel01TD"> <input  type = "text" name = "estabTel01" id = "estabTel01"> </td>
					<td> <input  type = "text" name = "estabTel02" id = "estabTel02"> </td>
				</tr>

				<tr class = "fakeRow"> </tr>
			</table>

			<table>	
				<tr>
					<td> <label for = "estabReceitaAberturaData"> Data de abertura: </label> </td>
					<td> <label for = "estabReceitaSituacao"> Situação: </label> </td>
					<td> <label for = "estabReceitaSituacaoData"> Situação data: </label> </td>
					<td> <label for = "dataFechamento"> Data fechamento </label> </td>
				</tr>
				<tr>
					<td class = "dataTD"> <input  type = "text" name = "estabReceitaAberturaData" id = "estabReceitaAberturaData"> </td>
					<td class = "situacaoTD">
						<select name = "estabReceitaSituacao" id = "estabReceitaSituacao"> 
							<option value="ATIVA">ATIVA</option>
							<option value="BAIXADA">BAIXADA</option>
							<option value="SUSPENSA">SUSPENSA</option>
							<option value="INATIVA">INATIVA</option>
						</select>			
					</td>
					<td class = "dataTD"> <input  type = "text" name = "estabReceitaSituacaoData" id = "estabReceitaSituacaoData"> </td>
					<td> <input  type = "text" name = "dataFechamento" id = "dataFechamento"> </td>
				</tr>

				<tr style = "height:50px"> </tr>

				<tr>
					<td colspan = "12"> <input type = "button" name = "cadLojaBtn" id = "cadLojaBtn" value = "Cadastrar loja"> </td>
				</tr>
			</table>
		</div>

		<input id = "userAdd" name = "userAdd" type = "hidden" value = "<?php echo $_SESSION['idUsuario']; ?>">
	</form>
</div>

<!-- Modals -->
<!-- Buscar bandeira -->
<div id = "bandeirasModal" title = "Bandeiras">
	<form method="post" id="bandeirasForm">
		<table>
			<tr>
				<td> <label for = "bandeira"> Bandeira: </label> </td>
				<td> <input type = "text" id = "bandeiraSearch" name = "bandeiraSearch"> </td>

				<td> <input type = "button" name = "searchBandeiraBtn" id = "searchBandeiraBtn" value = "Pesquisar"> </td>
			</tr>
		</table>
		<input type = "hidden" id = "pagina" value = "1">

		<id id = "searchBandeiraResults">

		</div>
	</form>
</div>

<!-- Cadastrar bandeira -->
<div id = "cadBandeirasModal" title = "Cadastrar bandeiras">
	<form method="post" id="cadBandeirasForm">
		<table>
			<tr>
				<td> <label for = "bandeira"> Bandeira: </label> </td>
				<td> <input type = "text" id = "cadBandeiraNome" name = "cadBandeiraNome"> </td>

				<td> <input type = "button" name = "cadBandeiraBtn" id = "cadBandeiraBtn" value = "Cadastrar"> </td>
			</tr>
		</table>
	</form>
</div>