<?php 
	require("../../conf/conn.php");
	include("../../actions/security.php"); 
?>

<!-- Javascript -->
<script src="mod_ti/resources/js/cadDespesas.js"></script>

<!-- CSS -->
<link rel="stylesheet" href = "mod_ti/resources/css/cadDespesas.css">

<div class = "formInner">
	<form method = "post" id = "formCadDespesas">
		<legend>  Cadastrar despesas </legend>
        </form>
</div>

<!-- Gerenciar conta contabil -->
<div id = "gerContaContabilModal" title = "Gerenciar conta contabil">
    <legend>  Gerenciar conta contabil </legend>	
    <table id = "gerContaContabilLista">

            <tr class = "fakeRow"> </tr>
    </table>
</div>