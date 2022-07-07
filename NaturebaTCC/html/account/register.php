<?php
    session_start();

    if ((isset($_SESSION["login"]) && ($_SESSION["login"] == TRUE))){
        header("Location: #");
        die;
    }
    else{
        if (isset($_POST["name"]) && isset($_POST["last"]) && isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["day"]) && isset($_POST["month"]) && isset($_POST["year"]) && isset($_POST["option"])){
            $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
            $last = filter_input(INPUT_POST, "last", FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
            $password = $_POST["pass"];
            $day = $_POST["day"];
            $month = $_POST["month"];
            $year = $_POST["year"];
            $option = $_POST["option"];

                $con = mysqli_connect("localhost", "root", "", "naturebabd");
                $sql = "SELECT * FROM `contas` WHERE `Email` = '$email';";
                $res = mysqli_query($con, $sql);

                    $bi = $year % 4;

                if (($day == 31) && ($month != 1) && ($month != 3) && ($month != 5) && ($month != 7) && ($month != 8) && ($month != 10) && ($month != 1)){
                    $_POST["message"] = 1;
                }
                else if (($month == 2) && ($day > 29)){
                    $_POST["message"] = 1;
                }
                else if (($bi != 0) && ($month == 2) && ($day == 29)){
                    $_POST["message"] = 1;
                }
                else if ($linha = mysqli_fetch_array($res)){
                    $_POST["message"] = 2;
                }
                else if (strlen($password) < 6){
                    $_POST["message"] = 3;
                }
                else{
                    $hash = password_hash($password, PASSWORD_DEFAULT);

                        $sql = "INSERT INTO `contas` VALUE(NULL, '$name', '$last', '$email', '$hash', '$day', '$month', '$year', '$option', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no-profile.png');";
                        $res = mysqli_query($con, $sql);

                            $code = "SELECT * FROM `contas` WHERE `Email` = '$email' LIMIT 1;";
                            $exec = $con->query($code) or die ($con->error);
                            $user = $exec->fetch_assoc();

                                $_SESSION["ID"] = $user["ID"];
                                $_SESSION["Type"] = $option;

                                header("Location: complete.php");
                                die;
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
            if(!isset($_POST["message"])){
                echo "<style>
                        div.account-message{
                            display: none;
                        }
                    </style>";
            }
        ?>
    </head>

    <body>
        <div class="account-content">
            <div class="center">
                <h1 class="account">Criar conta</h1>
                   
                <div class="account-message">
                    <?php
                        if ((isset($_POST["message"])) && ($_POST["message"] == 1)){
                            echo "<p class='account-message'>Data de nascimento inválida</p>";
                        }
                        else if ((isset($_POST["message"])) && ($_POST["message"] == 2)){
                            echo "<p class='account-message'>E-mail já cadastrado</p>";
                        }
                        else if ((isset($_POST["message"])) && ($_POST["message"] == 3)){
                            echo "<p class='account-message'>Senha deve ter pelo menos 6 caracteres</p>";
                        }
                    ?>
                </div>  <!-- account-message -->
                
                <div class="account-forms">
                    <form action="register.php" autocomplete="off" method="post">
                        <h3 class="account">Nome completo</h3>
                        <input class="account" id="name" maxlength="25" name="name" placeholder="Nome" required style="width: 160.25px;" type="text">
                        <input class="account" id="last" maxlength="25" name="last" placeholder="Sobrenome" required style="width: 160.25px;" type="text"><br><br>
                        
                        <label class="account" for="email">E-mail</label><br>
                        <input class="account" id="email" name="email" placeholder="exemplo@exemplo.com" required type="email"><br><br>

                        <label class="account" for="pass">Senha</label><br>
                        <input class="account" id="pass" name="pass" placeholder="••••••••" required type="password"><br><br>

                        <h3 class="account">Data de nascimento</h3>
                        <input class="account" id="day" max="31" min="1" name="day" placeholder="Dia" required style="width: 105px;" type="number">
                        <select class="account" id="month" name="month" required style="width: 106px;">
                            <option disabled hidden selected value="">Mês</option>
                            <option value="1">Janeiro</option>
                            <option value="2">Fevereiro</option>
                            <option value="3">Março</option>
                            <option value="4">Abril</option>
                            <option value="5">Maio</option>
                            <option value="6">Junho</option>
                            <option value="7">Julho</option>
                            <option value="8">Agosto</option>
                            <option value="9">Setembro</option>
                            <option value="10">Outrubro</option>
                            <option value="11">Novembro</option>
                            <option value="12">Dezembro</option>
                        </select>
                        <input class="account" id="year" max="2006" min="1920" name="year" placeholder="Ano" required style="width: 105px;" type="number"><br><br>

                        <h3 class="account">Tipo de conta</h3>
                        <input class="account-radio" id="op1" name="option" required type="radio" value="C">
                        <label class="account-radio" for="op1">Cliente</label><br>
                        <input class="account-radio" id="op2" name="option" required type="radio" value="N">
                        <label class="account-radio" for="op2">Nutricionista</label><br><br>
                        
                        <input class="account-submit" id="register" name="register" type="submit" value="Criar">
                    </form>

                    <p class="account">Já possui uma conta? <a class="account" href="login.php">Entre aqui</a></p>
                </div> <!-- account-forms -->
            </div><br>  <!-- center -->                                                                                                                             
        </div> <!-- account-content -->
    </body>

</html>