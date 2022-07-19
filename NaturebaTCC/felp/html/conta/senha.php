<?php
    session_start();

    if ((isset($_SESSION["logado"])) && ($_SESSION["logado"] == TRUE)){
        header("Location: ../principal/home.php");
        die;
    }
    else{
        if (!isset($_SESSION["x"])){
            $_SESSION["x"] = 1;
        }

        $con = mysqli_connect("localhost", "root", "", "natureba");

        if ($_SESSION["x"] == 1){
            if (isset($_POST["email"])){
                
                $email = $_POST["email"];
                $code = "SELECT * FROM `contas` WHERE `email` = '$email' LIMIT 1;";
                $exec = $con->query($code) or die($con->error);
                $user = $exec->fetch_assoc();

                if (!isset($user["senha"])){
                    $_POST["msg"] = 1;
                }
                else{
                    $cdg = rand(100000, 999999);
                    $nome = ucfirst(strtolower($user["nome"])) . " " . ucfirst(strtolower($user["sobrenome"]));

                    $msg =  "<html>
                                <body>
                                    <div style='background-color: #F9F9F9; padding: 32px; margin-left: auto; margin-right: auto; width: fit-content;'>
                                        <div style='text-align: center;'>
                                            <h1 style='font-family: arial, sans-serif;font-size: 30px;'>
                                                Olá, " . $nome . "
                                            </h1>
                                        </div>
                                        <div style='text-align: center;'>
                                            <p style='font-family: arial, sans-serif; font-size: 16px; padding-bottom: 16px;'>
                                                Parece que você deseja redefinir sua senha do Natureba - vamos resolver isso!
                                            </p>
                                            <p style='font-family: arial, sans-serif; font-size: 17px; font-weight: bold;'>
                                                Use o código abaixo para redefinir sua senha
                                            </p>
                                        </div>
                                        <div style='background-color: #88FF55; border-radius: 5px;  margin-left: auto; margin-right: auto; padding: 2px; text-align: center; width: 25%;'>
                                            <p style='font-family: arial, sans-serif; font-size: 18px; font-weight: bold; letter-spacing: 4px;'>" . $cdg . "</p>
                                        </div>
                                        <div style='margin-top: 48px; text-align: center;'>
                                            <p style='font-family: arial, sans-serif; font-size: 14px; color: #272727'>
                                                Ignore este email caso você não tenha solicitado a redefinição de sua senha
                                            </p>
                                        </div>
                                    </div>
                                </body>
                            </html>";
                    $headers[] = "MIME-Version: 1.0";
                    $headers[] = "Content-type: text/html; charset=UTF-8";
                    $headers[] = "To: " . $email;
                    $headers[] = "From: natureba.site@gmail.com";
                    mail($email, "Redefinição de senha - Natureba", $msg, implode("\r\n", $headers));

                    $_SESSION["x"] = 2;
                    $_SESSION["cdg"] = $cdg;
                    $_SESSION["email"] = $email;
                }
            }
        }
        if ($_SESSION["x"] == 2){
            if (isset($_POST["codigo"])){
                $codigo = $_POST["codigo"];
                if ($codigo == $_SESSION["cdg"]){
                    $_SESSION["x"] = 3;
                }
                else{
                    $_POST["msg"] = 2;
                }
            }
        }
        if ($_SESSION["x"] == 3){
            if (isset($_POST["nova"])){
                $nova = $_POST["nova"];
                $email = $_SESSION["email"];

                if (strlen($nova) >= 6){
                    $senha = password_hash($nova, PASSWORD_DEFAULT);
                    $sql = "UPDATE `contas` SET `senha` = '$senha' WHERE `contas`.`email` = '$email';";
                    $res = mysqli_query($con, $sql);

                    session_unset();
                    header("Location: login.php");  
                }
                else{
                    $_POST["msg"] = 3;
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
        <div class="conta-body" style="margin-top: 12%;">
            <h1 class="conta">Redefinir senha</h1>

            <?php
                if ($_SESSION["x"] == 1){
                    echo "<h2 class='conta'>Informe o e-mail em que sua conta está registrada</h2>";
                }
                else if ($_SESSION["x"] == 2){
                    echo "<h2 class='conta'>Informe o código enviado para o seu e-mail</h2>";
                }
                else if ($_SESSION["x"] == 3){
                    echo "<h2 class='conta'>Informe sua nova senha</h2>";
                }
            ?>

            <div class="msg" id="msg" <?php if(!isset($_POST["msg"])){ echo "style='display:none'"; }?>>
                <?php
                    if (isset($_POST["msg"])){
                        if ($_POST["msg"] == 1){
                            echo "<p class='msg'>E-mail não cadastrado</p>";
                        }
                        else if ($_POST["msg"] == 2){
                            echo "<p class='msg'>Código inválido</p>";
                        }
                        else if ($_POST["msg"] == 3){
                            echo "<p class='msg'>A senha deve conter pelo menos 6 caracteres</p>";
                        }
                    }
                ?>
            </div>

            <div class="conta-form">
                <?php
                    if ($_SESSION["x"] == 1){ ?>
                        <form action="senha.php" autocomplete="off" method="post">
                            <div style="padding-bottom: 32px;">
                                <label class="conta" for="email">Email</label>
                                <input class="conta" id="email" name="email" placeholder="exemplo@exemplo" required type="email">
                            </div>

                            <div style="padding-bottom: 8px;">
                                <input class="submit" id="submit" name="submit" type="submit" value="Continuar">
                            </div>
                        </form>

                        <p class="conta" style="text-align: center;"><a class="conta" href="login.php">Voltar à página de login</a></p>
                    <?php }
                    else if ($_SESSION["x"] == 2){ ?>
                        <form action="senha.php" autocomplete="off" method="post">
                            <div style="padding-bottom: 32px;">
                                <label class="conta" for="codigo">Código</label>
                                <input class="conta" id="codigo" name="codigo" placeholder="000000" required type="text">
                            </div>

                            <div style="padding-bottom: 8px;">
                                <input class="submit" id="submit" name="submit" type="submit" value="Continuar"> 
                            </div>
                        </form>

                        <p class="conta" style="text-align: center;"><a class="conta" href="login.php">Voltar à página de login</a></p>
                    <?php }
                    else if ($_SESSION["x"] == 3){ ?>
                        <form action="senha.php" autocomplete="off" method="post">
                            <div style="padding-bottom: 32px;">
                                <label class="conta" for="nova">Senha</label>
                                <input class="conta" id="nova" name="nova" placeholder="••••••••" required type="password">
                            </div>

                            <div style="padding-bottom: 16px;">
                                <input class="submit" id="submit" name="submit" type="submit" value="Redefinir">
                            </div>
                        </form>
                <?php } ?>
            </div>            
        </div>

        <script src="../../js/script.js"></script>
    </body>
</html>