<?php
    include "../../../php/sessao/sessao.php";

    if ((!isset($_SESSION["recover"])) || ($_SESSION["recover"] != 3)){
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
                <h2>Informe qual será sua nova senha</h2>
            </div>

            <?php
                include "../../../php/sessao/erro.php";
            ?>

            <div class="forms">
                <form action="../../../php/sessao/recover/senha.php" autocomplete="off" method="POST">
                    <div style="margin-top: 16px">
                        <label for="senha">Senha nova</label>
                        <input class="forms" name="senha" maxlength="256" placeholder="••••••••" required type="password">
                    </div>

                    <div style="margin-top: 24px">
                        <input class="submit" type="submit" value="Redefinir">
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