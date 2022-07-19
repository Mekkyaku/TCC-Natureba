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
        else if (!isset($_GET["id"])){
            header("Location: list-alimento.php");
            die;
        }
        else{
            $ida = $_GET["id"];
            $code = "SELECT * FROM `alimentos` WHERE `ID` = '$ida' LIMIT 1;";
            $exec = $con ->query($code) or die($con->error);
            $alimento = $exec->fetch_assoc();

            if ((isset($_POST["nome"])) && (isset($_POST["categoria"])) && (isset($_POST["tag"])) && (isset($_POST["info"]))){
                $nome = $_POST["nome"];
                $categoria = $_POST["categoria"];
                $tag = $_POST["tag"];
                $info = $_POST["info"];

                $sql = "UPDATE `alimentos` SET `nome` = '$nome', `categoria` = '$categoria', `tag` = '$tag', `info` = '$info' WHERE `alimentos`.`ID` = '$ida';";
                $res = mysqli_query($con, $sql);

                    if (isset($_FILES["image"]["name"])&&($_FILES["image"]["error"] == 0)){
                        $tmp = $_FILES["image"]["tmp_name"];
                        $name = $_FILES["image"]["name"];
                        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                                
                            if(strstr(".jpg;.jpeg;.gif;.png", $ext)){
                                $newname = uniqid(time()) . "." . $ext;
                                $local = "../../../img/alimento/".$newname;
                                
                                if(move_uploaded_file($tmp, $local)){
                                    $sql =  "UPDATE `alimentos` SET `imagem` = '$newname' WHERE `alimentos`.`ID` = '$ida';";
                                    $res = @mysqli_query($con, $sql);
                                }
                            }
                    }

                header("Location: admin.php?msg=2");
                    
            }
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
                        <h1 class="admin">Adicionar alimento</h1>
                    </div>
                    <div style="padding-bottom: 32px;">
                        <h2 class="admin">Preencha os campos abaixo para edita o alimento selecionado</h2>
                    </div>
                    <div class="adm-form">
                        <form action="edit-alimento.php?id=<?php echo $alimento['ID'];?>" autocomplete="off" enctype="multipart/form-data" method="post">
                            <div style="display: flex; padding-bottom: 16px; width: 100%;">
                                <div>
                                    <img class="adm-form" id="preview" src="../../../img/alimento/<?php echo $alimento['imagem'];?>">
                                    <label for="image"><div class="file" style="margin-left: 150px; position: relative; z-index: 2;"></div></label>
                                    <input class="file" id="image" name="image" type="file">
                                </div>
                                <div style="padding-left: 32px; padding-top: 20px; width: 100%">
                                    <div style="padding-bottom: 16px;">
                                        <label class="adm" for="nome">Nome</label>
                                        <input class="adm" id="nome" name="nome" placeholder="Nome do alimento" required type="text" value="<?php echo $alimento['nome'];?>"> 
                                    </div>
                                    <div>
                                        <label class="adm" for="categoria">Categoria</label>
                                        <select class="adm" id="categoria" name="categoria" required>
                                            <option disabled hidden selected value="0">Selecionar</option>
                                            <option value="A" <?php if ($alimento["categoria"] == 'A'){ echo "selected";}?>>Categoria A</option>
                                            <option value="B" <?php if ($alimento["categoria"] == 'B'){ echo "selected";}?>>Categoria B</option>
                                            <option value="C" <?php if ($alimento["categoria"] == 'C'){ echo "selected";}?>>Categoria C</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div style="padding-bottom: 16px;">
                                <label class="adm" for="tag">Tags</label>
                                <textarea class="adm" id="tag" name="tag" oninput="grown(tag)" placeholder="Tags" required><?php echo $alimento['tag'];?></textarea>
                            </div>
                            <div style="padding-bottom: 32px;">
                                <label class="adm" for="info">Informações nutricionais</label>
                                <textarea class="adm" id="info" name="info" placeholder="Informações nutricionais" required style="height: 200px; max-height:none;"><?php echo $alimento['info'];?></textarea>
                            </div>
                            <div>
                                <input class="submit" id="submit" name="submit" type="submit" value="Editar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="../../../js/script.js"></script>
    </body>
    
</html>