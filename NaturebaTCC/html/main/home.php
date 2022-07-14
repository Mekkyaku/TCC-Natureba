<?php
    session_start();

    if ((!isset($_SESSION["login"]) || ($_SESSION["login"] == FALSE))){
        header("Location: ../account/login.php");
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

    <body class="main">

    

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
                            <li><div class="main-header-profile-button" onclick="link('../account/logout.php')" style="border-bottom-left-radius: 5px; border-bottom-right-radius: 5px">Sair</div></li>
                        </ul>
                    </div>
                </div>
                <button class="main-header" onfocus="divShow('profile')"><?php echo "<img class='main-header-profile' src='../../images/profile/" . $user["Imagem"] . "'>"?></button>
            </div>
        </div>

        <div class="main-side">
            <ul class="main">
                <li><a href="home.php"><button class="main-side">
                       <table>
                        <tr><td class="main-side-image"><img class="main-side" src="../../images/misc/home.png"></td>
                        <td class="main-side-text"><p class="main-side">Home</p></td></tr>
                    </table>
                </button></a></li>

                <li><a href="diary.php"><button class="main-side">
                    <table>
                        <tr><td class="main-side-image"><img class="main-side" src="../../images/misc/diary.png"></td>
                        <td class="main-side-text"><p class="main-side">Diário</p></td></tr>
                    </table>
                </button></a></li>

                <li><a href="diet.php"><button class="main-side">
                    <table>
                        <tr><td class="main-side-image"><img class="main-side" src="../../images/misc/diet.png"></td>
                        <td class="main-side-text"><p class="main-side">Dieta</p></td></tr>
                    </table>
                </button></a></li>

                <li><a href="foods.php"><button class="main-side">
                    <table>
                        <tr><td class="main-side-image"><img class="main-side" src="../../images/misc/foods.png"></td>
                        <td class="main-side-text"><p class="main-side">Alimentos</p></td></tr>
                    </table>
                </button></a></li>

                <li><a href="recipes.php"><button class="main-side">
                    <table>
                        <tr><td class="main-side-image"><img class="main-side" src="../../images/misc/recipes.png"></td>
                        <td class="main-side-text"><p class="main-side">Receitas</p></td></tr>
                    </table>
                </button></a></li>

                <li><a href="professionals.php"><button class="main-side">
                    <table>
                        <tr><td class="main-side-image"><img class="main-side" src="../../images/misc/professionals.png"></td>
                        <td class="main-side-text"><p class="main-side">Profissionais</p></td></tr>
                    </table>
                </button></a></li>
            </ul>
        </div>  
    </body>

</html>