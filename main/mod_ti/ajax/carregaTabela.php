<?php 
    require("../../../conf/conn.php");
    include("../../../actions/security.php"); 

    $lista = '';

    $lista .= '<tr class = "theFirst">';
        $lista .= '<th class = "toFix" style = "width:200px" > Conta contabil </th>';
        $lista .= '<th> Jan </th>';
        $lista .= '<th> Fev </th>';
        $lista .= '<th> Mar </th>';
        $lista .= '<th> Abr </th>';
        $lista .= '<th> Mai </th>';
        $lista .= '<th> Jun </th>';
        $lista .= '<th> Jul </th>';
        $lista .= '<th> Ago </th>';
        $lista .= '<th> Set </th>';
        $lista .= '<th> Out </th>';
        $lista .= '<th> Nov </th>';
        $lista .= '<th> Dez </th>';
    $lista .= '</tr>';

    //Query para retornar todas as contas contabeis
    $contaContabil = $pdo->prepare("
        Select 
            *
        From 
            ipsum_ticontacontabil
    ");

    $contaContabil->execute();

    while($resContaContabil = $contaContabil->fetch(PDO::FETCH_OBJ)){
        $lista .= '<tr>';
            $lista .= '<td class = "toFix" id = "contabil_'. $resContaContabil->idContaContabil .'"><div class = "expand '. $resContaContabil->idContaContabil .' plus"> </div>'. $resContaContabil->contaContabil . '</td>';

            //Totaliza o valor da conta contabil para cada mes
            $despesas = $pdo->prepare("
               Select
                    Sum(replace(jan, 'R$ ', '')) As Jan,
                    Sum(replace(fev, 'R$ ', '')) As Fev,
                    Sum(replace(mar, 'R$ ', '')) As Mar,
                    Sum(replace(abr, 'R$ ', '')) As Abr,
                    Sum(replace(mai, 'R$ ', '')) As Mai,
                    Sum(replace(jun, 'R$ ', '')) As Jun,
                    Sum(replace(jul, 'R$ ', '')) As Jul,
                    Sum(replace(ago, 'R$ ', '')) As Ago,
                    Sum(replace(sete, 'R$ ', '')) As Sete,
                    Sum(replace(outu, 'R$ ', '')) As Outu,
                    Sum(replace(nov, 'R$ ', '')) As Nov,
                    Sum(replace(dez, 'R$ ', '')) As Dez
                From 
                    ipsum_tidespesas
                Where
                    idContaContabil = ?
            ");

            $despesas->execute(array($resContaContabil->idContaContabil));
            $total = $despesas->fetch(PDO::FETCH_OBJ);

            $lista .= '<td> R$  '. number_format($total->Jan, 2, ',', '.') .'</td>';
            $lista .= '<td> R$  '. number_format($total->Fev, 2, ',', '.') .'</td>';
            $lista .= '<td> R$  '. number_format($total->Mar, 2, ',', '.') .'</td>';
            $lista .= '<td> R$  '. number_format($total->Abr, 2, ',', '.') .'</td>';
            $lista .= '<td> R$  '. number_format($total->Mai, 2, ',', '.') .'</td>';
            $lista .= '<td> R$  '. number_format($total->Jun, 2, ',', '.') .'</td>';
            $lista .= '<td> R$  '. number_format($total->Jul, 2, ',', '.') .'</td>';
            $lista .= '<td> R$  '. number_format($total->Ago, 2, ',', '.') .'</td>';
            $lista .= '<td> R$  '. number_format($total->Sete, 2, ',', '.') .'</td>';
            $lista .= '<td> R$  '. number_format($total->Outu, 2, ',', '.') .'</td>';
            $lista .= '<td> R$  '. number_format($total->Nov, 2, ',', '.') .'</td>';
            $lista .= '<td> R$  '. number_format($total->Dez, 2, ',', '.') .'</td>';
        $lista .= '</tr>';

        $lista .= '<tr class = "subitens" id = "subItens_'. $resContaContabil->idContaContabil .'">';
           
        $lista .= '</tr>';
    }

    //Total geral
    $despesasGeral = $pdo->prepare("
       Select
            Sum(replace(jan, 'R$ ', '')) As Jan,
            Sum(replace(fev, 'R$ ', '')) As Fev,
            Sum(replace(mar, 'R$ ', '')) As Mar,
            Sum(replace(abr, 'R$ ', '')) As Abr,
            Sum(replace(mai, 'R$ ', '')) As Mai,
            Sum(replace(jun, 'R$ ', '')) As Jun,
            Sum(replace(jul, 'R$ ', '')) As Jul,
            Sum(replace(ago, 'R$ ', '')) As Ago,
            Sum(replace(sete, 'R$ ', '')) As Sete,
            Sum(replace(outu, 'R$ ', '')) As Outu,
            Sum(replace(nov, 'R$ ', '')) As Nov,
            Sum(replace(dez, 'R$ ', '')) As Dez
        From 
            ipsum_tidespesas");

    $despesasGeral->execute();
    $totalGeral = $despesasGeral->fetch(PDO::FETCH_OBJ);

    $lista .= '<tr>';
        $lista .= '<td class = "toFix"> <b> Total </b></td>';
        $lista .= '<td><b> R$  '. number_format($totalGeral->Jan, 2, ',', '.') .'</b></td>';
        $lista .= '<td><b> R$  '. number_format($totalGeral->Fev, 2, ',', '.') .'</b></td>';
        $lista .= '<td><b> R$  '. number_format($totalGeral->Mar, 2, ',', '.') .'</b></td>';
        $lista .= '<td><b> R$  '. number_format($totalGeral->Abr, 2, ',', '.') .'</b></td>';
        $lista .= '<td><b> R$  '. number_format($totalGeral->Mai, 2, ',', '.') .'</b></td>';
        $lista .= '<td><b> R$  '. number_format($totalGeral->Jun, 2, ',', '.') .'</b></td>';
        $lista .= '<td><b> R$  '. number_format($totalGeral->Jul, 2, ',', '.') .'</b></td>';
        $lista .= '<td><b> R$  '. number_format($totalGeral->Ago, 2, ',', '.') .'</b></td>';
        $lista .= '<td><b> R$  '. number_format($totalGeral->Sete, 2, ',', '.') .'</b></td>';
        $lista .= '<td><b> R$  '. number_format($totalGeral->Outu, 2, ',', '.') .'</b></td>';
        $lista .= '<td><b> R$  '. number_format($totalGeral->Nov, 2, ',', '.') .'</b></td>';
        $lista .= '<td><b> R$  '. number_format($totalGeral->Dez, 2, ',', '.') .'</b></td>';
    $lista .= '</tr>';   

     $lista .= '<tr style = "visibility:hidden">';
        $lista .= '<td> <b> Total </b></td>';
        $lista .= '<td></td>';
        $lista .= '<td></td>';
        $lista .= '<td></td>';
        $lista .= '<td></td>';
        $lista .= '<td>></td>';
        $lista .= '<td></td>';
        $lista .= '<td></td>';
        $lista .= '<td></td>';
        $lista .= '<td></td>';
        $lista .= '<td></td>';
        $lista .= '<td></td>';
        $lista .= '<td></td>';
    $lista .= '</tr>';  

    echo $lista;

?>