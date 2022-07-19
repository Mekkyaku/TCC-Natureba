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
        else if ($_SESSION["Tipo"] != "N"){
            header("Location: completar-c.php");
            die;
        }
        else{
            if ((isset($_POST["cpf"])) && (isset($_POST["crm"])) && (isset($_POST["cidade"])) && (isset($_POST["uf"]))){   
                $cpf = $_POST["cpf"];
                $crm = strtoupper(filter_input(INPUT_POST, "crm", FILTER_SANITIZE_SPECIAL_CHARS));
                $cidade = strtoupper(filter_input(INPUT_POST, "cidade", FILTER_SANITIZE_SPECIAL_CHARS));
                $uf = $_POST["uf"];
                $id = $_SESSION["ID"];

                $con = mysqli_connect("localhost", "root", "", "natureba");
                $vcpf = "SELECT * FROM `contas` WHERE `cpf` = '$cpf';";
                $vcrm = "SELECT * FROM `contas` WHERE `crm` = '$crm';";
                $resa = mysqli_query($con, $vcpf);
                $resb = mysqli_query($con, $vcrm);

                if ($linha = mysqli_fetch_array($resa)){
                    $_POST["msg"] = 1;
                }
                else if ($linha = mysqli_fetch_array($resb)){
                    $_POST["msg"] = 2;
                }
                else{
                    $sql = "UPDATE `contas` SET `cpf` = '$cpf', `crm` = '$crm', `cidade` = '$cidade', `uf` = '$uf' WHERE `contas`.`ID` = '$id';";
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
                                $res = mysqli_query($con, $sql);
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
        <div class="conta-body" style="margin-top: 3%;">

            <h1 class="conta">Completar conta</h1>

            <div class="msg" id="msg" <?php if(!isset($_POST["msg"])){ echo "style='display:none'";}?>>
            <?php
                if (isset($_POST["msg"])){
                    if ($_POST["msg"] == 1){
                        echo "<p class='msg'>CPF já cadastrado</p>";
                    }
                    else if ($_POST["msg"] == 2){
                        echo "<p class='msg'>CRM já cadastrado</p>";
                    }
                }
            ?>
            </div>

            <div class="conta-form">
                <form action="completar-n.php" autocomplete="off" enctype="multipart/form-data" method="post">
                    <div style="margin-left: auto; margin-right: auto; padding-bottom: 16px; width: max-content;">
                        <img class="conta" id="preview" src="../../img/perfil/no-image.png">
                        <label for="image"><div class="file"></div></label>
                        <input class="file" id="image" name="image" type="file">
                    </div>

                    <div style="padding-bottom: 16px">
                        <label class="conta" for="cpf">CPF</label>
                        <input class="conta" id="cpf" maxlenght="11" minlenght="11" name="cpf" placeholder="12345678910" required type="number"> 
                    </div>

                    <div style="padding-bottom: 16px">
                        <label class="conta" for="crm">CRM</label>
                        <input class="conta" id="crm" maxlenght="11" minlenght="11" name="crm" placeholder="123456789XY" required type="text">
                    </div>

                    <div style="padding-bottom: 32px">
                        <h3 class="conta">Localização</h3>
                        <input class="conta" id="cidade" maxlength="30" name="cidade" placeholder="Cidade" required style="width: 75%;" type="text">
                        <select class="conta" id="uf" name="uf" required style="width: 23%;">
                            <option disabled hidden selected>UF</option>
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AP">AP</option>
                            <option value="AM">AM</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MT">MT</option>
                            <option value="MS">MS</option>
                            <option value="MG">MG</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PR">PR</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="RN">RN</option>
                            <option value="RS">RS</option>
                            <option value="RJ">RJ</option>
                            <option value="SC">SC</option>
                            <option value="SP">SP</option>
                            <option value="TO">TO</option>
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