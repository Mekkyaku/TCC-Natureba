<?php
    include "../../php/sessao/sessao.php";
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
        <title>Login</title>
    </head>

    <body onload="error()">
        <div class="middle"></div> 

        <div class="body">
            <h1>Entrar</h1>

            <?php
                include "../../php/sessao/erro.php";
            ?>

            <div class="forms">
                <form action="../../php/sessao/login.php" autocomplete="off" method="POST">
                    <div style="margin-top: 16px">
                        <label for="email">E-mail</label>
                        <input class="forms" name="email" placeholder="exemplo@exemplo.com" required type="email">
                    </div>

                    <div style="margin-top: 16px">
                        <label for="senha">Senha</label>
                        <input class="forms" name="senha" placeholder="••••••••" required type="password">
                    </div>

                    <div style="margin-top: 8px">
                        <p class="link"><a href="recover/email.php">Esqueceu sua senha?</a></p>
                    </div>

                    <div style="margin-top: 24px">
                        <input class="submit" type="submit" value="Entrar">
                    </div>

                    <div style="margin-top: 8px">
                        <p class="link">Não possui uma conta? <a href="registro.php">Crie aqui </a></p>
                    </div>
                </form>
            </div>
        </div>

        <script src="../../js/sessao.js"></script>
    </body>
</html>