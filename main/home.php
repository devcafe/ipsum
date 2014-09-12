
<?php 
	include("../actions/security.php"); 

	//Verifica a plataforma e cria a pasta no servidor
	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
		$path = 'C:\wamp\www\ipsum\main\resources\documentos\\';		
		$bar = "\\";
	} else {
		$path = '/var/www/html/ipsum/main/resources/documentos/';
		$bar = "/";
	}
	$url = 'http://'.$_SERVER['SERVER_ADDR'] .'/ipsum/main/resources/documentos/'

?>

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

					<legend> Procedimentos </legend>
				
					<table id = "procedimentos">
					

						<?php
							$ignoreList = array('cgi-bin', '.', '..', '._');

							$lista = '';

							//Diretório de TI
							$ti = $path.'TI'.$bar;
							$financeiro = $path.'Financeiro'.$bar;						

							$lista .= "<tr class = 'dirPdf' >";
								$lista .= "<td > TI </td>";
							 	//Exibe procedimentos TI
						        if(is_dir($ti)){					        	
						            //Se for um diretório, abre o mesmo
						            if ($dh = opendir($ti)) {
				                        //Percorre arquivos e pastas do diretório
						                while (($file = readdir($dh)) !== false) {					                	
					                		if(substr($file, -3) == 'pdf' && $file != $ignoreList[1] && $file != $ignoreList[2]){
							                 	$lista .= '<tr>';					
							                        $lista .= '<td class = "filePdf"><a href = "'. $url .'TI/'. str_replace(' ', '%20', $file) .'">'. $file .'</a></td>' ;						                        
						                        $lista .= '</tr>';
					                		}
					                    }
					                }
					            } 
					        $lista .= "</tr>";

					        $lista .= "<tr class = 'dirPdf' >";
								$lista .= "<td > Financeiro </td>";
					            if(is_dir($financeiro)){
					            	//Se for um diretório, abre o mesmo
						            if ($dh = opendir($financeiro)) {
				                        //Percorre arquivos e pastas do diretório
						                while (($file = readdir($dh)) !== false) {					                	
					                		if(substr($file, -3) == 'pdf' && $file != $ignoreList[1] && $file != $ignoreList[2]){
							                 	$lista .= '<tr>';					
							                        $lista .= '<td class = "filePdf"><a href = "'. $url .'Financeiro/'. str_replace(' ', '%20', $file) .'">'. $file .'</a></td>' ;						                        
						                        $lista .= '</tr>';
					                		}
					                    }
					                }
					            }
					        $lista .= "</tr>";

				            echo $lista;

						?>
					</table>

				</div>
			</div>

			<?php include ("includes/footer.php"); ?>
		</div>

	</div>
	</body>
</html>