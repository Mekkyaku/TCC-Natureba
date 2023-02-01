<?php
    include "../../../php/principal/sessao.php";
    include "../../../php/principal/perfil/perfil.php";

?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <link href="../../../css/base.css" rel="stylesheet">
        <link href="../../../css/header.css" rel="stylesheet">
        <link href="../../../css/side.css" rel="stylesheet">
        <link href="../../../css/perfil.css" rel="stylesheet">
        <link href="../../../img/site/logo.png" rel="icon">
        <meta charset="UTF-8">
        <meta name="author" content="Adryan, Felipe e Igor">
        <meta name="description" content="Conecte-se com seu nutricionista!">
        <meta name="keywords" content="Nutricionismo, Nutrição, Nutricionista">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perfil de <?php echo $nomep?></title>
    </head>

    <body>
        <?php  
            include "../../../php/header/header.php";
        ?>

        <div class="body">
            <?php
                include "../../../php/side/side.php";
            ?>

            <div class="base" id="base" <?php if ($_SESSION["side"] == "FALSE"){ echo "style='margin-left: 96px;'";}?>>
                <div class="content">
                    <div class="fundo"></div>
                    <div class="sup">
                        <div>
                            <img alt="Imagem de perfil" class="perfil" src="../../../img/perfil/<?php echo $imagemp?>">
                        </div>
                        <div style="margin-left: 32px; margin-top: 92px;">
                            <div class="nome">
                                <h1 class="perfil"><?php echo $completop;?></h1>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-top: 16px;">
                                <div class="codigo">
                                    <p class="codigo">#<?php echo $codigop;?></p>
                                </div>
                                <div class="tipo" id="tipo">
                                    <p class="tipo">
                                        <?php
                                            if ($tipop == "C"){
                                                echo "Esta conta pertence a um cliente";
                                            }
                                            else if ($tipop == "N"){
                                                echo "Esta conta pertence a um nutricionista";
                                            }
                                            else if ($tipop == "A"){
                                                echo "Esta conta pertence a um administrador";
                                            }
                                        ?>
                                    </p>
                                </div>
                                <div style="display: flex; justify-content: space-between;">
                                    <div style="margin-right: 16px;" onmouseover="showinfo()" onmouseout="hideinfo()">
                                        <button class="sup" style="background-image: url(../../../img/site/<?php include '../../../php/principal/perfil/tipo.php';?>);"></button>
                                    </div>
                                    <?php
                                        if ($id == $idPerfil){?>
                                            <a href="config.php#perfil"><div>
                                                <button class="sup" style="background-image: url(../../../img/site/edit.png);"></button>
                                            </div></a>
                                        <?php }
                                        if ($id != $idPerfil){?>
                                            <a href="../chat/chat.php?id=<?php echo $idPerfil;?>"><div>
                                                <button class="sup" style="background-image: url(../../../img/site/chat.png);"></button>
                                            </div></a>
                                        <?php }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; margin-top: 141px;">
                        <div>
                            <div class="bio">
                                <p class="info"><?php echo $biop;?></p>
                            </div>
                            <div style="margin-top: 16px;">
                                <?php
                                    include "../../../php/principal/perfil/info.php";
                                ?>
                            </div>
                        </div>
                        <div class="feed">
                            <?php
                                include "../../../php/principal/perfil/feed.php";
                            ?>
                        </div>
                    </div>
                </div>
            <div>

        </div>

        <script src="../../../js/header.js"></script>
        <script src="../../../js/perfil.js"></script>
    </body>
</html>