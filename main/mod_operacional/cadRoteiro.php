<?php require("../../conf/conn.php"); ?>

<!-- Javascript -->
<script src="mod_operacional/resources/js/cadRoteiro.js"></script>

<!-- CSS -->
<link rel="stylesheet" href = "mod_operacional/resources/css/cadRoteiro.css">

<div class = "formInner">
	<form method = "post">
		<legend> Criar Roteiro </legend>
		<!--<div class = "painel">
			<div class = "btnFiltrar" id = "btnFiltrar" title = "Filtrar"> <img src = "../main/resources/images/filter.png" width = "20" > </div>
		</div>-->
		<div id = "cadRoteiro">
			<div id = "selLoja">
				<a href = "#" id = "selectFuncBtn"> + Colaborador </a>
			</div>

		</div>
	</form>
</div>

<!-- Modals -->
<!-- Visualizar dados da loja -->
<div id = "lojasModal" title = "Lojas">

</div>

<?php
	/*$sql = $protheus->prepare("Select top 10 * From SRA010 ");
	$sql->execute();

	while($res = $sql->fetch(PDO::FETCH_OBJ)){
		echo $res->RA_NOME. ' </br>';
	}*/
?>