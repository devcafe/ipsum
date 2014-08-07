<?php 
	require("../../conf/conn.php");
	include("../../actions/security.php"); 
?>

<!-- Javascript -->
<script src="mod_gerencial/resources/js/cadUsuario.js"></script>

<!-- CSS -->
<link rel="stylesheet" href = "mod_gerencial/resources/css/cadUsuario.css">

<div class = "formInner">
	<legend> Cadastrar usuário </legend>
	<form method = "post" id = "formCadUsuario">
		<table>
			<tr>
				<td> <label for = "primeiroNome"> Primeiro nome: </label> </td> 
				<td> <input type = "text" name = "primeiroNome" id = "primeiroNome"></td> 

				<td> <label for = "sobrenome"> Sobrenome: </label></td> 
				<td> <input type = "text" name = "sobrenome" id = "sobrenome"></td> 

				<td> <label for = "email"> Email: </label></td> 
				<td> <input type = "text" name = "email" id = "email"></td> 
			</tr>

			<tr>
				<td> <label for = "departamento"> Departamento: </label></td>
				<td> <input type = "text" name = "departamento" id = "departamento"></td>

				<td> <label for = "empresa"> Empresa: </label></td>
				<td> <input type = "text" name = "empresa" id = "empresa"></td>

				<td> <label for = "cnpj"> CNPJ: </label></td>
				<td> <input type = "text" name = "cnpj" id = "cnpj"></td>

			</tr>

			<tr> 
				<td> <label for = "usuario"> Usuário: </label></td>
				<td> <input type = "text" name = "usuario" id = "usuario" ></td>

				<td> <label for = "senha"> Senha: </label></td>
				<td> 
					<input type = "password" name = "senha" id = "senha" >					
				</td>

				<td> <label for = "confirmarSenha"></label></td>
				<td> 
					<input type = "password" name = "confirmarSenha" id = "confirmarSenha" placeholder = "Confirme a senha"> 
					<div class ="confirmarSenhaNotificacao"> A senha não bate com a primeira digitada.</div>
				</td>

			</tr>


		</table>

		<div class = "area02">
			<a href = "#" name = "definirAcessos" id = "definirAcessos"> Definir Acessos </a>
		</div>


		<div class = "area03" id = "screen">
			<!-- Acesso primario -->
			<ul id = "acessoPrimario">
				<?php
					$sql = $pdo->prepare("Select * From ipsum_modulos");
					$sql->execute();

					$lista = '';

					while($res = $sql->fetch(PDO::FETCH_OBJ)){
						$lista .= '<li id = "'. $res->idModulo .'"">'. $res->nomeModulo . '</li>';
					}

					echo $lista;
				?>
			</ul>

			<!-- Acesso secundario -->
			<ul id = "acessoSecundario">
				
			</ul>

			<input type = "button" name = "ok" value = "OK" id = "addListaFinal">

		</div>

		<div class = "area03" style = "min-height:50px;" id = "itensSelecionados">
			<!-- Acesso final -->
			<ul id = "acessoFinal">
				
			</ul>
		</div>

		<div class = "area04">
			<input type = "button" name = "cadastrar" value = "Cadastrar usuário" id = "cadUsuario">
		</div>
	</form>
</div>