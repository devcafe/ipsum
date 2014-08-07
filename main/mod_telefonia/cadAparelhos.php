<?php require("../../conf/conn.php"); ?>

<!-- Javascript -->
<script src="mod_telefonia/resources/js/cadAparelhos.js"></script>

<!-- CSS -->
<link rel="stylesheet" href = "mod_telefonia/resources/css/cadAparelhos.css">

<div class = "formInner">
	<form method = "post" id = "formCadAparelho">
		<legend> Cadastrar Aparelhos </legend>
		<table>
			<!-- Linha 1 -->
			<tr>
				<td> <label for = "marca"> Marca: </label> </td>
				<td> <input type = "text" name = "marcaAparelho" id = "marcaAparelho"> </td>

				<td> <label for = "modelo"> Modelo: </label> </td>
				<td> <input type = "text" name = "modeloAparelho" id = "modeloAparelho"> </td>

				<td> <label for = "imei"> IMEI: </label> </td>
				<td> <input type = "text" name = "imeiAparelho" id = "imeiAparelho"> </td>

				<td> <label for = "tipoAparelho"> Tipo: </label> </td>
				<td>
					<select name = "tipoAparelho" id = "tipoAparelho">
						<option value = "Smartphone"> Smartphone </option>
						<option value = "Tablet"> Tablet </option>
						<option value = "Modem"> Modem </option>
					</select>
				</td>
			</tr>

			<!-- Linha fake -->
			<tr class = "fakeRow"> </tr>

			<!-- Linha 2 -->
			<tr>
				<td> <label for = "statusAparelho"> Status do aparelho: </label> </td>
				<td> 
					<select name = "statusAparelho" id = "statusAparelho">
						<?php
							$aparelhoStatus = $pdo->prepare("Select * From ipsum_linhasmoveisaparelhosstatus");

							$aparelhoStatus->execute();
							
							while($resAparelhoStatus = $aparelhoStatus->fetch(PDO::FETCH_OBJ)){
								echo "<option value = ". $resAparelhoStatus->idAparelhoStatus .">". $resAparelhoStatus->statusAparelho ."</option>";
							} 
						?>				
					</select>
				</td>

				<td> <label for = "dataEnvioManutencao"name = "dataEnvioManutencao"> Enviado em: </label> </td>
				<td> <input type = "text" name = "dataEnvioManutencao" id = "dataEnvioManutencao"> </td>

				<td> <label for = "dataRecebimentoManutencao" name = "dataRecebimentoManutencao"> Recebido em: </label> </td> 
				<td> <input type = "text" name = "dataRecebimentoManutencao" id = "dataRecebimentoManutencao"> </td>			
			</tr>

			<!-- Linha fake -->
			<tr class = "fakeRow"> </tr>

			<!-- Linha 3 -->
			<tr>
				<td> <label for = "acessorios"> Acessórios: </label> </td>
				<td colspan = "3"> <textarea name = "acessorios" id = "acessorios"> </textarea> </td>

				<td> <label for = "observacoes"> Observações: </label> </td>
				<td colspan = "3"> <textarea name = "observacoes" id = "observacoes"> </textarea> </td>
			</tr>

			<!-- Linha fake -->
			<tr class = "fakeRow"> </tr>

			<!-- Linha 4 -->
			<tr>
				<td colspan = "8"> <input type = "button" name = "cadastrar" value = "Cadastrar" id = "cadAparelho"> </td>
			</tr>

		</table>

		</div>
	</form>
</div>