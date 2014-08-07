<?php
	include("../../../conf/conn.php");

	//Consulta para retornar todas as linhas moveis cadastradas
	$sql = $pdo->prepare("Select * From ipsum_linhasmoveis");

	$sql->execute();

	$lista = '';

	$i = 0;

	//Itera resultado e monta tabela para retorno das linhas
	while($linhasMoveis = $sql->fetch(PDO::FETCH_OBJ)){
		if($i % 2 == 0){
			$lista .= '<div class = "linha">';
				$lista .= '<div class = "'. $linhasMoveis->idLinha .' plus" id = "expand">';
				$lista .= '</div>';
				$lista .= '<div class = "listaFirstChild">';
					$lista .= $linhasMoveis->numLinha;
				$lista .= '</div>';

				//Carrega histórico da linha
				$sql01 = $pdo->prepare("
					Select b.numLinha, c.nome,d.imeiAparelho, a.dataAlteracao, e.statusAparelho, f.statusLinha From ipsum_linhasmoveishist a 
					Inner Join ipsum_linhasmoveis b On (a.idLinha = b.idLinha)
					Inner Join ipsum_usuarioslinhamoveis c On (a.idUsuarioMovel = c.idUsuarioMovel)
					Inner Join ipsum_linhasmoveisaparelhos d On (a.idAparelho = d.idAparelho)
					Inner Join ipsum_linhasmoveisaparelhosstatus e On (a.idAparelhoStatus = e.idAparelhoStatus)
					Inner Join ipsum_linhasmoveislinhasstatus f On (a.idLinhaStatus = f.idLinhaStatus)
					Where a.idLinha = ?
					Order By a.idHistLinha Asc
				");

				$sql01->execute(array($linhasMoveis->idLinha));

				//Container
				$lista .= '<div class = "subContainner" id = '. $linhasMoveis->idLinha .'>';

					//Cabeçalho
					$lista .= '<div class = "subHeader">';
						$lista .= '<div class = "headerItem">';
							$lista .= 'Linha';
						$lista .= '</div>';
						$lista .= '<div class = "headerItem">';
							$lista .= 'Usuário';
						$lista .= '</div>';
						$lista .= '<div class = "headerItem">';
							$lista .= 'IMEI';
						$lista .= '</div>';
						$lista .= '<div class = "headerItem">';
							$lista .= 'Status da linha';
						$lista .= '</div>';
						$lista .= '<div class = "headerItem">';
							$lista .= 'Status do aparelho';
						$lista .= '</div>';
						$lista .= '<div class = "headerItem">';
							$lista .= 'Data Alteração';
						$lista .= '</div>';
					$lista .= '</div>';

					$j = 0;

					//Itera resultado e monta tabela para retorno do histórico
					while($hist = $sql01->fetch(PDO::FETCH_OBJ)){
						//Trata nome do usuario para colocar titulo
						$nomeUsuarioExplode = explode(' ', $hist->nome);
						$nomeUsuarioImplode = implode('_', $nomeUsuarioExplode);

						if($j % 2 == 0){
							$lista .= '<div class = "sub01 par">';
								//Numero da linha
								$lista .= '<div class = "sub01Linha">';
									$lista .= $hist->numLinha;
								$lista .= '</div>';
								//Nome do usuario
								$lista .= '<div class = "sub01Usuario" title = '. $nomeUsuarioImplode .'>';
									$lista .= $hist->nome;
								$lista .= '</div>';
								//Imei
								$lista .= '<div class = "sub01Imei">';
									$lista .= $hist->imeiAparelho;
								$lista .= '</div>';
								//Status da linha
								$lista .= '<div class = "sub01Imei">';
									$lista .= $hist->statusLinha;
								$lista .= '</div>';
								//Status do aparelho
								$lista .= '<div class = "sub01Imei">';
									$lista .= $hist->statusAparelho;
								$lista .= '</div>';
								//Data de alteração
								$lista .= '<div class = "sub01Alt">';
									$lista .= $hist->dataAlteracao;
								$lista .= '</div>';
							$lista .= '</div>';
						} else {
							$lista .= '<div class = "sub01 impar">';
								//Numero da linha
								$lista .= '<div class = "sub01Linha">';
									$lista .= $hist->numLinha;
								$lista .= '</div>';
								//Nome do usuario
								$lista .= '<div class = "sub01Usuario" title = '. $nomeUsuarioImplode .'>';
									$lista .= $hist->nome;
								$lista .= '</div>';
								//Imei
								$lista .= '<div class = "sub01Imei">';
									$lista .= $hist->imeiAparelho;
								$lista .= '</div>';		
								//Status da linha
								$lista .= '<div class = "sub01Imei">';
									$lista .= $hist->statusLinha;
								$lista .= '</div>';
								//Status do aparelho
								$lista .= '<div class = "sub01Imei">';
									$lista .= $hist->statusAparelho;
								$lista .= '</div>';						
								//Data de alteração
								$lista .= '<div class = "sub01Alt">';
									$lista .= $hist->dataAlteracao;
								$lista .= '</div>';
							$lista .= '</div>';
						}
						$j++;
					}
				$lista .= '</div>';
			$lista .= '</div>';
		} else {
			$lista .= '<div class = "linha">';
				$lista .= '<div class = "'. $linhasMoveis->idLinha .' plus" id = "expand">';
				$lista .= '</div>';
				$lista .= '<div class = "listaFirstChild">';
					$lista .= $linhasMoveis->numLinha;
				$lista .= '</div>';

				//Carrega histórico da linha
				$sql01 = $pdo->prepare("
					Select b.numLinha, c.nome,d.imeiAparelho, a.dataAlteracao, e.statusAparelho, f.statusLinha From ipsum_linhasmoveishist a 
					Inner Join ipsum_linhasmoveis b On (a.idLinha = b.idLinha)
					Inner Join ipsum_usuarioslinhamoveis c On (a.idUsuarioMovel = c.idUsuarioMovel)
					Inner Join ipsum_linhasmoveisaparelhos d On (a.idAparelho = d.idAparelho)
					Inner Join ipsum_linhasmoveisaparelhosstatus e On (a.idAparelhoStatus = e.idAparelhoStatus)
					Inner Join ipsum_linhasmoveislinhasstatus f On (a.idLinhaStatus = f.idLinhaStatus)
					Where a.idLinha = ?
					Order By a.idHistLinha Asc
				");

				$sql01->execute(array($linhasMoveis->idLinha));

				//Container
				$lista .= '<div class = "subContainner" id = '. $linhasMoveis->idLinha .'>';

					//Cabeçalho
					$lista .= '<div class = "subHeader">';
						$lista .= '<div class = "headerItem">';
							$lista .= 'Linha';
						$lista .= '</div>';
						$lista .= '<div class = "headerItem">';
							$lista .= 'Usuário';
						$lista .= '</div>';
						$lista .= '<div class = "headerItem">';
							$lista .= 'IMEI';
						$lista .= '</div>';
						$lista .= '<div class = "headerItem">';
							$lista .= 'Status da linha';
						$lista .= '</div>';
						$lista .= '<div class = "headerItem">';
							$lista .= 'Status do aparelho';
						$lista .= '</div>';						
						$lista .= '<div class = "headerItem">';
							$lista .= 'Data Alteração';
						$lista .= '</div>';
					$lista .= '</div>';

					$j = 0;

					//Itera resultado e monta tabela para retorno do histórico
					while($hist = $sql01->fetch(PDO::FETCH_OBJ)){
						//Trata nome do usuario para colocar titulo
						$nomeUsuarioExplode = explode(' ', $hist->nome);
						$nomeUsuarioImplode = implode('_', $nomeUsuarioExplode);

						if($j % 2 == 0){
							$lista .= '<div class = "sub01 par">';
								//Numero da linha
								$lista .= '<div class = "sub01Linha">';
									$lista .= $hist->numLinha;
								$lista .= '</div>';
								//Nome do usuario
								$lista .= '<div class = "sub01Usuario" title = '. $nomeUsuarioImplode .'>';
									$lista .= $hist->nome;
								$lista .= '</div>';
								//Imei
								$lista .= '<div class = "sub01Imei">';
									$lista .= $hist->imeiAparelho;
								$lista .= '</div>';	
								//Status da linha
								$lista .= '<div class = "sub01Imei">';
									$lista .= $hist->statusLinha;
								$lista .= '</div>';
								//Status do aparelho
								$lista .= '<div class = "sub01Imei">';
									$lista .= $hist->statusAparelho;
								$lista .= '</div>';							
								//Data de alteração
								$lista .= '<div class = "sub01Alt">';
									$lista .= $hist->dataAlteracao;
								$lista .= '</div>';
							$lista .= '</div>';
						} else {
							$lista .= '<div class = "sub01 impar">';
								//Numero da linha
								$lista .= '<div class = "sub01Linha">';
									$lista .= $hist->numLinha;
								$lista .= '</div>';
								//Nome do usuario
								$lista .= '<div class = "sub01Usuario" title = '. $nomeUsuarioImplode .'>';
									$lista .= $hist->nome;
								$lista .= '</div>';
								//Imei
								$lista .= '<div class = "sub01Imei">';
									$lista .= $hist->imeiAparelho;
								$lista .= '</div>';
								//Status da linha
								$lista .= '<div class = "sub01Imei">';
									$lista .= $hist->statusLinha;
								$lista .= '</div>';
								//Status do aparelho
								$lista .= '<div class = "sub01Imei">';
									$lista .= $hist->statusAparelho;
								$lista .= '</div>';
								//Data de alteração
								$lista .= '<div class = "sub01Alt">';
									$lista .= $hist->dataAlteracao;
								$lista .= '</div>';
							$lista .= '</div>';
						}
						$j++;
					}
				$lista .= '</div>';
			$lista .= '</div>';
		}
		$i++;
	}

	echo $lista;
?>