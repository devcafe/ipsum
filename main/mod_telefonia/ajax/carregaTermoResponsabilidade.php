<?php
	include("../../../conf/conn.php");
	include("../../../lib/fpdf/WriteHTML.php");

	//Leitura das datas
	$dia = date('d');
	$mes = date('m');
	$ano = date('Y');
	$semana = date('w');
	 
	//Meses 	 
	switch ($mes){
		case 1: $mes = "Janeiro"; break;
		case 2: $mes = "Fevereiro"; break;
		case 3: $mes = "Março"; break;
		case 4: $mes = "Abril"; break;
		case 5: $mes = "Maio"; break;
		case 6: $mes = "Junho"; break;
		case 7: $mes = "Julho"; break;
		case 8: $mes = "Agosto"; break;
		case 9: $mes = "Setembro"; break;
		case 10: $mes = "Outubro"; break;
		case 11: $mes = "Novembro"; break;
		case 12: $mes = "Dezembro"; break;
	}

	//Set timezone
	date_default_timezone_set('America/Sao_Paulo');
	$timezone = date_default_timezone_get();

	//Pega hora
	$hora = date('H:i');

	//Pega todos os dados (aparelho, linha, usuário e empresa)
	$sql = $pdo->prepare("
		Select	
			a.*
			,b.*
	        ,c.*
		From 
			ipsum_linhasmoveis a
			Inner Join ipsum_linhasmoveisaparelhos b On (a.`idAparelho` = b.idAparelho)
	        Inner Join ipsum_usuarioslinhamoveis c On (a.`idUsuarioMovel` = c.idUsuarioMovel)
		Where
			a.idLinha = ?
	");

	$sql->execute(array($_GET['term']));

	$res = $sql->fetch(PDO::FETCH_OBJ);

	$pdf=new PDF_HTML();
	$pdf->AddPage();
	$pdf->SetFont('Arial');
	$pdf->WriteHTML('		
		
		<p align="center">
		    <strong>TERMO DE RESPONSABILIDADE E ENTREGA </strong>
		</p>
		<p align="center">
		    <strong>DE APARELHO SMARTPHONE</strong>
		</p>
		<div>
		<b>CAFÉ EXPRESSO SERVIÇOS DE TERCEIRIZAÇÃO DE MÃO DE OBRA LTDA.,</b> empresa com sede na Rua Tabapuã, n. 474, 1º andar, Itaim Bibi, 
		município de São Paulo, Estado de São Paulo, devidamente inscrita no CNPJ/MF sob o n. 06.349.679/0001-05, entrega neste ato, 
		o <b>APARELHO '. $res->tipo .'</b> Tipo <b>'. $res->marcaAparelho .'</b>, Marca/modelo <b>'. $res->modeloAparelho .'</b>, Número de Série<b>'. $res->imeiAparelho .'</b>, habilitado em 5/6/14, Linha 
		Número<b>'. $res->numLinha .'</b>, referente ao ICCID de nº <b>'. $res->iccid .'</b>, com os seguintes acessórios: <b>'. $res->acessorios .'</b> ao Sr.(a) <b>'. $res->nome .'</b>, '. $res->profissao .', portador(a) do RG sob o n.<b>'. $res->rg .'</b>, 
		 inscrito no CPF/MF sob o n. <b>'. $res->cpf .'</b>, doravante denominado simplesmente <b>"USUÁRIO"</b> sob as seguintes condições:
		</div>

		<br>

		<ul>
			<li> 2.	É de integral conhecimento do USUÁRIO, que deverá usar o aparelho em conformidade com as instruções apresentadas; </li><br><br>
			<li> 3.	O equipamento deverá ser utilizado ÚNICA e EXCLUSIVAMENTE a serviço da empresa tendo em vista a atividade a ser exercida pelo USUÁRIO, em horário comercial ; </li><br><br>
			<li> 4.	Após o horário de trabalho estabelecido, o USUÁRIO não deverá utilizar o aparelho, pois somente poderá ser utilizado no desempenho de suas funções; </li><br><br>
			<li> 5.	Ficará o USUÁRIO responsável pela guarda, manuseio e utilização correta e conservação do equipamento, no desempenho de suas funções, respeitando a política interna da empresa quanto ao uso do equipamento destinado a CAFÉ COMUNICAÇÃO;</li><br><br>
			<li> 6.	O USUÁRIO tem somente a DETENÇÃO DO EQUIPAMENTO, tendo em vista o uso exclusivo para prestação de serviços profissionais e NÃO a PROPRIEDADE do equipamento, sendo terminantemente proibido o empréstimo, aluguel ou cessão deste para terceiros;</li><br><br>
			<li> 7.	Informamos que este equipamento, ora recebido pelo USUÁRIO, está vinculado a um comodato de 24 meses; </li><br><br>
			<li> 8.	Informamos ao USUÁRIO que este aparelho é rastreado e possui seguro contra roubo e furto; </li><br><br>
			<li> 9.	Havendo necessidade de alteração na configuração do equipamento, o USUÁRIO deverá entregar o aparelho para a empresa efetuar as devidas alterações; </li><br><br>
			<li> 10.	Ao término da prestação de serviço ou do contrato individual de trabalho, o USUÁRIO compromete-se a devolver o equipamento por escrito, através de termo de devolução do aparelho e seus acessórios. O aparelho deverá ser entregue em perfeito estado de uso e conservação no dia em que for comunicado ou comunique seu desligamento;</li><br><br>
			<li> 11.	Nos casos de substituição ou transferência de equipamento, o USUÁRIO observará o procedimento do item 8 acima, além de ser feito novo termo de responsabilidade para o uso do novo equipamento;</li><br><br>
			<li> 12.	O USUÁRIO deverá comunicar a empresa por escrito e de imediato, quando o aparelho apresentar qualquer tipo de problema ou defeito, ou quando ocorrer perda, furto ou roubo;</li><br><br>
			<li> 13.	O USUÁRIO está ciente que qualquer dano causado por dolo, imprudência, imperícia e negligência no uso do aparelho deverá ser comunicado por escrito e de imediato para a empresa, tornando-se responsável pelo ressarcimento dos prejuízos gerados pelo dano causado ao APARELHO;</li><br><br>
			<li> 14.	Caso o APARELHO apresente problemas que o tornem inapto e sem condições de conserto, o USUÁRIO deverá restituir à empresa um novo APARELHO ou o valor correspondente em dinheiro;</li><br><br>
		</ul>

		Observação:  A empresa CAFÉ  alerta que a utilização do APARELHO pelo motorista com veículo em movimento é proibida pela legislação de trânsito, sendo recomendável estacionar o veículo para o uso do mesmo.<br>

		O USUÁRIO declara que leu e esta ciente de todas as cláusulas expostas no presente termo, e concordando com as mesmas, recebe neste ato o celular ora descrito.<br><br><br><br><br>

 Local: <br><br>
		Data: '. $dia .' de '. $mes .' de '. $ano .'<br><br>
		Hora:  '. $hora .'<br><br><br><br><br><br>



		____________________________________________________<br>
	 	Nome Legível de quem recebeu o equipamento e Assinatura<br><br><br><br><br><br><br>


		___________________________________________________<br>
		Nome Legível do funcionário que entregou o equipamento e Assinatura

	');
	$pdf->Output();