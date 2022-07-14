<?php
    session_start();

    if (!isset($_SESSION["login"]) || ($_SESSION["login"] == FALSE)){
        header("Location: ../../html/account/login.php");
        die;
    }
    else{
        $con = mysqli_connect("localhost", "root", "", "naturebabd");
        $id = $_SESSION["ID"];

        $sql = "SELECT * FROM `contas`;";
        $res = mysqli_query($con, $sql);

            $code = "SELECT * FROM `contas` WHERE `ID` = $id LIMIT 1";
            $exec = $con->query($code) or die($con->error);

                 $user = $exec->fetch_assoc();

        if ($user["Conta"] != "A"){
            header("Location: ../../html/main/home.php");
            die;
        }
        else{
            $sql = "SELECT * FROM `alimentos` ORDER BY `Alimento` ASC;";
            $res = mysqli_query($con, $sql);
        }

        if (isset($_POST["name"]) && isset($_POST["category"]) && isset($_POST["tags"]) && isset($_POST["infos"])){
            $name = $_POST["name"];
            $category = $_POST["category"];
            $tags = $_POST["tags"];
            $infos = $_POST["infos"];
            $idedit = $_POST["idedit"];

            if (isset($idedit)){
                echo $idedit;
            };

            $sql = "UPDATE `alimentos` SET `Alimento` = '$name', `Categoria` = '$category', `Tags` = '$tags', `Info` = '$infos' WHERE `alimentos`.`ID` = '$idedit';";
            $rst = mysqli_query($con, $sql);

            if (isset($_FILES["image"]["name"])&&($_FILES["image"]["error"] == 0)){
                $tmp = $_FILES["image"]["tmp_name"];
                $name = $_FILES["image"]["name"];
                $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        
                if(strstr(".jpg;.jpeg;.gif;.png", $ext)){
                    $newname = uniqid(time()) . "." . $ext;
                    $local = "../../images/foods/".$newname;
        
                        if(move_uploaded_file($tmp, $local)){
                            $sql =  "UPDATE `alimentos` SET `Imagem` = '$newname' WHERE `alimentos`.`ID` = '$idedit';";
                            $rlt = @mysqli_query($con, $sql);
                        }
                }
            }

            $_POST["name"] = NULL;
            $_POST["category"] = NULL;
            $_POST["tags"] = NULL;
            $_POST["infos"] = NULL;

            header("Location: ../admin.php?msg=2");
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
        <script src="../../js/script.js"></script>
        <title>Natureba</title>
    </head>

    <body class="no-overflow">
        <div class="main-header">
            <img src="../../images/misc/icon-name.png" style="height: 40px;">
           
            <div class="main-header-right">
                <a href="#"><button class="main-header"><img class="main-header" src="../../images/misc/chat.png"></button></a>
                    
                <div class="main-header-notification" id="notification" tabindex="0" onfocusout="divHide('notification')">
                    <div class="main-triangle"></div>
                </div>
                <button class="main-header" onclick="divShow('notification')"><img class="main-header" src="../../images/misc/notification.png"></button>

                <div class="main-header-profile" id="profile" tabindex="0" onfocusout="divHide('profile')">
                    <div class="main-triangle"></div>
                    <div class="main-header-profile-base">
                        <ul class="main">
                            <li><div class="main-header-profile-button" onclick="link('#')" style="border-top-left-radius: 5px; border-top-right-radius: 5px">Perfil</div></li>
                            <li><div class="main-header-profile-button" onclick="link('#')" style="border-bottom: 1px solid #DDFFAA; border-top: 1px solid #DDFFAA;">Configurações</div></li>
                            <li><div class="main-header-profile-button" onclick="link('../../html/account/logout.php')" style="border-bottom-left-radius: 5px; border-bottom-right-radius: 5px">Sair</div></li>
                        </ul>
                    </div>
                </div>
                <button class="main-header" onfocus="divShow('profile')"><?php echo "<img class='main-header-profile' src='../../images/profile/" . $user["Imagem"] . "'>"?></button>
            </div>
        </div>

        <div class="main-side">
            <ul class="main">
                <li><a href="../../html/main/home.php"><button class="main-side">
                    <table>
                        <tr><td class="main-side-image"><img class="main-side" src="../../images/misc/home.png"></td>
                        <td class="main-side-text"><p class="main-side">Home</p></td></tr>
                    </table>
                </button></a></li>

                <li><a href="../../html/main/diary.php"><button class="main-side">
                    <table>
                        <tr><td class="main-side-image"><img class="main-side" src="../../images/misc/diary.png"></td>
                        <td class="main-side-text"><p class="main-side">Diário</p></td></tr>
                    </table>
                </button></a></li>

                <li><a href="../../html/main/diet.php"><button class="main-side">
                    <table>
                        <tr><td class="main-side-image"><img class="main-side" src="../../images/misc/diet.png"></td>
                        <td class="main-side-text"><p class="main-side">Dieta</p></td></tr>
                    </table>
                </button></a></li>

                <li><a href="../../html/main/foods.php"><button class="main-side">
                    <table>
                        <tr><td class="main-side-image"><img class="main-side" src="../../images/misc/foods.png"></td>
                        <td class="main-side-text"><p class="main-side">Alimentos</p></td></tr>
                    </table>
                </button></a></li>

                <li><a href="../../html/main/recipes.php"><button class="main-side">
                    <table>
                        <tr><td class="main-side-image"><img class="main-side" src="../../images/misc/recipes.png"></td>
                        <td class="main-side-text"><p class="main-side">Receitas</p></td></tr>
                    </table>
                </button></a></li>

                <li><a href="../../html/main/professionals.php"><button class="main-side">
                    <table>
                        <tr><td class="main-side-image"><img class="main-side" src="../../images/misc/professionals.png"></td>
                        <td class="main-side-text"><p class="main-side">Profissionais</p></td></tr>
                    </table>
                </button></a></li>
                <li><a href='../admin.php'><button class='main-side'>
                    <table>
                        <tr><td class='main-side-image'><img class='main-side' src='../../images/misc/admin.png'></td>
                        <td class='main-side-text'><p class='main-side'>Admin</p></td></tr>
                    </table>
                </button></a></li>
            </ul>
        </div>ㅤ

        <div class="main-body">
            <div class="adm-body">
                <h1 class="adm">Editar alimentos</h1><br>

                <?php
                if (!isset($_GET["idedit"])){
                    ?>
                    <form action="edit-foods.php" autocomplete="off" method="get">
                        <div class="main-search">
                            <input class="main-foods" id="search" name="search" placeholder="Pesquisar um alimento..." style="width: 94%;" type="text">
                            <input class="main-search" id="search" name="search" type="submit" value="ㅤ">
                        </div>
                    </form><br>

                    <?php
                    $i = 1;
                    while ($linha = mysqli_fetch_array($res)){
                        $vrf = $i % 2;
                        if ($vrf == 1){
                            echo    "<div class='adm-foods-table'>
                                        <div class='adm-foods-line'>
                                            <img class='adm-efoods' src='../../images/foods/" . $linha["Imagem"] . "'>
                                            <p class='adm-efoods'>" . $linha["Alimento"] . "</p>
                                            <a href='edit-foods.php?idedit=" . $linha["ID"] . "'><button class='adm-edit'>ㅤ</button></a>
                                        </div>";
                        }
                        else if ($vrf == 0){
                            echo        "<div class='adm-foods-line'>
                                            <img class='adm-efoods' src='../../images/foods/" . $linha["Imagem"] . "'></td>
                                            <p class='adm-efoods'>" . $linha["Alimento"] . "</p></td>
                                            <a href='edit-foods.php?idedit=" . $linha["ID"] . "'><button class='adm-edit'>ㅤ</button></a></td>
                                        </div>
                                    </div><br>";
                        }
                        $i++;
                        }
                    }
                    else if(isset($_GET["idedit"])){
                        $idedit = $_GET["idedit"];
                        $code = "SELECT * FROM `alimentos` WHERE `ID` = $idedit LIMIT 1";
                        $exec = $con->query($code) or die($con->error);
                        $food = $exec->fetch_assoc();
                        ?>
                        <div class="center"><form action="edit-foods.php" autocomplete="off" enctype="multipart/form-data" method="post">
                            <div class="center">
                                <img class="adm-foods" id="preview" src="../../images/foods/<?php echo $food["Imagem"];?>">
                                <label class="adm-file" for="image"><div class="adm-file"></div></label>
                                <input class="adm-file" id="image" name="image" type="file">
                            </div><br><br>

                            <table>
                                <tr>
                                    <td>
                                        <label class="adm" for="id">ID</label><br>
                                        <input class="adm" id="id" name="id" readonly style="width: 25px;" type="text" value="<?php echo $food["ID"]; ?>">
                                    </td>
                                    <td>
                                        <label class="adm" for="name">Nome do alimento</label><br>
                                        <input class="adm" id="name" name="name" type="text" placeholder="Nome" required style="width: 250px;" value="<?php echo $food['Alimento'];?>">
                                    </td>
                                    <td>
                                        <label class="adm" for="category">Categoria</label><br>
                                        <select class="adm" id="category" name="category" required>
                                            <option disabled hidden selected value="">Selecionar</option>
                                            <option value="WIP">Categoria</option>
                                        </select>
                                    </td>
                                </tr>
                            </table><br>
                        
                            <label class="adm" for="tags">Tags</label><br>
                            <textarea class="adm" id="tags" name="tags" oninput="autoGrown(tags)" placeholder="Separe as tags por vírgulas" required><?php echo $food['Tags'];?></textarea><br><br>

                            <label class="adm" for="infos">Informações nutricionais</label><br>
                            <textarea class="adm" id="infos" name="infos" required style="height: 200px; max-height:none;"><?php echo $food['Info'];?></textarea><br><br><br>

                            <div class="center">
                                <input class="adm-foods" id="add" name="add" type="submit" value="Editar">
                            </div>
                        </form></div>
                        <?php 
                    }
                    ?>
                
                <script>
                    document.getElementById("image").onchange = function(){
                        var reader = new FileReader();

                        reader.onload = function (e){
                            document.getElementById("preview").src = e.target.result;
                        };

                        reader.readAsDataURL(this.files[0]);
                    }
                </script>
                
            </div>
        </div>
    </body>

</html>