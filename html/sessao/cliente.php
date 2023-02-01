<?php
    include "../../php/sessao/sessao.php";
    
    if (!isset($_SESSION["Tipo"]) || ($_SESSION["Tipo"] != "C")){
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

    <body>
        <div class="middle"></div> 

        <div class="body">
            <h1>Completar perfil</h1>

            <div class="forms">
                <form action="../../php/sessao/cliente.php" autocomplete="off" enctype="multipart/form-data" method="POST">
                    <div style="margin-left: auto; margin-right: auto; margin-top: 16px; width: 150px;">
                        <img class="sessao" id="preview" src="../../img/perfil/no-image.png">
                        <label for="image"><div class="button"></div></label>
                        <input accept="image/*" id="image" name="image" style="display: none;" type="file">
                    </div>

                    <div style="margin-top: 16px">
                        <label for="altura">Altura</label>
                        <input class="forms" max="220" min="130" name="altura" placeholder="Em centímetros" type="number">
                    </div>

                    <div style="margin-top: 16px">
                        <label for="peso">Peso</label>
                        <input class="forms" max="400" min="40" name="peso" placeholder="Valor aproximado, em quilos" type="number">
                    </div>

                    <div style="margin-top: 16px">
                        <label for="sexo">Sexo</label>
                        <select class="forms" name="sexo">
                            <option disabled hidden selected>Selecione</option>
                            <option value="F">Feminino</option>
                            <option value="M">Masculino</option>
                            <option value="P">Prefiro não dizer</option>
                        </select>
                    </div>

                    <div style="margin-top: 24px">
                        <input class="submit" type="submit" value="Completar">
                    </div>

                    <div style="margin-top: 8px">
                        <p class="link" style="text-align: center;"><a href="login.php">Fazer isso depois</a></p>
                    </div>
                </form>

                <script src="../../js/sessao.js"></script>
            </div>
        </div>
    </body>
</html>