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

        $pesquisa = NULL;
        $categoria = NULL;

        if ((isset($_GET["psq"])) && ($_GET["psq"] != "")){
            $pesquisa = $_GET["psq"];
        }
        else if (isset($_GET["pesquisa"])){
            $pesquisa = $_GET["pesquisa"];
        }

        if ((isset($_GET["ctg"])) && ($_GET["ctg"] != "")){
            $categoria = $_GET["ctg"];
        }
        else if (isset($_GET["categoria"])){
            $categoria = $_GET["categoria"];
        }

        if ((!isset($pesquisa)) && (!isset($categoria))){
            $count = "SELECT COUNT(*) FROM `alimentos`;";
            $sql = "SELECT * FROM `alimentos`";
            $x = 1;
        }
        else if ((isset($pesquisa)) && (!isset($categoria))){
            $count = "SELECT COUNT(*) FROM `alimentos` WHERE `tag` LIKE '%{$pesquisa}%';";
            $sql = "SELECT * FROM `alimentos` WHERE `tag` LIKE '%{$pesquisa}%';";
            $x = 2;
        }
        else if ((!isset($pesquisa)) && (isset($categoria))){
            $count = "SELECT COUNT(*) FROM `alimentos` WHERE `categoria` = '$categoria';";
            $sql = "SELECT * FROM `alimentos` WHERE `categoria` = '$categoria';";
            $x = 3;
        }
        else if ((isset($pesquisa)) && (isset($categoria))){
            $count = "SELECT COUNT(*) FROM `alimentos` WHERE `tag` LIKE '%{$pesquisa}%' AND `categoria` = '$categoria';";
            $sql = "SELECT * FROM `alimentos` WHERE `tag` LIKE '%{$pesquisa}%' AND `categoria` = '$categoria';";
            $x = 4;
        }

        $rst = mysqli_query($con, $count);
        $qtd = $rst->fetch_row();

        $res = mysqli_query($con, $sql);
        $array = array();
        while ($linha = mysqli_fetch_array($res)){
            $array[] = $linha["ID"];
        }

        if(!isset($_GET["page"])){
            $_GET["page"] = 1;
        }
        $page = $_GET["page"];

        $min = 50 * ($page - 1);
        if (isset($array[$min])){
            if ($x == 1){
                $sql = "SELECT * FROM `alimentos` WHERE `ID` >= '$array[$min]' LIMIT 50;";
            }
            else if ($x == 2){
                $sql = "SELECT * FROM `alimentos` WHERE `tag` LIKE '%{$pesquisa}%' AND `ID` >= '$array[$min]' LIMIT 50;";
            }
            else if ($x == 3){
                $sql = "SELECT * FROM `alimentos` WHERE `categoria` = '$categoria' AND `ID` >= '$array[$min]' LIMIT 50;";
            }
            else if ($x == 4){
                $sql = "SELECT * FROM `alimentos` WHERE `tag` LIKE '%{$pesquisa}%' AND `categoria` = '$categoria' AND `ID` >= '$array[$min]' LIMIT 50;";
            }
        }
        $res = mysqli_query($con, $sql);
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
    <body style="background-color: #FDFDFD; overflow: hidden;">
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
            <div class="side" id="side" style="z-index: 1;">
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

            <div id="info" style="display: none;">
                <div class="shadow" onclick="hideinfo()"></div>
                <div class="info-body">
                    <div id="result"></div>
                </div>
            </div>
            

            <div class="conteudo">
                <div class="conteudo-body" style="width: 90%;">
                    <div class="pesquisa">
                        <form action="alimentos.php" autocomplete="off" method="get">
                            <input class="pesquisa" id="pesquisa" name="pesquisa" placeholder="Pesquisar um alimento..." style="width: 60%" type="text" value="<?php echo $pesquisa;?>">
                            <select class="pesquisa" id="categoria" name="categoria" style="width: 36%">
                                <option disabled hidden selected>Categoria</option>
                                <option value="A">Categoria A</option>
                                <option value="B">Categoria B</option>
                                <option value="C">Categoria C</option>
                            </select>
                            <input class="pesquisa-submit" id="submit" name="submit" type="submit" value="">
                        </form>
                    </div>
                    <div>
                        <?php
                            $y = 0;
                            $i = 5;
                            while ($linha = mysqli_fetch_array($res)){
                                $vrf = $i % 5;
                                if ($vrf == 0){
                                    echo "<div class='alimento-linha'>";
                                }
                                echo    "<div class='alimento'>
                                            <div>
                                                <img class='alimento' src='../../../img/alimento/" .$linha["imagem"] . "'>
                                            </div>
                                            <div class='alimento-down'>
                                                <button class='alimento-edit' onclick=showinfo(" . $linha["ID"] .")>" . $linha["nome"] . "</button>
                                            </div>
                                        </div>";
                                if ($vrf == 4){
                                    echo "</div>";
                                }
                                $i++;
                                $y = 1;
                            }

                            if ($y == 1){
                                $ghost = 4 - $vrf;
                                while ($ghost != 0){
                                    echo    "<div class='alimento' style='visibility: hidden;'>
                                                <div>
                                                    <img class='alimento' src='../../../img/alimento/no-image.png'>
                                                </div>
                                                <div class='alimento-down'>
                                                    <p>No text :P</p>
                                                </div>
                                            </div>";
                                    if ($ghost == 1){
                                        echo "</div>";
                                    }
                                    $ghost--;   
                                }
                            }
                            else if  ($y == 0){
                                echo    "<div style='padding-top: 40px'>
                                            <p class='alimento-no'>Nenhum alimento encontrado</p>
                                            <a href='alimentos.php' class='alimento-no'>
                                                <p style='padding-top: 8px; text-align: center;'>Voltar</p>
                                            </a>
                                        </div>";
                            }
                        ?>
                        </div>
                        <?php
                            $pgs = ceil($qtd[0] / 50);
                            $i = 1;
                            if ($pgs > 1){
                                echo "<div class='paginas'>";
                                while ($i <= $pgs){
                                    echo    "<a href='alimentos.php?page=" . $i . "&psq=" . $pesquisa . "&ctg=" . $categoria . "'>
                                                <p class='paginas' style='text-decoration: underline;'>" . $i . "</p>
                                            </a>";
                                    if ($i != $pgs){
                                        echo "<p class='paginas'> ・ </p>";
                                    }
                                    $i++;
                                }
                                echo "</div>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <script src="../../../js/script.js"></script>
    </body>
    
</html>