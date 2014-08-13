<?php include("../actions/functions.php"); ?>
<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand firstActive" id="homeLink" name="homePage" href="home.php"> <img src="resources/images/home.jpg"> </a>
	</div>

	<div class="collapse navbar-collapse mainMenu" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<!-- Modulo de telefonia movel -->
			<?php if (acessosModulos(1)) { ?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Telefonia Movel<b class="caret"></b></a>
					<ul class="dropdown-menu bigMenu">
						<div class="onLeft">							
							<?php if(acessos(1) == true or acessos(2) == true or acessos(3) == true or acessos(4) == true){echo'<li role="presentation" class="dropdown-header"><u> Cadastrar </u></li>';} ?>
								<?php if(acessos(1) == true ){echo '<li><a href="#" id="cadLinhaMovel"> Cadastrar linha movel</a></li>';}?>
								<?php if(acessos(2) == true ){echo '<li><a href="#" id="cadUsuarios"> Cadastrar usuários</a></li>';}?>
								<?php if(acessos(3) == true ){echo '<li><a href="#" id="cadEmpresas"> Cadastrar empresas</a></li>';}?>
								<?php if(acessos(4) == true ){echo '<li><a href="#" id="cadAparelhos"> Cadastrar aparelhos</a></li>';}?>
								<li class="divider"></li>						
							
							
							<?php if(acessos(5) == true or acessos(6) == true or acessos(7) == true or acessos(8) == true){echo'<li role="presentation" class="dropdown-header"><u> Gerenciar </u></li>';} ?>	
								<?php if(acessos(5) == true ){echo '<li><a href="#" id="gerLinhaMovel"> Gerenciar linhas moveis </a></li>';}?>
								<?php if(acessos(6) == true ){echo '<li><a href="#" id="gerEmpresas"> Gerenciar empresas</a></li>';}?>
								<?php if(acessos(7) == true ){echo '<li><a href="#" id="gerUsuarios"> Gerenciar usuários</a></li>';}?>
								<?php if(acessos(8) == true ){echo '<li><a href="#" id="gerAparelhos"> Gerenciar aparelhos</a></li>';}?>
								<li class="divider"></li>							
							
							<?php if(acessos(9) == true){echo'<li><a href="#" id="histLinhaMovel"> Histórico </a></li>';} ?>							
						</div>
						<div class="onRight">
							<?php if(acessos(9) == true ){echo '<li role="presentation" class="dropdown-header"><u> Relatórios </u></li>';}?>																				
						</div>
					</ul>
				</li>
		<?php	} ?>

			<!-- Modulo de TI -->
			<?php if (acessosModulos(2)) { ?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"> TI <b class="caret"></b></a>
					<ul class="dropdown-menu bigMenu">
						<div class="onLeft">
							<?php if(acessos(10) == true or acessos(11) == true){echo'<li role="presentation" class="dropdown-header"><u> Chamados </u></li>';} ?>
								<?php if(acessos(10) == true){echo'<li><a href="#" id="cadChamados"> Abrir chamado </a></li>';} ?>
								<?php if(acessos(11) == true){echo'<li><a href="#" id="gerChamados"> Gerenciar chamados</a></li>';} ?>
						</div>
						<div class="onRight">
							<?php if(acessos(12) == true){echo'<li role="presentation" class="dropdown-header"><u> Despesas </u></li>';} ?>
							<?php if(acessos(12) == true){echo'<li><a href="#" id="gerDespesas"> Gerenciar despesas </a></li>';} ?>
															
							
						</div>
					</ul>
				</li>
			<?php	} ?>

			<!-- Modulo ftp -->
			<?php if (acessosModulos(3)) { ?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"> FTP <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<?php if(acessos(13) == true){echo'<li><a href="#" id="meuFTP"> Meu FTP </a></li>';} ?>
						
					</ul>
				</li>
			<?php	} ?>

				<!-- Modulo de RH -->
				<?php if (acessosModulos(4)) { ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> RH <b class="caret"></b></a>
						<ul class="dropdown-menu bigMenu">
							<div class="onLeft">
								<?php if(acessos(14) == true or acessos(15) == true or acessos(16) == true or acessos(17) == true){echo'<li role="presentation" class="dropdown-header"><u> Cadastro </u></li>';} ?>
									<?php if(acessos(14) == true){echo'<li><a href="#" id="cadCVRH"> Cadastrar curriculo </a></li>';} ?>
									<?php if(acessos(15) == true){echo'<li><a href="#" id="cadCliRH"> Cadastrar clientes</a></li>';} ?>
									<?php if(acessos(16) == true){echo'<li><a href="#" id="cadUserRH"> Cadastrar usuario do sistema</a></li>';} ?>
									<?php if(acessos(17) == true){echo'<li><a href="#" id="cadVagasRH"> Cadastrar vagas</a></li>';} ?>
										
							</div>
							<div class="onRight">
								<?php if(acessos(18) == true or acessos(19) == true or acessos(20) == true){echo'<li role="presentation" class="dropdown-header"><u> Busca </u></li>	';} ?>
									<?php if(acessos(18) == true){echo'<li><a href="#" id="buscaCVRH"> Buscar curriculo </a></li>';} ?>
									<?php if(acessos(19) == true){echo'<li><a href="#" id="buscaVagasRH"> Buscar vagas </a></li>';} ?>
									<?php if(acessos(20) == true){echo'<li><a href="#" id="buscaAvançada"> Busca avançada </a></li>';} ?>
							</div>
						</ul>
					</li>
				<?php	} ?>

			<!-- Modulo Operacional -->
			<?php if (acessosModulos(5)) { ?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Operacional <b class="caret"></b></a>
					<ul class="dropdown-menu"> <!-- acrescentar classe BigMenu -->
						<!--<div class="onLeft">-->
							<?php if(acessos(21) == true or acessos(22) == true or acessos(23) == true){echo'<li role="presentation" class="dropdown-header"><u> Lojas </u></li>';} ?>
								<?php if(acessos(21) == true){echo'<li><a href="#" id="cadLojaOpe"> Cadastrar loja </a></li>';} ?>
								<?php if(acessos(22) == true){echo'<li><a href="#" id="gerLojaOpe"> Gerenciar lojas </a></li>	';} ?>
								<?php if(acessos(23) == true){echo'<li><a href="#" id="listLojas"> Consultar lojas </a></li>	';} ?>											
								
							<!--<li class="divider"></li>-->
							<!--<li role="presentation" class="dropdown-header"><u> Lorem Ipsum </u></li>								
							<li><a href="#" id=""> Lorem Ipsum </a></li>
							<li><a href="#" id=""> Lorem Ipsum </a></li>
							<li><a href="#" id=""> Lorem Ipsum </a></li>-->
						<!--</div>-->
						<!--<div class="onRight">
							<li role="presentation" class="dropdown-header"><u> Vagas </u></li>								
							<li><a href="#" id=""> Lorem Ipsum </a></li>
							<li><a href="#" id=""> Lorem Ipsum </a></li>
							<li><a href="#" id=""> Lorem Ipsum </a></li>
						</div>-->
					</ul>
				</li>
			<?php	} ?>

			<!-- Modulo gerencial -->
			<?php if (acessosModulos(6)) { ?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Gerencial <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<?php if(acessos(24) == true){echo'<li><a href="#" id="cadUsuario"> Cadastrar usuários </a></li>';} ?>
						<?php if(acessos(25) == true){echo'<li><a href="#" id="gerUsuario"> Gerenciar usuários </a></li>';} ?>
						
						
					</ul>
				</li>
			<?php	} ?>
			</ul>
			<p class="navbar-text navbar-right"><a href="../actions/logout.php" class="logout"> <img src="resources/images/logout.png" width="25" height="25"> </a></p>
		</div>
	</nav>
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6">
			<div class="welcome"> 
				<span class="welcomeText"> Seja bem vindo <a href=""> <?php echo $_SESSION['nomeUsuario']; ?> </a>, <b> hoje é dia <?php echo date('d/m/Y G:i'); ?></b></span> 
			</div>
		</div>
	</div>

