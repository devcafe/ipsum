<!DOCTYPE html>
<html lang = "pt">
	<head>
		<title> Ipsum </title>

		<meta charset = "utf-8">

		<!-- CSS -->
		<link href = "resources/css/style.css" type = "text/css" rel = "stylesheet">

		<!-- Javascript -->
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="resources/js/login.js"></script>
	</head>
	<body>
		<div id = "loginWrapper">
			<div class = "loginForm">
				<div class = "loginMsg"> </div>
				<div class = "paddingForm">
					<form method = 'post'>
						<label for = "usuario"> Usuario: </label> <input type = "text" name = "usuario" id = "usuario">
						<label for = "senha"> Senha: </label>  <input type = "password" name = "senha" id = "senha">
						<input type = "button" id = "loginBtn" value = "Logon">
					</form>
				</div>
			</div>
		</div>
	</body>
</html>