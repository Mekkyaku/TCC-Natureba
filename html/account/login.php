<?php
    session_start();

    if ((isset($_SESSION["login"]) && ($_SESSION["login"] == TRUE))){
        header("Location: ../main/home.php");
        die;
    }
    else{
        session_unset();
        
        if ((isset($_POST["email"])) && (isset($_POST["password"]))){
            $con = mysqli_connect("localhost", "root", "", "naturebabd");
            $sql = "SELECT * FROM `contas`;";
            $res = mysqli_query($con, $sql);    

                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                $password = $_POST["password"];

                $code = "SELECT * FROM `contas` WHERE `Email` = '$email' LIMIT 1";
                $exec = $con->query($code) or die($con->error);

                    $user = $exec->fetch_assoc();
                    
                    if (!isset($user["Senha"])){
                        $_POST["message"] = 1;
                    }
                    else{
                        if(password_verify($password, $user["Senha"])){
                            $_SESSION["login"] = TRUE;
                            $_SESSION["ID"] = $user["ID"];

                            header("Location: ../main/home.php");
                        }
                        else{
                            $_POST["message"] = 2;
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
            if (!isset($_POST["message"])){
                echo "<style>
                        div.account-content{
                            margin-top: 9.5%;
                        }
                        div.account-message{
                            display: none;
                        }
                    </style>";
            }
            else{
                echo "<style>
                        div.account-content{
                            margin-top: 8.5%;
                        }
                    </style>";
            }
        ?>
    </head>

    <body>
        <div class="account-content">
            <div class="center">
                <h1 class="account">Entrar</h1>

                <div class="account-message">
                    <?php
                        if ((isset($_POST["message"])) && ($_POST["message"] == 1)){
                            echo "<p class='account-message'>E-mail inválido</p>";
                        }
                        else if ((isset($_POST["message"])) && ($_POST["message"] == 2)){
                            echo "<p class='account-message'>Senha inválida</p>";
                        }
                    ?>
                </div>  <!-- account-message -->
                
                <div class="account-forms">
                    <form action="login.php" autocomplete="off" method="post">
                        <label class="account" for="email">E-mail</label><br>
                        <input class="account" id="email" name="email" placeholder="exemplo@exemplo.com" required type="email"><br><br>
                        
                        <label class="account" for="password">Senha</label><br>
                        <input class="account" id="password" name="password" placeholder="••••••••" required type="password"><br>

                        <p class="account" style="margin-top: 8px;"><a class="account" href="recover.php">Esqueceu sua senha?</a></p><br>
                        
                        <input class="account-submit" id="login" name="login" type="submit" value="Entrar">
                    </form>

                    <p class="account">Não possui uma conta? <a class="account" href="register.php">Crie aqui</a></p>
                </div> <!-- account-forms -->
            </div><br>  <!-- center -->                                                                                                                             
        </div> <!-- account-content -->
    </body>

</html>