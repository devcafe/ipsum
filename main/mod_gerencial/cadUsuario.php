<?php 
	require("../../conf/conn.php");
	include("../../actions/security.php"); 
	$sql = $pdo->prepare("select * From ipsum_empresas");
	$sql->execute();	
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
				<td> <input type = "text" name = "primeiroNome" id = "primeiroNome" maxlength="20"></td> 

				<td> <label for = "sobrenome"> Sobrenome: </label></td> 
				<td> <input type = "text" name = "sobrenome" id = "sobrenome" maxlength="20"></td> 

				<td> <label for = "email"> Email: </label></td> 
				<td> <input type = "text" name = "email" id = "email" maxlength="50" value = ""></td> 
			</tr>

			<tr>
				<td> <label for = "departamento"> Departamento: </label></td>
				<td> <input type = "text" name = "departamento" id = "departamento" maxlength="20"></td>
				<!--<td> 
					<select name = "departamento" id = "departamento" >
						<option value="administrativo">Administrativo</option>
						<option value="atendimento">Atendimento</option>
						<option value="Back Office">Back Office</option>
						<option value="Relatórios">Relatórios</option>
						<option value="Coordenação">Coordenação</option>
						<option value="Coordenação">Coordenação</option>
					</select>
				</td>-->

				<td> <label for = "empresa"> Empresa: </label></td>
				<!--<td> <input type = "text" name = "empresa" id = "empresa" maxlength="30" value="CAFÉ EXPRESSO"></td>-->
				<td> <select name ="empresa" id = "empresa">
					<option value"">Selecione uma empresa</option>
				<?php
				while ($empresa = $sql->fetch(PDO::FETCH_OBJ)){
					echo '<option value="' . $empresa->nomeEmpresa . '" id = "' . $empresa->cnpj .'">' . $empresa->nomeEmpresa . '</option>';}

				?>
				</td>
				
				<td> <label for = "cnpj"> CNPJ: </label></td>
				<td> <input type = "text" name = "cnpj" id = "cnpj" ></td>

			</tr>

			<tr> 
				<td> <label for = "usuario" > Usuário: </label></td>
				<td> <input type = "text" name = "usuario" id = "usuario" maxlength="20"></td>

				<td> <label for = "senha"> Senha: </label></td>
				<td> 
					<input type = "password" name = "senha" id = "senha" MAXLENGTH="16">					
				</td>

				<td> <label for = "confirmarSenha"></label></td>
				<td> 
					<input type = "password" name = "confirmarSenha" id = "confirmarSenha" placeholder = "Confirme a senha" MAXLENGTH="16"> 
					<div class ="confirmarSenhaNotificacao"> As senhas não conferem.</div>
				</td>

			</tr>


		</table>

		<div class = "area02">
			<input type = "checkbox" id="admin" name = "admin"> <span>Administrador </span><br>
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