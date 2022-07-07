<?php
    session_start();

    if ((isset($_SESSION["login"]) && ($_SESSION["login"] == TRUE))){
        header("Location: #");
        die;
    }
    else{
        if (!isset($_SESSION["recover"])){
            $_SESSION["recover"] = 0;
        }

        $con = mysqli_connect("localhost", "root", "", "naturebabd");

        if ($_SESSION["recover"] == 0){
            if (isset($_POST["email"])){
                $sql = "SELECT * FROM `contas`;";
                $res = mysqli_query($con, $sql);

                    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                    $code = "SELECT * FROM `contas` WHERE `Email` = '$email' LIMIT 1;";
                    $exec = $con->query($code) or die($con->error);

                        $user = $exec->fetch_assoc();
                        if (!isset($user["Senha"])){
                            $_POST["message"] = 1;
                        }
                        else{
                            $codigo = rand(100000, 999999);
                            $msg = "Seu código de recuperação de senha do Natureba é " . $codigo;
                            $headers = "From: natureba.site@gmail.com";

                            mail($email, "Código de recuperação de senha Natureba", $msg, $headers);

                            $_SESSION["recover"] = 1;
                            $_SESSION["code"] = $codigo;
                            $_SESSION["email"] = $email;
                        }
            }
        }
        else if ($_SESSION["recover"] == 1){
            if (isset($_POST["code"])){
                $sql = "SELECT * FROM `contas`;";
                $res = mysqli_query($con, $sql);

                    $infocode = $_POST["code"];
                    $email = $_SESSION["email"];
                    $code = "SELECT * FROM `contas` WHERE `Email` = '$email' LIMIT 1;";
                    $exec = $con->query($code) or die($con->error);

                        $user = $exec->fetch_assoc();
                        if ($infocode == $_SESSION["code"]){
                            $_SESSION["recover"] = 2;
                        }
                        else{
                            $_POST["message"] = 2;
                        }

            }
        }
        else if ($_SESSION["recover"] == 2){
            if (isset($_POST["new"])){
                $new = $_POST["new"];
                $email = $_SESSION["email"];
                
                if (strlen($new) >=6){
                    $password = password_hash($new, PASSWORD_DEFAULT);

                    $sql = "UPDATE `contas` SET `Senha` = '$password' WHERE `contas`.`Email` = '$email';";
                    $res = mysqli_query($con, $sql);

                    session_unset();
                    header("Location: login.php");
                } 
                else{
                    $_POST["message"] = 3;
                }

            }
        }
    }
?>

<!DOCTYPE html>

<html lang="pt-br">

    <head>
        <link href="../../css/style.css" rel="stylesheet">
        <link href="../../images/misc/icon.png" rel="icon">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Natureba</title>

        <?php
            if ((!isset($_POST["message"])) && ($_SESSION["recover"] == 0) || (!isset($_POST["message"]))  && ($_SESSION["recover"] == 1) || (!isset($_POST["message"])) && ($_SESSION["recover"] == 2)){
                echo "<style>
                        div.account-content{
                            margin-top: 10.5%;
                        }
                        div.account-message{
                            display: none;
                        }
                    </style>";
            }
            else if ((isset($_POST["message"])) && ($_SESSION["recover"] == 0) || (isset($_POST["message"])) && ($_SESSION["recover"] == 1) || (isset($_POST["message"])) && ($_SESSION["recover"] == 2)){
                echo "<style>
                        div.account-content{
                            margin-top: 9.5%;
                        }
                    </style>";
            }
        ?>
    </head>

    <body>
        <div class="account-content">
            <div class="center">
                <h1 class="account">Redefinir senha</h1>

                <?php
                    if ($_SESSION["recover"] == 0){
                        echo "<h2 class='account'>Informe o e-mail em que sua conta está registrada</h2>";
                    }
                    else if ($_SESSION["recover"] == 1){
                        echo "<h2 class='account'>Informe o código enviado para o seu e-mail</h2>";
                    }
                    else if ($_SESSION["recover"] == 2){
                        echo "<h2 class='account'>Informe sua nova senha, com pelo menos 6 caracteres</h2>";
                    }
                ?>
                
                
                   
                <div class="account-message">
                    <?php
                    
                        if ((isset($_POST["message"])) && ($_POST["message"] == 1)){
                            echo "<p class='account-message'>E-mail não cadastrado</p>";
                        }
                        else if ((isset($_POST["message"])) && ($_POST["message"] == 2)){
                            echo "<p class='account-message'>Código inválido</p>";
                        }
                        else if ((isset($_POST["message"])) && ($_POST["message"]) == 3){
                            echo "<p class='account-message'>A senha deve ter pelo menos 6 caracteres</p>";
                        }
                    ?>
                </div>  <!-- account-message -->
                
                <div class="account-forms">
                    <?php
                        if ($_SESSION["recover"] ==  0){
                            ?>
                            <form action="recover.php" autocomplete="off" method="post">
                                <label class="account" for="email">E-mail</label><br>
                                <input class="account" id="email" name="email" placeholder="exemplo@exemplo.com" required type="email"><br><br><br>

                                <input class="account-submit" id="info-email" name="info-email" type="submit" value="Continuar"><br><br>
                            </form>
                            
                            <p class="account" style="text-align: center;"><a class="account" href="login.php">Voltar à página de login</a></p>
                            <?php
                        }
                        else if ($_SESSION["recover"] == 1){
                            ?>
                            <form action="recover.php" autocomplete="off" method="post">
                                <label class="account" for="code">Código</label><br>
                                <input class="account" id="code" name="code" placeholder="000000" required type="text"><br><br><br>
                                
                                <input class="account-submit" id="info-code" name="info-code" type="submit" value="Continuar"><br><br>
                            </form>

                                
                            <p class="account" style="text-align: center;"><a class="account" href="login.php">Voltar à página de login</a></p>
                            <?php
                        }
                        else if ($_SESSION["recover"] == 2){
                            ?>
                            <form action="recover.php" autocomplete="off" method="post">
                                <label class="account" for="new">Nova senha</label><br>
                                <input class="account" id="new" name="new" placeholder="••••••••" required type="password"><br><br><br>

                                <input class="account-submit" id="info-new" name="info-new" type="submit" value="Redefinir"><br><br>
                            </form>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>

</html>