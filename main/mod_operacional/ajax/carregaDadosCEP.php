<?php
	header('Content-Type: text/html; charset=UTF-8');

	$cep = $_POST['cep'];
	 
	$reg = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep);
	 
	$dados['sucesso'] = (string) $reg->resultado;
	$dados['rua']     = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', (string) $reg->tipo_logradouro . ' ' . $reg->logradouro ) );
	$dados['bairro']  = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', (string) $reg->bairro ) );
	$dados['cidade']  = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', (string) $reg->cidade ) );
	$dados['estado']  = (string) $reg->uf;

	
	 
	echo json_encode($dados);
?>