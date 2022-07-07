<?php
    session_start();

    if ((isset($_SESSION["login"]) && ($_SESSION["login"] == TRUE))){
        header("Location: #");
        die;
    }
    else{
        $id = $_SESSION["ID"];
        $con = mysqli_connect("localhost", "root", "", "naturebabd");

        if (isset($_SESSION["Type"]) && ($_SESSION["Type"] == "C")){
            if ((isset($_POST["height"])) && (isset($_POST["weight"])) && (isset($_POST["sex"]))){
                $height = $_POST["height"];
                $weight = $_POST["weight"];
                $sex = $_POST["sex"];

                    $sql = "UPDATE `contas` SET `Altura` = '$height', `Peso` = '$weight', `Sexo` = '$sex' WHERE `contas`.`ID` = $id;";
                    $res = mysqli_query($con, $sql);

                        header("Location: login.php");
            }
        }
        else if (isset($_SESSION["Type"]) && ($_SESSION["Type"] == "N")){
            if ((isset($_POST["cpf"])) && (isset($_POST["crm"])) && (isset($_POST["city"])) && (isset($_POST["uf"]))){
                $cpf = $_POST["cpf"];
                $crm = $_POST["crm"];
                $city = $_POST["city"];
                $uf = $_POST["uf"];

                    $vcpf = "SELECT * FROM `contas` WHERE `CPF` = '$cpf';";
                    $vcrm = "SELECT * FROM `contas` WHERE `CRM` = '$crm';";
                    $resa = mysqli_query($con, $vcpf);
                    $resb = mysqli_query($con, $vcrm);

                    if ($linha = mysqli_fetch_array($resa)){
                        $_POST["message"] = 1;
                    }
                    else if ($linha = mysqli_fetch_array($resb)){
                        $_POST["message"] = 2;
                    }
                    else{
                        $sql = "UPDATE `contas` SET `CPF` = '$cpf', `CRM` = '$crm', `Cidade` = '$city', `Estado` = '$uf' WHERE `contas`.`ID` = $id;";
                        $res = mysqli_query($con, $sql);

                            header("Location: login.php");
                    }
            }
        }
        else{
            header("Location: register.php");
        }

        if (isset($_FILES["image"]["name"])&&($_FILES["image"]["error"] == 0)){
            $tmp = $_FILES["image"]["tmp_name"];
            $name = $_FILES["image"]["name"];
            $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    
            if(strstr(".jpg;.jpeg;.gif;.png", $ext)){
                $newname = uniqid(time()) . "." . $ext;
                $local = "../../images/profile/".$newname;
    
                    if(move_uploaded_file($tmp, $local)){
                        $sql =  "UPDATE `contas` SET `Imagem` = '$newname' WHERE `contas`.`ID` = '$id';";
                        $res = @mysqli_query($con, $sql);
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
            if(!isset($_POST["message"])){
                echo "<style>
                        div.account-content{
                            margin-top: 2%;
                        }
                        div.account-message{
                            display: none;
                        }
                    </style>";
            }
            else{
                echo "<style>
                        div.account-content{
                            margin-top: 16px;
                        }
                    </style>";
            }
        ?>
    </head>

    <body>
        <div class="account-content">
            <div class="center">
                <h1 class="account">Completar perfil</h1>

                <div class="account-message">
                    <?php
                        if ((isset($_POST["message"])) && ($_POST["message"] == 1)){
                            echo "<p class='account-message'>CPF já cadastrado</p>";
                        }
                        else if ((isset($_POST["message"])) && ($_POST["message"] == 2)){
                            echo "<p class='account-message'>CRM já cadastrado</p>";
                        }
                    ?>
                </div>  <!-- account-message -->
                
                <div class="account-forms">
                    <?php
                        if ($_SESSION["Type"] == "C"){
                            ?>
                            <form action="complete.php" autocomplete="off" enctype="multipart/form-data" method="post">
                                <img class="account" id="preview" src="../../images/profile/no-profile.png">
                                <label class="account-file" for="image"><div class="account-file"></div></label>
                                <input class="account-file" id="image" name="image" type="file"><br><br>

                                <label class="account" for="height">Altura</label><br>
                                <input class="account" id="height" max="220" min="100" name="height" placeholder="Em centimetros" required type="number"><br><br>

                                <label class="account" for="weight">Peso</label><br>
                                <input class="account" id="weight" max="300" min="40" name="weight" placeholder="Aproximadamente, em quilogramas" required type="number"><br><br>

                                <label class="account" for="sex">Sexo</label><br>
                                <select class="account" id="sex" name="sex" required>
                                    <option disabled hidden selected value="">Selecionar</option>
                                    <option value="F">Feminino</option>
                                    <option value="M">Masculino</option>
                                    <option value="O">Prefiro não dizer</option>
                                </select><br><br><br>

                                <input class="account-submit" id="complete" name="complete" type="submit" value="Completar"><br><br>
                            </form>
                            <?php
                        } 
                        else if ($_SESSION["Type"] == "N"){
                            ?>
                            <form action="complete.php" autocomplete="off" enctype="multipart/form-data" method="post">
                                <img class="account" id="preview" src="../../images/profile/no-profile.png">
                                <label class="account-file" for="image"><div class="account-file"></div></label>
                                <input class="account-file" id="image" name="image" type="file"><br><br>

                                <label class="account" for="height">CPF</label><br>
                                <input class="account" id="cpf" maxlength="11" minlength="11" name="cpf" placeholder="12345678910" required type="number"><br><br>

                                <label class="account" for="weight">CRM</label><br>
                                <input class="account" id="crm" maxlength="11" minlength="11" name="crm" placeholder="123456789XY" required type="text"><br><br>

                                <h3 class="account">Localização</h3>
                                <input class="account" id="city" maxlength="50" name="city" placeholder="Cidade" required style="width: 270px;" type="text">
                                <input class="account" id="uf" maxlength="2" minlength="2" name="uf" placeholder="UF" required style="width: 50px;" type="text"><br><br><br>

                                <input class="account-submit" id="complete" name="complete" type="submit" value="Completar"><br><br>
                            </form>
                            <?php
                        }
                    ?>
                </div>

                <script>
                    document.getElementById("image").onchange = function(){
                        var reader = new FileReader();

                        reader.onload = function (e){
                            document.getElementById("preview").src = e.target.result;
                        };

                        reader.readAsDataURL(this.files[0]);
                    }
                </script>
            </div>  <!-- center -->
        </div>  <!-- account-content -->
    </body>

</html>
