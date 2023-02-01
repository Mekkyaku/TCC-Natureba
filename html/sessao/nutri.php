<?php
    include "../../php/sessao/sessao.php";
    
    if (!isset($_SESSION["Tipo"]) || ($_SESSION["Tipo"] != "N")){
        header("Location: ../../html/index/");
    }
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <link href="../../css/sessao.css" rel="stylesheet">
        <link href="../../img/site/logo.png" rel="icon">
        <meta charset="UTF-8">
        <meta name="author" content="Adryan, Felipe e Igor">
        <meta name="description" content="Conecte-se com seu nutricionista!">
        <meta name="keywords" content="Nutricionismo, Nutrição, Nutricionista">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Completar perfil</title>
    </head>

    <body onload="error()">
        <div class="middle"></div> 

        <div class="body">
            <h1>Completar perfil</h1>

            <?php
                include "../../php/sessao/erro.php";
            ?>

            <div class="forms">
                <form action="../../php/sessao/nutri.php" autocomplete="off" enctype="multipart/form-data" method="POST">
                    <div style="margin-left: auto; margin-right: auto; margin-top: 16px; width: 150px;">
                        <img class="sessao" id="preview" src="../../img/perfil/no-image.png">
                        <label for="image"><div class="button"></div></label>
                        <input accept="image/*" id="image" name="image" style="display: none;" type="file">
                    </div>

                    <div style="margin-top: 16px">
                        <label for="cpf">CPF</label>
                        <input class="forms" name="cpf" placeholder="12345678910" required type="text">
                    </div>

                    <div style="margin-top: 16px">
                        <label for="crm">CRM</label>
                        <input class="forms" name="crm" placeholder="123456789XY" required type="text">
                    </div>

                    <div style="margin-top: 16px">
                        <label for="localizacao">Localização</label>
                        <div id="localizacao" style="display: flex; justify-content: space-between;">
                            <input class="forms" name="cidade" placeholder="Cidade" require style="width: 83%" type="text">
                            <select class="forms" name="uf" required style="width: 15%">
                                <option disabled hidden selected>UF</option>
                                <option value="AC">AC</option>
                                <option value="AL">AL</option>
                                <option value="AP">AP</option>
                                <option value="AM">AM</option>
                                <option value="BA">BA</option>
                                <option value="CE">CE</option>
                                <option value="DF">DF</option>
                                <option value="ES">ES</option>
                                <option value="GO">GO</option>
                                <option value="MA">MA</option>
                                <option value="MT">MT</option>
                                <option value="MS">MS</option>
                                <option value="MG">MG</option>
                                <option value="PA">PA</option>
                                <option value="PB">PB</option>
                                <option value="PR">PR</option>
                                <option value="PE">PE</option>
                                <option value="PI">PI</option>
                                <option value="RN">RN</option>
                                <option value="RS">RS</option>
                                <option value="RJ">RJ</option>
                                <option value="SC">SC</option>
                                <option value="SP">SP</option>
                                <option value="TO">TO</option>
                            </select>
                        </div>
                    </div>

                    <div style="margin-top: 24px">
                        <input class="submit" type="submit" value="Completar">
                    </div>
                </form>

                <script src="../../js/sessao.js"></script>
            </div>
        </div>
    </body>
</html>