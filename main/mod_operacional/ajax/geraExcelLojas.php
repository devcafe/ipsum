<?php
	include("../../../conf/conn.php");
	include("../../../actions/security.php");


	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');

	// create a file pointer connected to the output stream
	$output = fopen('php://output', 'w');

	// output the column headings
	fputcsv($output, array('CodigoPDV', 'CNPJ', 'Bandeira', 'NomePDV', 'UF'), ';', " ");


	$rows = $pdo->prepare('Select * From ipsum_operacionallojas a Inner Join ipsum_operacionalbandeiras b On (a.idEstabBandeira = b.idBandeira)');
	$rows->execute();

	// loop over the rows, outputting them
	while ($row = $rows->fetch(PDO::FETCH_OBJ)) {
		fputcsv($output, array($row->idLoja, $row->cnpj, $row->bandeira, $row->nome, $row->uf), ';', " ");
	}
?>