<?php 
	require("../../conf/conn.php");
	include("../../actions/security.php"); 
?>

<!-- Javascript -->
<script src="mod_ti/resources/js/cadContaContabil.js"></script>

<!-- CSS -->
<link rel="stylesheet" href = "mod_ti/resources/css/cadContaContabil.css">

<div class = "formInner">
	<form method = "post" id = "formCadDespesas">
		<form method = "post" id = "formCadDespesas">
		<legend>  Cadastrar conta contabil </legend>
		<table>
			<!-- Linha 1 -->
			<tr>
				<td class = "cadContaContabilLabel"> <label for = "contaContabil"> Conta contabil: </label> </td>
				<td> <input type = "text" name = "contaContabil" id = "contaContabil"> </td>
			</tr>

			<!-- Linha fake -->
			<tr class = "fakeRow"> </tr>

			<tr class = "alignBtn">
				<td colspan = "2"> <input type = "button" name = "cadastrar" value = "Cadastrar conta contabil" id = "cadContaContabil"> </td>
			</tr>

			<!-- Linha fake -->
			<tr class = "fakeRow"> </tr>
		</table>

	</form>
</div>