<?php
    include "../../../php/sessao/sessao.php";

    if ((!isset($_SESSION["recover"])) || ($_SESSION["recover"] != 2)){
        header("Location: email.php");
    }
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <link href="../../../css/sessao.css" rel="stylesheet">
        <link href="../../../img/site/logo.png" rel="icon">
        <meta charset="UTF-8">
        <meta name="author" content="Adryan, Felipe e Igor">
        <meta name="description" content="Conecte-se com seu nutricionista!">
        <meta name="keywords" content="Nutricionismo, Nutrição, Nutricionista">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recuperar senha</title>
    </head>

    <body onload="error()">
        <div class="middle"></div> 

        <div class="body">
            <h1>Recuperar senha</h1>

            <div class="h2">
                <h2>Informe o código enviado ao e-mail informado</h2>
            </div>

            <?php
                include "../../../php/sessao/erro.php";
            ?>

            <div class="forms">
                <form action="../../../php/sessao/recover/codigo.php" autocomplete="off" method="POST">
                    <div style="margin-top: 16px">
                        <label for="codigo">Código</label>
                        <input class="forms" name="codigo" placeholder="000000" required type="text">
                    </div>

                    <div style="margin-top: 24px">
                        <input class="submit" type="submit" value="Continuar">
                    </div>

                    <div style="margin-top: 8px">
                        <p class="link" style="text-align: center;"><a href="../login.php">Voltar à página de login</a></p>
                    </div>
                </form>
            </div>
        </div>

        <script src="../../../js/sessao.js"></script>
    </body>
</html>