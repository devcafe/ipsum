<?php require("../../conf/conn.php"); ?>

<!-- Javascript -->
<script src="mod_telefonia/resources/js/gerAparelhos.js"></script>

<!-- CSS -->
<link rel="stylesheet" href = "mod_telefonia/resources/css/gerAparelhos.css">

<div class = "formInner">
	<legend> Gerenciar aparelhos </legend>
	<div class = "painel">
		<div class = "filtro">
			<form method = "post">
				<div class = "filtro01">
					<input type = "text" name = "marcaFiltro" id = "marcaFiltro" placeholder = "Marca">
					<input type = "text" name = "modeloFiltro" id = "modeloFiltro" placeholder = "Modelo">
					<input type = "text" name = "imeiFiltro" id = "imeiFiltro" placeholder = "IMEI">
					<select name = "tipoAparelho" id = "tipoAparelho">
						<option value = ""> Tipo </option>
						<option value = "smartphone"> Smartphone </option>
						<option value = "tablet"> Tablet </option>
						<option value = "modem"> Modem </option>
					</select>
				</div>
				<div class = "filtro02">
					<select name = "statusFiltro" id = "statusFiltro">
					<option value = ""> Status </option>
					<?php
						$aparelhoStatus = $pdo->prepare("Select * From ipsum_linhasmoveisaparelhosstatus");

						$aparelhoStatus->execute();
						
						while($resAparelhosStatus = $aparelhoStatus->fetch(PDO::FETCH_OBJ)){
							echo "<option value = ". $resAparelhosStatus->idAparelhoStatus .">". $resAparelhosStatus->statusAparelho ."</option>";
						} 
					?>				
					</select>
					<input type = "text" name = "envioFiltro" id = "envioFiltro" placeholder = "Data envio manutenção">
				</div>
			</form>
		</div>
		<div class = "delete" id = "delete"> <img src = "../main/resources/images/delete.png" > </div>
		<div class = "btnFiltrar" id = "btnFiltrar"> <img src = "../main/resources/images/filter.png" width = "20" > </div>
	</div>
	<div id = "listaAparelhos">

	</div>
</div>

<div id = "alterarItemModal" title = "Alterar aparelho">
	<form method = "post">
		<input type = "hidden" id = "idAparelho">
		<label for = "marcaAparelho"> Marca do aparelho: </label>
		<input type = "text" name = "marcaAparelho" id = "marcaAparelho">

		<label for = "modeloAparelho"> Modelo do aparelho: </label>
		<input type = "text" name = "modeloAparelho" id = "modeloAparelho">

		<label for = "imeiAParelho"> IMEI: </label>
		<input type = "text" name = "imeiAParelho" id = "imeiAParelho"> 

		<label for = "idAparelhoStatus"> Status do aparelho: </label>
		<select name = "idAparelhoStatus" id = "idAparelhoStatus">
		<?php
			$aparelhoStatus = $pdo->prepare("Select * From ipsum_linhasmoveisaparelhosstatus");

			$aparelhoStatus->execute();
			
			while($resAparelhoStatus = $aparelhoStatus->fetch(PDO::FETCH_OBJ)){
				echo "<option value = ". $resAparelhoStatus->idAparelhoStatus .">". $resAparelhoStatus->statusAparelho ."</option>";
			} 
		?>				
		</select>

		<label for = "dataEnvioManutencao"> Envio manutenção: </label>
		<input type = "text" name = "dataEnvioManutencao" id = "dataEnvioManutencao"> 

		<label for = "acessorios"> Acessorios: </label>
		<textarea name = "acessorios" id = "acessorios"> </textarea>

		<label for = "observacoes"> Observações: </label>
		<textarea name = "observacoes" id = "observacoes"> </textarea>

		<input type = "button" value = "Gravar" id = "gravar">
	</form>
</div>