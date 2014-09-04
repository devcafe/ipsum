<?php
	include("../../../conf/conn.php");
	
	//Dados do formulário
	$idContaContabil = $_POST['idContaContabil'];

	//Consulta todas as despesas dado determinada conta contabil
	$despesas = $pdo->prepare("
		Select
			*
		From
			ipsum_tidespesas
		Where
			idContaContabil = ?
	");

	$despesas->execute(array($idContaContabil));

	$lista = '';

	$lista .= '<td colspan = "14">';

		$lista .= '<table class = "dataTable editableTable" id = "subItensTable">';
			while($resDespesas = $despesas->fetch(PDO::FETCH_OBJ)){
				$lista .= '<tr>';
				 	$lista .= '<td title = "'. $resDespesas->despesa .'" class = "overflow"><b>'. $resDespesas->despesa .'</b></td>';
			        $lista .= '<td class = "jan '. $resDespesas->idDespesa .'">R$ '.number_format(str_replace('R$ ', '', $resDespesas->jan), 2, ',', '.') .'</td>';
			        $lista .= '<td class = "fev '. $resDespesas->idDespesa .'">R$ '.number_format(str_replace('R$ ', '', $resDespesas->fev), 2, ',', '.') .'</td>';
			        $lista .= '<td class = "mar '. $resDespesas->idDespesa .'">R$ '.number_format(str_replace('R$ ', '', $resDespesas->mar), 2, ',', '.') .'</td>';
			        $lista .= '<td class = "abr '. $resDespesas->idDespesa .'">R$ '.number_format(str_replace('R$ ', '', $resDespesas->abr), 2, ',', '.') .'</td>';
			        $lista .= '<td class = "mai '. $resDespesas->idDespesa .'">R$ '.number_format(str_replace('R$ ', '', $resDespesas->mai), 2, ',', '.') .'</td>';
			        $lista .= '<td class = "jun '. $resDespesas->idDespesa .'">R$ '.number_format(str_replace('R$ ', '', $resDespesas->jun), 2, ',', '.') .'</td>';
			        $lista .= '<td class = "jul '. $resDespesas->idDespesa .'">R$ '.number_format(str_replace('R$ ', '', $resDespesas->jul), 2, ',', '.') .'</td>';
			        $lista .= '<td class = "ago '. $resDespesas->idDespesa .'">R$ '.number_format(str_replace('R$ ', '', $resDespesas->ago), 2, ',', '.') .'</td>';
			        $lista .= '<td class = "sete '. $resDespesas->idDespesa .'">R$ '.number_format(str_replace('R$ ', '', $resDespesas->sete), 2, ',', '.') .'</td>';
			        $lista .= '<td class = "outu '. $resDespesas->idDespesa .'">R$ '.number_format(str_replace('R$ ', '', $resDespesas->outu), 2, ',', '.') .'</td>';
			        $lista .= '<td class = "nov '. $resDespesas->idDespesa .'">R$ '.number_format(str_replace('R$ ', '', $resDespesas->nov), 2, ',', '.') .'</td>';
			        $lista .= '<td class = "dez '. $resDespesas->idDespesa .'">R$ '.number_format(str_replace('R$ ', '', $resDespesas->dez), 2, ',', '.') .'</td>';
		        $lista .= '</tr>';
			}
		$lista .= '</table>';

	$lista .= '</td>';

	echo $lista;

	//Fecha conexão
	$pdo = null;

?>