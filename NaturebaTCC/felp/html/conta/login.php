<?php
    session_start();

    if ((isset($_SESSION["logado"])) && ($_SESSION["logado"] == TRUE)){
            header("Location: ../principal/home.php");
        die;
    }
    else{
        if ((isset($_SESSION["msg"])) && ($_SESSION["msg"] == 3)){
            $_POST["msg"] = 3;
        }

        session_unset();

        if ((isset($_POST["email"])) && (isset($_POST["senha"]))){
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
            $senha = $_POST["senha"];

            $con = mysqli_connect("localhost", "root", "", "natureba");
            $code = "SELECT * FROM `contas` WHERE `email` = '$email' LIMIT 1;";
            $exec = $con->query($code) or die($con->error);
            $user = $exec->fetch_assoc();

            if (!isset($user["senha"])){
                $_POST["msg"] = 1;
            }
            else{
                if (password_verify($senha, $user["senha"])){
                    $_SESSION["logado"] = TRUE;
                    $_SESSION["ID"] = $user["ID"];
                    header("Location: ../principal/home.php");
                }
                else{
                    $_POST["msg"] = 2;
                }
            }
        }
    }
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <link href="../../css/style.css" rel="stylesheet">
        <link href="../../img/misc/icon.png" rel="icon">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Natureba</title>
    </head>

    <body onload="msg()" style="background-color: #E5E5E5;">
        <div class="conta-body" style="margin-top: 11%;">
            <h1 class="conta">Entrar</h1>

            <div class="msg" id="msg" <?php if(!isset($_POST["msg"])){ echo "style='display:none'";}?>>
                <?php
                    if (isset($_POST["msg"])){
                        if ($_POST["msg"] == 1){
                            echo "<p class='msg'>E-mail inválido</p>";
                        }
                        else if ($_POST["msg"] == 2){
                            echo "<p class='msg'>Senha inválida</p>";
                        }
                        else if ($_POST["msg"] == 3){
                            echo "<p class='msg'>Conta criada com sucesso</p>";
                        }
                    }
                ?>
            </div>

            <div class="conta-form">
                <form action="login.php" autocomplete="off" method="post">
                    <div style="padding-bottom: 16px;">
                        <label class="conta" for="email">E-mail</label>
                        <input class="conta" id="email" name="email" placeholder="exemplo@exemplo.com" required type="email">
                    </div>

                    <div style="padding-bottom: 8px;">
                        <label class="conta" for="senha">Senha</label>
                        <input class="conta" id="senha" name="senha" placeholder="••••••••" required type="password">
                    </div>

                    <div style="padding-bottom: 32px;">
                        <p class="conta"><a class="conta" href="senha.php">Esqueceu sua senha?</a></p>
                    </div>

                    <div style="padding-bottom: 8px;">
                        <input class="submit" id="submit" name="submit" type="submit" value="Entrar">
                    </div>
                </form>

                <p class="conta">Não possui uma conta? <a class="conta" href="registro.php">Crie aqui</a></p>

            </div>            
        </div>
        
        <script src="../../js/script.js"></script>
    </body>
</html>