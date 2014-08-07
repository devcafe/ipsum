<?php require("../../conf/conn.php"); ?>

<!-- Javascript -->
<script src="mod_telefonia/resources/js/cadLinhaMovel.js"></script>

<!-- CSS -->
<link rel="stylesheet" href = "mod_telefonia/resources/css/cadLinhaMovel.css">

<div class = "formInner">
	<!--<div class = "title"> Cadastrar Linha Movel </div>-->
	<form method = "post">
		<legend> Cadastrar linha movel </legend>
		<table>
			<!-- Linha 1 -->
			<tr>
				<td> <label for = "numLinha"> Número da linha: </label> </td>
				<td> <input type = "text" name = "numLinha" id = "numLinha"> </td>

				<td> <label for = "plano"> Plano: </label> </td>
				<td> <input type = "text" name = "plano" id = "plano"> </td>

				<td> <label for = "iccid"> ICCID: </label> </td>
				<td> <input type = "text" name = "iccid" id = "iccid"> </td>

				<td> <label for = "operadora"> Operadora: </label> </td>
				<td> 
					<select name = "operadora" id = "operadora">
						<option value = "1"> Tim </option>
						<option value = "2"> Vivo </option>
						<option value = "3"> Oi </option>
						<option value = "4"> Nextel </option>
					</select>	
				</td>
			</tr>

			<!-- Linha fake -->
			<tr class = "fakeRow"> </tr>

			<!-- Linha 2 -->
			<tr>
				<td> <label for = "usuario"> Usuario: </label> </td>
				<td> <a href = "#" id = "selecionaUsuario"> Selecionar usuário </a> </td>
				<input type = "hidden" id = "usuarioLinha" value = "">
				<td colspan = "2"> <input type = "text" id = "showUsuario" disabled> </td>	

				<td> <label for = "empresaAcao"> Empresa/Ação: </label> </td>
				<td> <a href = "#" id = "selecionaEmpresaAcao"> Selecionar empresa/ação </a> </td>
				<input type = "hidden" id = "empresaAcao" value = "">
				<td colspan = "2"> <input type = "text" id = "showEmpresaAcao" disabled> </td>			
			</tr>

			<!-- Linha fake -->
			<tr class = "fakeRow"> </tr>

			<!-- Linha 3 -->
			<tr>
				<td> <label for = "idAparelho"> Aparelho </label> </td>
				<td> <a href = "#" id = "selecionaAparelho"> Selecionar aparelho </a> </td>
				<input type = "hidden" id = "aparelhoLinha" value = "">
				<input type = "hidden" id = "aparelhoStatusId" value = "">
				<td colspan = "2"> <input type = "text" id = "showAparelho" disabled> </td>	
			</tr>

			<!-- Linha fake -->
			<tr class = "fakeRow"> </tr>

			<!-- Linha 4 -->
			<tr>
				<td> <label for = "status"> Status da linha: </label> </td>
				<td> 
					<select name = "status" id = "status">
						<?php
							$linhaStatus = $pdo->prepare("Select * From ipsum_linhasmoveislinhasstatus");

							$linhaStatus->execute();
							
							while($resLinhasStatus = $linhaStatus->fetch(PDO::FETCH_OBJ)){
								echo "<option value = ". $resLinhasStatus->idLinhaStatus .">". $resLinhasStatus->statusLinha ."</option>";
							} 
						?>				
					</select>
				</td>	
			</tr>

			<!-- Linha fake -->
			<tr class = "fakeRow"> </tr>

			<!-- Linha 5 -->
			<tr>
				<td> <label for = "observacoes"> Observações: </label> </td>
				<td colspan = "7"> <textarea name = "observacoes" id = "observacoes"> </textarea> </td>	
			</tr>

			<!-- Linha fake -->
			<tr class = "fakeRow"> </tr>

			<!-- Linha 6 -->
			<tr>
				<td colspan = "8"> <input type = "button" name = "cadastrar" value = "Cadastrar" id = "cadLinha"> </td>
			</tr>
		</table>

		<div class = "area04">
			
		</div>
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
	<?php
		$aparelhos = $pdo->prepare("Select * From ipsum_linhasmoveisaparelhos Where checkedAparelho <> 1");

		$aparelhos->execute();
		
		while($resAparelhos = $aparelhos->fetch(PDO::FETCH_OBJ)){
			echo "<ul>";
				echo "<li> <input type = 'hidden' name = 'aparelhoStatusHidden' value = '". $resAparelhos->idAparelhoStatus ."'> <input type='radio' name='aparelho' value=". $resAparelhos->idAparelho .">". "<label for=". $resAparelhos->marcaAparelho . ' - '. $resAparelhos->modeloAparelho . ' - '. $resAparelhos->imeiAparelho .">". $resAparelhos->marcaAparelho . ' - '. $resAparelhos->modeloAparelho . ' - ' . $resAparelhos->imeiAparelho ."</label> </li>";
			echo "</ul>";
		}
	?>
	<input type = "button" name = "aparelhosOK" id = "aparelhosOK" value = "Ok">
</div>