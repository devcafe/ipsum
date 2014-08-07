<?php 
    require("../../conf/conn.php");
    include("../../actions/security.php"); 
?>

<!-- Javascript -->
<script src="mod_ti/resources/js/gerDespesas.js"></script>

<!-- CSS -->
<link rel="stylesheet" href = "mod_ti/resources/css/gerDespesas.css">

<div class = "formInner">
    <form method = "post" id = "formGerDespesas">
        <legend>  Gerenciar despesas </legend>
        <div class = "painel">
            <ul>
                <li><div class = "addContaContabil" id = "addContaContabil"> Cadastrar conta contabil </div></li>
                <li><div class = "addDespesa" id = "addDespesa"> Cadastrar despesa </div></li>
            </ul>
	   </div>

    <table class = "dataTable">
        <tr>
            <th> Conta contabil </th>
            <th> Jan </th>
            <th> Fev </th>
            <th> Mar </th>
            <th> Abr </th>
            <th> Mai </th>
            <th> Jun </th>
            <th> Jul </th>
            <th> Ago </th>
            <th> Set </th>
            <th> Out </th>
            <th> Nov </th>
            <th> Dec </th>
        </tr>
        <!-- Traz todas as contas contabeis -->
        <?php
            //Query para retornar todas as contas contabeis
            $contaContabil = $pdo->prepare("
                Select 
                    *
                From 
                    ipsum_ticontacontabil
            ");

            $contaContabil->execute();

            $lista = '';

            while($resContaContabil = $contaContabil->fetch(PDO::FETCH_OBJ)){
                $lista .= '<tr>';
                    $lista .= '<td id = "contabil_'. $resContaContabil->idContaContabil .'"><div class = "expand"> + </div>'. $resContaContabil->contaContabil . '</td>';

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

            echo $lista;

        ?>
    </table>

    </form>
</div>

<!-- Cadastrar conta contabil -->
<div id = "cadContaContabil" title = "Adicionar conta contabil">
    <legend>  Adicionar conta contabil </legend>	
    <form id = "cadContaContabilForm">
        <label for = "contaContabil"> Conta contabil: </label>
        <input type = "text" name = "contaContabil" id = "contaContabil">

        <input type = "button" id = "addContaContabilBtn" name = "addContaContabilBtn" value = "Adicionar">
    </form>    
</div>

<!-- Cadastrar despesa -->
<div id = "cadDespesa" title = "Adicionar despesa">
    <legend>  Adicionar despesa </legend>    
    <form id = "cadDespesaForm">
        <table class = "addDespesa">
            <tr> 
                <td class = "despesaNome"> <label for = "despesa"> Despesa: </label> </td>
                <td> <input type = "text" name = "despesa" id = "despesa"> </td>
            </tr>

            <tr class = "fakeRow"> </tr>
        </table>      

        <table>
            <tr>
                <td>
                    <label for = "selectNatureza"> Natureza </label>
                    <select name = "selectNatureza" id = "selectNatureza">
                        <?php
                            $natureza = $pdo->prepare("Select * From ipsum_tidespesanatureza");
                            $natureza->execute();

                            while($resNatureza = $natureza->fetch(PDO::FETCH_OBJ)){
                                echo '<option id = "nat_'. $resNatureza->idDespesaNatureza .'">'. $resNatureza->naturezaDespesa .'</option>';
                            }
                        ?>
                    </select>
                </td>
                <td>
                    <label for = "selectTipo"> Tipo </label>
                    <select name = "selectTipo" id = "selectTipo">
                        <?php
                            $tipo = $pdo->prepare("Select * From ipsum_tidespesatipo");
                            $tipo->execute();

                            while($resTipo = $tipo->fetch(PDO::FETCH_OBJ)){
                                echo '<option id = "tipo_'. $resTipo->idDespesaTipo .'">'. $resTipo->tipoDespesa .'</option>';
                            }
                        ?>
                    </select>
                </td>
            </tr>

            <tr class = "fakeRow"> </tr>
        </table>

        <table>
            <tr>
                <td> 
                    <label for = "qtdeItens"> Quantidade: </label>
                    <input type = "text" name = "qtdeItens" id = "qtdeItens">
                </td>

                <td>
                    <label for = "dataAquisicao"> Data aquisição: </label>
                    <input type = "text" name = "dataAquisicao" id = "dataAquisicao">
                </td>
            </tr>

            <tr class = "fakeRow"> </tr>
        </table>

        <table>
            <tr>
                <td>
                    <label for = "fornecedor"> Fornecedor: </label>
                    <input type = "text" name = "fornecedor" id = "fornecedor">
                </td>
                <td>
                    <label for = "nf"> NF: </label>
                    <input type = "text" name = "nf" id = "nf">
                </td>
            </tr>

            <tr class = "fakeRow"> </tr>
        </table>

        <table>
            <tr>
                <td>
                    <label for = "selectContaContabil"> Conta contabil </label>
                    <select name = "selectContaContabil" id = "selectContaContabil">
                        <?php
                            $contaContabilSelect = $pdo->prepare("Select * From ipsum_ticontacontabil");
                            $contaContabilSelect->execute();

                            while($resContaContabilSelect = $contaContabilSelect->fetch(PDO::FETCH_OBJ)){
                                echo '<option id = "tipo_'. $resContaContabilSelect->idContaContabil .'">'. $resContaContabilSelect->contaContabil .'</option>';
                            }
                        ?>
                    </select>
                </td>
            </tr>

            <tr class = "fakeRow"> </tr>
        </table>




        <label for = "descricao"> Descrição: </label>
        <textarea name = "descricao" id = "descricao"> </textarea>

        <label for = "observacao"> Observação: </label>
        <textarea name = "observacao" id = "observacao"> </textarea>

        <input type = "button" id = "addDespesaBtn" name = "addDespesaBtn" value = "Adicionar">
    </form>    
</div>