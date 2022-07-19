<?php
    session_start();

    if ((isset($_SESSION["logado"])) && ($_SESSION["logado"] == TRUE)){    
        header("Location: ../principal/home.php");
        die;
    }
    else{
        $data = date('Y');
        $min = $data - 16;
        $max = $data - 100;

        if ((isset($_POST["nome"])) && (isset($_POST["sobrenome"])) && (isset($_POST["email"])) && (isset($_POST["senha"])) && (isset($_POST["dia"])) && (isset($_POST["mes"])) && (isset($_POST["ano"])) && (isset($_POST["opcao"]))){
            $nome = strtoupper(filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS));
            $sobrenome = strtoupper(filter_input(INPUT_POST, "sobrenome", FILTER_SANITIZE_SPECIAL_CHARS));
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
            $senha = $_POST["senha"];
            $dia = $_POST["dia"];
            $mes = $_POST["mes"];
            $ano = $_POST["ano"];
            $opcao = $_POST["opcao"];

            $con = mysqli_connect("localhost", "root", "", "natureba");
            $sql = "SELECT * FROM `contas` WHERE `Email` = '$email';";
            $res = mysqli_query($con, $sql);

                $bi = $ano % 4;

            if (($dia == 31) && ($mes != 1) && ($mes != 3) && ($mes != 5) && ($mes != 7) && ($mes != 8) && ($mes != 10) && ($mes != 12)){
                $_POST["msg"] = 1;
            }
            else if (($mes == 2) && ($dia > 29)){
                $_POST["msg"] = 1;
            }
            else if (($bi != 0) && ($mes == 2) && ($dia == 29)){
                $_POST["msg"] = 1;
            }
            else if ($linha = mysqli_fetch_array($res)){
                $_POST["msg"] = 2;
            }
            else if (strlen($senha) < 6){
                $_POST["msg"] = 3;
            }
            else{
                $hash = password_hash($senha, PASSWORD_DEFAULT);

                $sql = "INSERT INTO `contas` VALUE(NULL, '$nome', '$sobrenome', '$email', '$hash', '$dia', '$mes', '$ano', '$opcao', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no-image.png');";
                $res = mysqli_query($con, $sql);

                $code = "SELECT * FROM `contas` WHERE `Email` = '$email' LIMIT 1;";
                $exec = $con->query($code) or die ($con->error);
                $user = $exec->fetch_assoc();

                $_SESSION["ID"] = $user["ID"];
                $_SESSION["Tipo"] = $user["tipo"];

                if ($_SESSION["Tipo"] == "C"){
                    header("Location: completar-c.php");
                }
                else if ($_SESSION["Tipo"] == "N"){
                    header("Location: completar-n.php");
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
    <body style="background-color: #E5E5E5;" onload="msg()">
        <div class="conta-body" style="margin-top: 2.5%;">
            <h1 class="conta">Criar conta</h1>

            <div class="msg" id="msg" <?php if(!isset($_POST["msg"])){ echo "style='display:none'";}?>>
                <?php
                    if (isset($_POST["msg"])){
                        if ($_POST["msg"] == 1){
                            echo "<p class='msg'>Data de nascimento inválida</p>";
                        }
                        else if ($_POST["msg"] == 2){
                            echo "<p class='msg'>E-mail já cadastrado</p>";
                        }
                        else if ($_POST["msg"] == 3){
                            echo "<p class='msg'>A senha deve conter pelo menos 6 caracteres</p>";
                        }
                    }
                ?> 
            </div>

            <div class="conta-form">
                <form action="registro.php" autocomplete="off" method="post">
                    <div style="padding-bottom: 16px">
                        <h3 class="conta">Nome completo</h3>
                        <input class="conta" id="nome" maxlenght="30" name="nome" placeholder="Nome" required style="width: 49%;" type="text">
                        <input class="conta" id="sobrenome" maxlenght="30" name="sobrenome" placeholder="Sobrenome" required style="width: 49.5%;" type="text">
                    </div>

                    <div style="padding-bottom: 16px">
                        <label class="conta" for="email">E-mail</label>
                        <input class="conta" id="email" maxlength="250" name="email" placeholder="exemplo@exemplo.com" required type="email">
                    </div>

                    <div style="padding-bottom: 16px">
                        <label class="conta" for="senha">Senha</label>
                        <input class="conta" id="senha" maxlenght="50" name="senha" placeholder="••••••••" required type="password">
                    </div>

                    <div style="padding-bottom: 16px">
                        <h3 class="conta">Data de nascimento</h3>
                        <input class="conta" id="dia" max="31" min="1" name="dia" placeholder="Dia" required style="width: 32%" type="number">
                        <select class="conta" id="mes" name="mes" required style="width: 33%">
                            <option disabled hidden selected>Mês</option>
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
                        <input class="conta" id="ano" max="<?php echo $min; ?>" min="<?php echo $max; ?>" name="ano" placeholder="Ano" required style="width: 32%" type="number">
                    </div>

                    <div style="padding-bottom: 32px">
                        <h3 class="conta">Tipo de conta</h3>
                        <div>
                            <input class="conta-radio" id="op1" name="opcao" required type="radio" value="C">
                            <label class="conta-radio" for="op1">Cliente</label>
                        </div>
                        <div>
                            <input class="conta-radio" id="op2" name="opcao" required type="radio" value="N">
                            <label class="conta-radio" for="op2">Nutricionista</label>
                        </div>
                    </div>

                    <div style="padding-bottom: 8px;">
                        <input class="submit" id="submit" name="submit" type="submit" value="Criar">
                    </div>
                </form>

                <p class="conta">Já possui uma conta? <a class="conta" href="login.php">Entre aqui</a></p>
                
            </div>
        </div>
            
        <script src="../../js/script.js"></script>
    </body>
</html>