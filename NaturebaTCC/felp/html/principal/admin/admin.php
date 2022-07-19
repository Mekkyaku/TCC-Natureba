<?php
    session_start();

    if((!isset($_SESSION["logado"])) || ($_SESSION["logado"] == FALSE)){
        header("Location: ../../conta/login.php");
        die;
    }
    else{
        $con = mysqli_connect("localhost", "root", "", "natureba");
        $id = $_SESSION["ID"];

        $code = "SELECT * FROM `contas` WHERE `ID` = '$id' LIMIT 1;";
        $exec = $con->query($code) or die($con->error);
        $user = $exec->fetch_assoc();

        if ($user["tipo"] != "A"){
            header("Location: ../home.php");
            die;
        }

        date_default_timezone_set('America/Sao_Paulo');
        $hora = date("H");
        if ($hora >= 4 && $hora <= 11){
            $sd = "Bom dia, ";
        }
        else if ($hora >= 12 && $hora <= 17){
            $sd = "Boa tarde, ";
        }
        else if ($hora >= 18 || $hora <= 3){
            $sd = "Boa noite, ";
        }
    }
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <head>
        <link href="../../../css/style.css" rel="stylesheet">
        <link href="../../../img/misc/icon.png" rel="icon">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Natureba</title>
    </head>
    <body style="background-color: #FDFDFD; overflow: hidden;" onload="msg()">
        <div class="header">
            <div class="header-esquerda">
                <button class="header" id="hide" onclick="hideside()">
                    <img class="header" src="../../../img/misc/menu.png" style="height: 30px; width: 30px;">
                </button>
                <button class="header" id="show" onclick="showside()" style="display: none;">
                    <img class="header" src="../../../img/misc/menu.png" style="height: 30px; width: 30px;">
                </button>
                <img class="header-logo" src="../../../img/misc/icon.png">
            </div>
            
            <div class="header-direita">
                <a href="#"><button class="header"><img class="header" src="../../../img/misc/chat.png"></button></a>
                <button class="header" onclick="show('noti')">
                    <img class="header" src="../../../img/misc/<?php if (1 == 0){ echo 'sino-ping.png';}else{ echo 'sino.png';}?>">
                </button>
                <button class="header" onclick="show('perfil')">
                    <img class="header-perfil" src="../../../img/perfil/<?php echo $user['imagem'];?>">
                </button>
            </div>
        </div>

            <div class="header-noti" id="noti" tabindex="0" onfocusout="hide('noti')">
                <div style="padding-bottom: 16px;">
                        <h1 class="noti">Notificações</h1>
                </div>
                <div>
                        <p class="header-noti">Sem notificações</p>
                </div>
            </div>

            <div class="header-perfil" id="perfil" tabindex="0" onfocusout="hide('perfil')">
                <div class="header-block" onclick="link('#')">
                    <p class="header-perfil">Perfil</p>
                </div>
                <div class="header-block" onclick="link('#')" style="border-bottom: 2px solid #F6F6F6; border-top: 2px solid #F4F4F4;">
                    <p class="header-perfil">Configurações</p>
                </div>
                <div class="header-block" onclick="link('../../conta/logout.php')">
                    <p class="header-perfil">Sair</p>
                </div>
            </div>

        <div class="body">
            <div class="side" id="side">
                <div class="side-cell" onclick="link('../home.php')">
                    <img class="side" src="../../../img/misc/home.png"><p class="side">Home</p>
                </div>
                <div class="side-cell" onclick="link('../diario/diario.php')">
                    <img class="side" src="../../../img/misc/diario.png"><p class="side">Diáro</p>
                </div>
                <div class="side-cell" onclick="link('../dieta/dieta.php')">
                    <img class="side" src="../../../img/misc/dieta.png"><p class="side">Dieta</p>
                </div>
                <div class="side-cell" onclick="link('../alimentos/alimentos.php')">
                    <img class="side" src="../../../img/misc/alimento.png"><p class="side">Alimentos</p>
                </div>
                <div class="side-cell" onclick="link('../receitas/receitas.php')">
                    <img class="side" src="../../../img/misc/receita.png"><p class="side">Receitas</p>
                </div>
                <div class="side-cell" onclick="link('../profissionais/profissionais.php')">
                    <img class="side" src="../../../img/misc/profissionais.png"><p class="side">Profissionais</p>
                </div>

                <?php if ($user["tipo"] == "A"){ ?>
                    <div class="side-cell" onclick="link('../admin/admin.php')">
                        <img class="side" src="../../../img/misc/admin.png"><p class="side">Admin</p>
                    </div>  <?php
                }?>
            </div>

            <div class="conteudo">
                <div class="conteudo-body">
                    <div style="display: flex; padding-bottom: 16px;">
                        <img class="header-logo" src="../../../img/misc/icon.png">
                        <h1 class="admin">Natureba</h1>
                    </div>
                    <div style="padding-bottom: 32px;">
                        <h2 class="admin"><?php echo $sd . ucfirst(strtolower($user["nome"]));?>!</h2>
                        <h2 class="admin">Selecione abaixo a função que deseja utilizar</h2>
                    </div>
                    <div class="msg" id="msg" <?php if(!isset($_GET["msg"])){ echo "style='display:none'";}?>>
                        <?php
                            if (isset($_GET["msg"])){
                                if ($_GET["msg"] == 1){
                                    echo "<p class='msg'>Alimento adicionado com sucesso</p>";
                                }
                                else if ($_GET["msg"] == 2){
                                    echo "<p class='msg'>Alimento editado com sucesso</p>";
                                }
                            }
                        ?>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding-bottom: 16px; padding-top: 16px;">
                        <div class="admin-op" onclick="link('add-alimento.php')">
                            <p class="admin">Adicionar alimentos</p>
                            <img class="admin" src="../../../img/misc/avancar.png">
                        </div>
                        <div class="admin-op" onclick="link('list-alimento.php')">
                            <p class="admin">Editar alimentos</p>
                            <img class="admin" src="../../../img/misc/avancar.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="../../../js/script.js"></script>
    </body>
    
</html>