<?php
    session_start();

    if (!isset($_SESSION["login"]) || ($_SESSION["login"] == FALSE)){
        header("Location: ../html/account/login.php");
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
            header("Location: ../html/main/home.php");
            die;
        }
    }
?>

<!DOCTYPE html>

<html lang="pt-br">

    <head>
        <link href="../css/style.css" rel="stylesheet">
        <link href="../images/misc/icon.png" rel="icon">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../js/script.js"></script>
        <title>Natureba</title>
    </head>

    <body onload="cleber()">
        <div class="main-header">
            <img src="../images/misc/icon-name.png" style="height: 40px;">
           
            <div class="main-header-right">
                <a href="#"><button class="main-header"><img class="main-header" src="../images/misc/chat.png"></button></a>
                    
                <div class="main-header-notification" id="notification" tabindex="0" onfocusout="divHide('notification')">
                    <div class="main-triangle"></div>
                </div>
                <button class="main-header" onclick="divShow('notification')"><img class="main-header" src="../images/misc/notification.png"></button>

                <div class="main-header-profile" id="profile" tabindex="0" onfocusout="divHide('profile')">
                    <div class="main-triangle"></div>
                    <div class="main-header-profile-base">
                        <ul class="main">
                            <li><div class="main-header-profile-button" onclick="link('#')" style="border-top-left-radius: 5px; border-top-right-radius: 5px">Perfil</div></li>
                            <li><div class="main-header-profile-button" onclick="link('#')" style="border-bottom: 1px solid #DDFFAA; border-top: 1px solid #DDFFAA;">Configurações</div></li>
                            <li><div class="main-header-profile-button" onclick="link('../html/account/logout.php')" style="border-bottom-left-radius: 5px; border-bottom-right-radius: 5px">Sair</div></li>
                        </ul>
                    </div>
                </div>
                <button class="main-header" onfocus="divShow('profile')"><?php echo "<img class='main-header-profile' src='../images/profile/" . $user["Imagem"] . "'>"?></button>
            </div>
        </div>

        <div class="main-side">
            <ul class="main">
                <li><a href="../html/main/home.php"><button class="main-side">
                    <table>
                        <tr><td class="main-side-image"><img class="main-side" src="../images/misc/home.png"></td>
                        <td class="main-side-text"><p class="main-side">Home</p></td></tr>
                    </table>
                </button></a></li>

                <li><a href="../html/main/diary.php"><button class="main-side">
                    <table>
                        <tr><td class="main-side-image"><img class="main-side" src="../images/misc/diary.png"></td>
                        <td class="main-side-text"><p class="main-side">Diário</p></td></tr>
                    </table>
                </button></a></li>

                <li><a href="../html/main/diet.php"><button class="main-side">
                    <table>
                        <tr><td class="main-side-image"><img class="main-side" src="../images/misc/diet.png"></td>
                        <td class="main-side-text"><p class="main-side">Dieta</p></td></tr>
                    </table>
                </button></a></li>

                <li><a href="../html/main/foods.php"><button class="main-side">
                    <table>
                        <tr><td class="main-side-image"><img class="main-side" src="../images/misc/foods.png"></td>
                        <td class="main-side-text"><p class="main-side">Alimentos</p></td></tr>
                    </table>
                </button></a></li>

                <li><a href="../html/main/recipes.php"><button class="main-side">
                    <table>
                        <tr><td class="main-side-image"><img class="main-side" src="../images/misc/recipes.png"></td>
                        <td class="main-side-text"><p class="main-side">Receitas</p></td></tr>
                    </table>
                </button></a></li>

                <li><a href="../html/main/professionals.php"><button class="main-side">
                    <table>
                        <tr><td class="main-side-image"><img class="main-side" src="../images/misc/professionals.png"></td>
                        <td class="main-side-text"><p class="main-side">Profissionais</p></td></tr>
                    </table>
                </button></a></li>
                <li><a href='admin.php'><button class='main-side'>
                    <table>
                        <tr><td class='main-side-image'><img class='main-side' src='../images/misc/admin.png'></td>
                        <td class='main-side-text'><p class='main-side'>Admin</p></td></tr>
                    </table>
                </button></a></li>
            </ul>
        </div>ㅤ
        
        <div class="main-body">
            <div class="adm-msg" id="msg" <?php if(!isset($_GET["msg"])){ echo "style='display:none;'";}?>>
                <?php
                if (isset($_GET["msg"])){
                    if ($_GET["msg"] == 1){
                        echo "<p class='adm-msg'>Alimento adicionado com sucesso!</p>";
                    }
                    else if ($_GET["msg"] == 2){
                        echo "<p class='adm-msg'>Alimento editado com sucesso!</p>";
                    }
                }                
                ?>
            </div>
            <table>
                <tr>
                    <td class="adm-left"><div class="adm-option"><p class="adm-option">Adicionar alimentos</p></div></td> 
                    <td class="adm-right"><a href="foods/add-foods.php"><button class="adm-option">ㅤ</button></a></td>
                    <td class="adm-middle"></td>
                    <td class="adm-left"><div class="adm-option"><p class="adm-option">Editar alimentos</p></div></td> 
                    <td class="adm-right"><a href="foods/edit-foods.php"><button class="adm-option">ㅤ</button></a></td>
                </tr>  
            </table>
        </div>

        <script>
            setTimeout( function cleber(){
                document.getElementById('msg').style.visibility = 'hidden';
                document.getElementById('msg').style.opacity = 0;
            }, 3500);
        </script>
    </body>
</html>