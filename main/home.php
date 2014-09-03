
<?php include("../actions/security.php"); ?>
<!DOCTYPE html>
<html lang = "pt">
	<head>
		<title> Ipsum </title>

		<meta charset = "utf-8">

		<!-- CSS -->		
		<link href = "resources/css/style.css" type = "text/css" rel = "stylesheet">
		<link rel="stylesheet" href="../lib/bootstrap-3.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />

		<!-- Javascript -->
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="resources/js/home.js"></script>
		<script src="../lib/bootstrap-3.0/js/bootstrap.min.js"></script>
		<script src="../lib/maskedInput/maskedInput.js"></script>
		<script src="../lib/maskMoney/maskMoney.js"></script>		
		<script src="../lib/jqueryform/jquery.form.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
	</head>
	<body>
	<div class = "tudo">
		<div id = "#mainWrapper">
			<?php include ("includes/header.php"); ?>

			<div id = "conteudo"> 
				<div id = "conteudoInner">

					<!--<table class="aniversariantesTable"> 
						<tbody>
							<tr>
								<td colspan = "3" class = "tableTitle"> <h6> <b> Aniversariantes do mês </b> </h6> </td>
							</tr>
							<tr>
								<td> Colaborador </td>
								<td> Departamento </td>
								<td> Data </td>
							</tr>
						</tbody>
					</table>-->
					
					<table id = "changeLog">
						<tr>
							<td> <b> Novidades </b> </td>
						</tr>
						<tr>
							<td class = "impar"> 02/09/2014 v1.0 - Controle de despesas de T.I agora disponivel </td>
						</tr>
						<tr>
							<td class = "par"> 27/08/2014 v1.0 - Disponibilizado modulo de T.I </td>
						</tr>
						<tr>
							<td class = "impar"> 27/08/2014 v1.0 - Disponibilizado cadastro de lojas </td>
						</tr>
						<tr>
							<td class = "par"> 27/08/2014 v1.0 - Disponibilizado consulta de lojas </td>
						</tr>
						<tr>
							<td class = "impar"> 27/08/2014 v1.0 - Disponibilizado gerencia de lojas </td>
						</tr>
					</table>

				</div>
			</div>

			<?php include ("includes/footer.php"); ?>
		</div>

	</div>
	</body>
</html>