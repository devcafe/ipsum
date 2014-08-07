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

	$lista .= '<td colspan = "12">';

		$lista .= '<table class = "dataTable" id = "subItensTable">';
			while($resDespesas = $despesas->fetch(PDO::FETCH_OBJ)){
				$lista .= '<tr>';
				 	$lista .= '<td class = "overflow">'. $resDespesas->despesa .'</td>';
			        $lista .= '<td>R$ '.number_format(str_replace('R$ ', '', $resDespesas->jan), 2, ',', '.') .'</td>';
			        $lista .= '<td>R$ '.number_format(str_replace('R$ ', '', $resDespesas->fev), 2, ',', '.') .'</td>';
			        $lista .= '<td>R$ '.number_format(str_replace('R$ ', '', $resDespesas->mar), 2, ',', '.') .'</td>';
			        $lista .= '<td>R$ '.number_format(str_replace('R$ ', '', $resDespesas->abr), 2, ',', '.') .'</td>';
			        $lista .= '<td>R$ '.number_format(str_replace('R$ ', '', $resDespesas->mai), 2, ',', '.') .'</td>';
			        $lista .= '<td>R$ '.number_format(str_replace('R$ ', '', $resDespesas->jun), 2, ',', '.') .'</td>';
			        $lista .= '<td>R$ '.number_format(str_replace('R$ ', '', $resDespesas->jul), 2, ',', '.') .'</td>';
			        $lista .= '<td>R$ '.number_format(str_replace('R$ ', '', $resDespesas->ago), 2, ',', '.') .'</td>';
			        $lista .= '<td>R$ '.number_format(str_replace('R$ ', '', $resDespesas->sete), 2, ',', '.') .'</td>';
			        $lista .= '<td>R$ '.number_format(str_replace('R$ ', '', $resDespesas->outu), 2, ',', '.') .'</td>';
			        $lista .= '<td>R$ '.number_format(str_replace('R$ ', '', $resDespesas->nov), 2, ',', '.') .'</td>';
			        $lista .= '<td>R$ '.number_format(str_replace('R$ ', '', $resDespesas->dez), 2, ',', '.') .'</td>';
		        $lista .= '</tr>';
			}
		$lista .= '</table>';

	$lista .= '</td>';

	echo $lista;

	//Fecha conexão
	$pdo = null;

?>