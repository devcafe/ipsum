<?php require("../../conf/conn.php"); ?>

<!-- Javascript -->
<script src="mod_rh/resources/js/cadCurriculo.js"></script>

<!-- CSS -->
<link rel="stylesheet" href = "mod_rh/resources/css/cadCurriculo.css">

<div class = "formInner">
	<form method = "post">
		<ul class = "breadcrumb"> 	</ul>
		<div class = "formPadding">
			<legend> Cadastrar curriculo </legend>

			<!-- Etapa 01 -->
			<div id = "etapa1">
				<table>
					<tr>
						<th> <label for = "nomeCompleto"> <b> Nome completo </b>  (Sem abreviações): <span class = "red"> * </span> </label> </th>
					</tr>
					<tr>
						<td> <input type = "text" name = "nomeCompleto" id = "nomeCompleto"> </td>
					</tr>

					<tr class = "fakeRow"> </tr>
				</table>

				<table>
					<tr>
						<th> <label for = "dataNasc"> <b> Data de nascimento </b>: </label> </th>
					</tr>

					<tr>
						<th> <input type = "text" name = "dataNasc" id = "dataNasc"> </label> </th>
					</tr>

					<tr class = "fakeRow"> </tr>
				</table>

				<table>
					<tr>
						<th> <label for = "nomePai"> <b> Nome do pai </b>  (Sem abreviações): <span class = "red"> * </span> </label> </th>
					</tr>

					<tr>
						<td> <input type = "text" name = "nomePai" id = "nomePai"> </td>
					</tr>

					<tr class = "fakeRow"> </tr>
				</table>

				<table>
					<tr>
						<th> <label for = "nomeMae"> <b> Nome da mãe </b>  (Sem abreviações): <span class = "red"> * </span> </label> </th>
					</tr>

					<tr>
						<td> <input type = "text" name = "nomeMae" id = "nomeMae"> </td>
					</tr>

					<tr class = "fakeRow"> </tr>
				</table>

				<table>
					<tr>
						<td> <label for = "cep"> <b> CEP: </b>  </label> </td>
						<td> <label for = "regiao"> <b> Região: </b> <span class = "red"> * </span>  </label> </td>
					</tr>

					<tr>
						<td class = "cepTD"> <input type = "text" name = "cep" id = "cep"> </td>
						<td> <input type = "text" name = "regiao" id = "regiao"> </td>
					</tr>

					<tr class = "fakeRow"> </tr>
				</table>

				<table>
					<tr>
						<td> <label for = "endereco"> <b> Endereço: </b> <span class = "red"> * </span>  </label> </td>
						<td> <label for = "numero"> <b> Nº </b> <span class = "red"> * </span>  </label> </td>
						<td> <label for = "complemento"> <b> Complemento: </b> </label> </td>
					</tr>

					<tr>
						<td class = "enderecoTD"> <input type = "text" name = "endereco" id = "endereco"> </td>
						<td class = "numero"> <input type = "text" name = "numero" id = "numero"> </td>
						<td> <input type = "text" name = "complemento" id = "complemento"> </td>
					</tr>

					<tr class = "fakeRow"> </tr>
				</table>

				<table>
					<tr>
						<td> <label for = "bairro"> <b> Bairro: </b> <span class = "red"> * </span>  </label> </td>
						<td> <label for = "cidade"> <b> Cidade: </b> <span class = "red"> * </span>  </label> </td>
						<td> <label for = "uf"> <b> UF </b> <span class = "red"> * </span> </label> </td>
					</tr>

					<tr>
						<td class = "bairroTD"> <input type = "text" name = "bairro" id = "bairro"> </td>
						<td class = "cidadeTD"> <input type = "text" name = "cidade" id = "cidade"> </td>
						<td class = "ufTD"> <input type = "text" name = "uf" id = "uf"> </td>
					</tr>

					<tr class = "fakeRow"> </tr>
				</table>

				<table>
					<tr>
						<td> <label for = "telResidencial"> <b> Telefone residencial: </b>  </label> </td>
						<td> <label for = "telRecado"> <b> Telefone recado: </b> </label> </td>
					</tr>

					<tr>
						<td class = "telResidencialTD"> <input type = "text" name = "telResidencial" id = "telResidencial"> </td>
						<td> <input type = "text" name = "telRecado" id = "telRecado"> </td>
					</tr>

					<tr class = "fakeRow"> </tr>
				</table>

				<table>
					<tr>
						<td> <label for = "telCelular"> <b> Telefone celular: <span class = "red"> * </span> </b>  </label> </td>
						<td> <label for = "telComercial"> <b> Telefone comercial: </b> </label> </td>
					</tr>

					<tr>
						<td class = "telCelularTD"> <input type = "text" name = "telCelular" id = "telCelular"> </td>
						<td> <input type = "text" name = "telComercial" id = "telComercial"> </td>
					</tr>

					<tr class = "fakeRow"> </tr>
				</table>	

				<table>
					<tr>
						<td> <label for = "email"> <b> Email: </b>  </label> </td>
					</tr>

					<tr>
						<td class = "emailTD"> <input type = "text" name = "email" id = "email"> </td>
					</tr>

					<tr class = "fakeRow"> </tr>
				</table>

				<table>
					<tr> 
						<td class = "proximaEtapaTD"> <a href = "#" name = "proximaEtapa_2" id = "proximaEtapa_2"> <img src="../main/resources/images/RH/arrowRight.png" alt=""> Proxima etapa </a>  </td>
					</tr>
				</table>
			</div>
			<!-- ./Etapa 01 -->

			<!-- Etapa 02 -->
			<div id = "etapa02">
				<table>
					<tr> 
						<td class = "voltarTD"> <a href = "#" name = "voltar_1" id = "voltar_1"> <img src="../main/resources/images/RH/arrowLeft.png" alt=""> Voltar </a>  </td>
						<td class = "proximaEtapaTD"> <a href = "#" name = "proximaEtapa_3" id = "proximaEtapa_3"> <img src="../main/resources/images/RH/arrowRight.png" alt=""> Proxima etapa </a>  </td>
					</tr>
				</table>
			</div>
			<!-- ./Etapa 02 -->
		</div>

		<input type = "hidden" value = "1" id = "etapa">
	</form>
</div>