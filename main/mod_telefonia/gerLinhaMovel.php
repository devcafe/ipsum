<?php require("../../conf/conn.php"); ?>

<!-- Javascript -->
<script src="mod_telefonia/resources/js/gerLinhaMovel.js"></script>

<!-- CSS -->
<link rel="stylesheet" href = "mod_telefonia/resources/css/gerLinhaMovel.css">

<div class = "formInner">
	<legend> Gerenciar linhas moveis </legend>
	<div class = "painel">
		<div class = "filtro">
			<form method = "post">
				<div class = "filtro01">
					<input type = "text" name = "linhaFiltro" id = "linhaFiltro" placeholder = "Linha">
					<input type = "text" name = "planoFiltro" id = "planoFiltro" placeholder = "Plano">
					<input type = "text" name = "usuarioFiltro" id = "usuarioFiltro" placeholder = "Usuário">
					<input type = "text" name = "empresaAcaoFiltro" id = "empresaAcaoFiltro" placeholder = "Empresa/Ação">
				</div>
				<div class = "filtro02">
					<input type = "text" name = "aparelhoFiltro" id = "aparelhoFiltro" placeholder = "Aparelho">
					<input type = "text" name = "iccidFiltro" id = "iccidFiltro" placeholder = "ICCID">
					<select name = "statusFiltro" id = "statusFiltro">
					<option value = ""> Status </option>
					<?php
						$linhaStatus = $pdo->prepare("Select * From ipsum_linhasmoveislinhasstatus");

						$linhaStatus->execute();
						
						while($resLinhasStatus = $linhaStatus->fetch(PDO::FETCH_OBJ)){
							echo "<option value = ". $resLinhasStatus->idLinhaStatus .">". $resLinhasStatus->statusLinha ."</option>";
						} 
					?>				
					</select>
					<select name = "operadoraFiltro" id = "operadoraFiltro">
						<option value = ""> Operadora </option>
						<option value = "1"> Tim </option>
						<option value = "2"> Vivo </option>
						<option value = "3"> Oi </option>
						<option value = "4"> Nextel </option>
					</select>
				</div>
			</form>
		</div>
		<div class = "delete" id = "delete" title = "Apagar"> <img src = "../main/resources/images/delete.png" > </div>
		<div class = "btnFiltrar" id = "btnFiltrar" title = "Filtrar"> <img src = "../main/resources/images/filter.png" width = "20" > </div>
		<div class = "btnTermo" id = "btnTermo" title = "Gerar termo"> <a href = "#" id = "gerarTermo"> <img src = "../main/resources/images/termo.png" width = "20" height = "20"> </a> </div>
	</div>
	<div id = "listaLinhasMoveis">

	</div>
</div>

<div id = "alterarItemModal" title = "Alterar linha movel">
	<form method = "post">
		<input type = "hidden" id = "idLinha">
		<label for = "numLinha"> Número da linha: </label>
		<input disabled type = "text" name = "numLinha" id = "numLinha">

		<label for = "plano"> Plano: </label>
		<input type = "text" name = "plano" id = "plano">

		<!--<label for = "usuario"> Usuario: </label>-->
		<div class = "fullInput"> <a href = "#" id = "selecionaUsuario"> Selecionar usuário </a> </div>
		<input type = "hidden" id = "usuarioLinha" value = "">
		<input type = "text" id = "showUsuario" disabled> 
		
		<!-- <label for = "empresaAcao"> Empresa/Ação: </label> -->
		<div class = "fullInput"> <a href = "#" id = "selecionaEmpresaAcao"> Selecionar empresa/ação </a> </div>
		<input type = "hidden" id = "empresaAcao" value = "">
		<input type = "text" id = "showEmpresaAcao" disabled>

		<!-- <label for = "idAparelho"> Aparelho </label> -->
		<div class = "fullInput"> <a href = "#" id = "selecionaAparelho"> Selecionar aparelho </a> </div>
		<input type = "hidden" id = "aparelhoLinha" value = "">
		<input type = "text" id = "showAparelho" disabled>

		<label for = "iccid"> ICCID: </label>
		<input type = "text" name = "iccid" id = "iccid"> 

		<label for = "status"> Status da linha: </label>
		<select name = "status" id = "status">
		<?php
			$linhaStatus = $pdo->prepare("Select * From ipsum_linhasmoveislinhasstatus");

			$linhaStatus->execute();
			
			while($resLinhasStatus = $linhaStatus->fetch(PDO::FETCH_OBJ)){
				echo "<option value = ". $resLinhasStatus->idLinhaStatus .">". $resLinhasStatus->statusLinha ."</option>";
			} 
		?>				
		</select>

		<label for = "operadora"> Operadora: </label>
		<select name = "operadora" id = "operadora">
			<option value = "1"> Tim </option>
			<option value = "2"> Vivo </option>
			<option value = "3"> Oi </option>
			<option value = "4"> Nextel </option>
		</select>

		<label for = "observacoes"> Observações: </label>
		<textarea name = "observacoes" id = "observacoes"> </textarea>

		<input type = "button" value = "Gravar" id = "gravar">
	</form>
</div>


<!-- Modals -->
<!-- Selecionar usuário -->
<div id = "usuariosModal" title = "Selecionar Usuário">
	<?php
		$usuarios = $pdo->prepare("Select * From ipsum_usuarioslinhamoveis");

		$usuarios->execute();
		
		while($resUsuarios = $usuarios->fetch(PDO::FETCH_OBJ)){
			echo "<ul>";
				echo "<li> <input type='radio' name='usuario' value=". $resUsuarios->idUsuarioMovel .">". "<label for=". $resUsuarios->nome .">" .$resUsuarios->nome ."</label> </li>";
			echo "</ul>";
		}
	?>
	<input type = "button" name = "usuariosOK" id = "usuariosOK" value = "Ok">
</div>


<!-- Selecionar empresa -->
<div id = "empresasModal" title = "Selecionar empresa/ação">
	<?php
		$empresas = $pdo->prepare("Select * From ipsum_linhasmoveisempresas");

		$empresas->execute();
		
		while($resEmpresas = $empresas->fetch(PDO::FETCH_OBJ)){
			echo "<ul>";
				echo "<li> <input type='radio' name='empresa' value=". $resEmpresas->idEmpresa .">". "<label for=". $resEmpresas->nomeEmpresa .">" .$resEmpresas->nomeEmpresa ."</label> </li>";
			echo "</ul>";
		}
	?>
	<input type = "button" name = "empresasOK" id = "empresasOK" value = "Ok">
</div>

<!-- Selecionar aparelho -->
<div id = "aparelhosModal" title = "Selecionar aparelho">
	
	
</div>