<?php
	require("../../../conf/conn.php");

	$acessos = $_POST['acessos'];


	//explode os dados	no seguinte formato : i_1_1,i_1_2,i_1_6,i_1_8,i_2_12,i_3_13,i_4_15,i_4_18,i_5_27,i_6_24,i_6_25
	$acessos = explode(',', $acessos);
	// trata a matriz
	$i = 0;
	foreach ($acessos as $key) {
	//explode os dados	no seguinte formato : i_1_1	
		$acessosA[$i] =	explode('_',$key);
		$i++;
	}
	// separa os modulo de acesso
	$modulos = '';
	foreach ($acessosA as $key => $value) {
		$modulos .= $value[1] . ',';		
	}

	// separa os niveis de acesso de cada módulo
	$nivelAcesso = '';
	foreach ($acessosA as $key => $value) {
		$nivelAcesso .= $value[2] . ',';		
	}

	//retirando a ultima virgula
	$modulos = substr($modulos, 0, -1);
	$nivelAcesso = substr($nivelAcesso, 0, -1);


	//select modulos

	$sqlModulos = $pdo->prepare("select * from ipsum_modulos where idModulo in ($modulos)");
	$sqlModulos->execute();

	$modulosA = '';

	while ($modulos = $sqlModulos->fetch(PDO::FETCH_OBJ)){
		$modulosA .= $modulos->nomeModulo . ' - ' ;
	};

	
	var_dump($modulosA);


	//select nivel de acesso

	$sqlNivelAcessos = $pdo->prepare("select * from ipsum_modulositems where idModuloItem in ($nivelAcesso)");
	$sqlNivelAcessos->execute();

	$nivelAcessoA = '';

	while ($nivelAcesso = $sqlNivelAcessos->fetch(PDO::FETCH_OBJ)){
		
			$nivelAcessoA .= $nivelAcesso->nomeModuloItem . ' - ' ;
	};

	
	var_dump($nivelAcessoA);
?>