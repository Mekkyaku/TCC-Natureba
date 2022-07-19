<?php
    session_start();

    if ((isset($_SESSION["logado"])) && ($_SESSION["logado"] == TRUE)){
        header("Location: ../principal/home.php");
        die;
    }
    else{
        if (!isset($_SESSION["ID"])){
            header("Location: registro.php");
            die;
        }
        else if ($_SESSION["Tipo"] != "C"){
            header("Location: completar-n.php");
            die;
        }
        else{
            if ((isset($_POST["altura"])) && (isset($_POST["peso"])) && (isset($_POST["sexo"]))){
                $altura = $_POST["altura"];
                $peso = $_POST["peso"];
                $sexo = $_POST["sexo"];
                $id = $_SESSION["ID"];

                $con = mysqli_connect("localhost", "root", "", "natureba");
                $sql = "UPDATE `contas` SET `altura` = '$altura', `peso` = '$peso',`sexo` = '$sexo' WHERE `contas`.`ID` = '$id';";
                $res = mysqli_query($con, $sql);

                if (isset($_FILES["image"]["name"])&&($_FILES["image"]["error"] == 0)){
                    $tmp = $_FILES["image"]["tmp_name"];
                    $name = $_FILES["image"]["name"];
                    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                
                    if(strstr(".jpg;.jpeg;.gif;.png", $ext)){
                        $newname = uniqid(time()) . "." . $ext;
                        $local = "../../img/perfil/".$newname;
                
                        if(move_uploaded_file($tmp, $local)){
                            $sql =  "UPDATE `contas` SET `imagem` = '$newname' WHERE `contas`.`ID` = '$id';";
                            $res = @mysqli_query($con, $sql);
                        }
                    }
                }
                
                session_destroy();
                session_start();
                $_SESSION["msg"] = 3;
                header("Location: login.php");
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
    <body style="background-color: #E5E5E5;">
        <div class="conta-body" style="margin-top: 3.5%;">
            <h1 class="conta">Completar conta</h1>

            <div class="conta-form">
                <form action="completar-c.php" autocomplete="off" enctype="multipart/form-data" method="post">
                    <div style="margin-left: auto; margin-right: auto; padding-bottom: 16px; width: max-content;">
                        <img class="conta" id="preview" src="../../img/perfil/no-image.png">
                        <label for="image"><div class="file"></div></label>
                        <input class="file" id="image" name="image" type="file">
                    </div>

                    <div style="padding-bottom: 16px">
                        <label class="conta" for="altura">Altura</label>
                        <input class="conta" id="altura" max="220" min="100" name="altura" placeholder="Informe o valor em centímetros" required type="number"> 
                    </div>

                    <div style="padding-bottom: 16px">
                        <label class="conta" for="peso">Peso</label>
                        <input class="conta" id="peso" max="300" min="40" name="peso" placeholder="Informe o valor aproximado em quilos" required type="number">
                    </div>

                    <div style="padding-bottom: 32px">
                        <label class="conta" for="sexo">Sexo</label>
                        <select class="conta" id="sexo" name="sexo" required>
                            <option disabled hidden selected value="">Selecionar</option>
                            <option value="F">Feminino</option>
                            <option value="M">Masculino</option>
                            <option value="O">Prefiro não dizer</option>
                        </select>
                    </div>

                    <div style="padding-bottom: 8px">
                        <input class="submit" id="submit" name="submit" type="submit" value="Completar">
                    </div>
                </form>
            </div>
        </div>
        
        <script src="../../js/script.js"></script>
    </body>
</html>