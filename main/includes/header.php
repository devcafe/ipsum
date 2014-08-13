<!--<header>
	<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-12"> </div>
		<div class="col-xs-4 col-sm-4 col-md-12"> 
			<div class="logo">
				<div class="logoInner">
					<img src = "resources/images/logoCafe.png">
				</div>
			</div>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-12"> </div>

		<div class="col-xs-4 col-sm-4 col-md-12"> </div>
		<div class="col-md-offset-2 col-xs-6 col-sm-6 col-md-6">
			<div class="welcome"> 
				<span class="welcomeText"> Seja bem vindo <a href=""> <?php echo $_SESSION['usuario']; ?> </a></span> 
			</div>
		</div>
		<div class="col-md-offset-1 col-xs-2 col-sm-2 col-md-2"> 
		</div>
		<div class="col-xs-2 col-sm-2 col-md-2"> 
			<div id="dataHoraShow"><b>Hoje é dia 9/5/2014 9:58</b></div>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-12"> </div>
	</div>
</header>-->
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
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Telefonia Movel<b class="caret"></b></a>
				<ul class="dropdown-menu bigMenu">
					<div class="onLeft">
						<li role="presentation" class="dropdown-header"><u> Cadastrar </u></li>
						<li><a href="#" id="cadLinhaMovel"> Cadastrar linha movel</a></li>
						<li><a href="#" id="cadUsuarios"> Cadastrar usuários</a></li>
						<li><a href="#" id="cadEmpresas"> Cadastrar empresas</a></li>
						<li><a href="#" id="cadAparelhos"> Cadastrar aparelhos</a></li>
						<li class="divider"></li>
						<li role="presentation" class="dropdown-header"><u> Gerenciar </u></li>
						<li><a href="#" id="gerLinhaMovel"> Gerenciar linhas moveis </a></li>
						<li><a href="#" id="gerEmpresas"> Gerenciar empresas</a></li>
						<li><a href="#" id="gerUsuarios"> Gerenciar usuários</a></li>
						<li><a href="#" id="gerAparelhos"> Gerenciar aparelhos</a></li>
						<li class="divider"></li>
						<li><a href="#" id="histLinhaMovel"> Histórico </a></li>
					</div>
					<div class="onRight">
						<li role="presentation" class="dropdown-header"><u> Relatórios </u></li>
						<!--<li><a href="#" name=""> Cadastrar tronco chave</a></li>								
						<li><a href="#" name=""> Gerenciar troncos</a></li>	-->							
					</div>

					<!--<li class="divider dividerFix"></li>

					<div class="onLeft">
						<li role="presentation" class="dropdown-header"> <u>Relatórios </u></li>
						<li><a href="#" name=""> Visão geral </a></li>
						<li><a href="#" name=""> Gerenciar despesas </a></li>
						<li><a href="#" name=""> Gerenciar receitas </a></li>
						<li><a href="#" name=""> Gerenciar categorias </a></li>
					</div>
					<div class="onRight">
						<li role="presentation" class="dropdown-header"><u> Contas bancárias </u></li>
						<li><a href="#" name=""> Gerenciar contas bancárias</a></li>								
					</div>-->
				</ul>
			</li>

			<!-- Modulo de TI -->
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> TI <b class="caret"></b></a>
				<ul class="dropdown-menu bigMenu">
					<div class="onLeft">
						<li role="presentation" class="dropdown-header"><u> Chamados </u></li>
						<li><a href="#" id="cadChamados"> Abrir chamado </a></li>
						<li><a href="#" id="gerChamados"> Gerenciar chamados</a></li>						
					</div>
					<div class="onRight">
						<li role="presentation" class="dropdown-header"><u> Despesas </u></li>								
						<li><a href="#" id="gerDespesas"> Gerenciar despesas </a></li>
					</div>
				</ul>
			</li>

			<!-- Modulo ftp -->
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> FTP <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="#" id="meuFTP"> Meu FTP </a></li>
				</ul>
			</li>

			<!-- Modulo de RH -->
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> RH <b class="caret"></b></a>
				<ul class="dropdown-menu bigMenu">
					<div class="onLeft">
						<li role="presentation" class="dropdown-header"><u> Cadastro </u></li>
						<li><a href="#" id="cadCVRH"> Cadastrar curriculo </a></li>
						<li><a href="#" id="cadCliRH"> Cadastrar clientes</a></li>						
						<li><a href="#" id="cadUserRH"> Cadastrar usuario do sistema</a></li>		
						<li><a href="#" id="cadVagasRH"> Cadastrar vagas</a></li>		
					</div>
					<div class="onRight">
						<li role="presentation" class="dropdown-header"><u> Busca </u></li>								
						<li><a href="#" id="buscaCVRH"> Buscar curriculo </a></li>
						<li><a href="#" id="buscaVagasRH"> Buscar vagas </a></li>
						<li><a href="#" id="buscaAvançada"> Busca avançada </a></li>
					</div>
				</ul>
			</li>

			<!-- Modulo Operacional -->
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Operacional <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<!--<div class="onLeft">-->
						<li role="presentation" class="dropdown-header"><u> Lojas </u></li>
						<li><a href="#" id="cadLojaOpe"> Cadastrar loja </a></li>
						<li><a href="#" id="gerLojaOpe"> Gerenciar lojas </a></li>						
						<li><a href="#" id="listLojas"> Consultar lojas </a></li>		
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

			<!-- Modulo gerencial -->
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Gerencial <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="#" id="cadUsuario"> Cadastrar usuários </a></li>
					<li><a href="#" id="gerUsuario"> Gerenciar usuários </a></li>
				</ul>
			</li>
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
