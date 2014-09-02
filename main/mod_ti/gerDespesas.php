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

    <table class = "dataTable" id = "initialTable">
      
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
                                echo '<option id = "'. $resNatureza->idDespesaNatureza .'">'. $resNatureza->naturezaDespesa .'</option>';
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
                                echo '<option id = "'. $resTipo->idDespesaTipo .'">'. $resTipo->tipoDespesa .'</option>';
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
                                echo '<option id = "'. $resContaContabilSelect->idContaContabil .'">'. $resContaContabilSelect->contaContabil .'</option>';
                            }
                        ?>
                    </select>
                </td>
            </tr>

            <tr class = "fakeRow"> </tr>
        </table>

        <table>
            <tr>
                <td> <label for = "descricao"> Descrição: </label> </td>
            </tr>

            <tr>
                <td> <textarea name = "descricao" id = "descricao"> </textarea> </td>
            </tr>
        </table>

         <table>
            <tr>
                <td> <label for = "observacao"> Observação: </label> </td>
            </tr>

            <tr>
                <td> <textarea name = "observacao" id = "observacao"> </textarea></td>
            </tr>
        </table>

        <table>
            <tr>    
                <td> <input type = "button" id = "addDespesaBtn" name = "addDespesaBtn" value = "Adicionar"></td>
            </tr>
        </table>
    </form>    
</div>