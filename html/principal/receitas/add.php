<?php
    include "../../../php/principal/sessao.php";

    if ($tipo == "C"){
        header("Location: ../home/home.php");
        die;
    }
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <link href="../../../css/base.css" rel="stylesheet">
        <link href="../../../css/header.css" rel="stylesheet">
        <link href="../../../css/side.css" rel="stylesheet">
        <link href="../../../css/receitas.css" rel="stylesheet">
        <link href="../../../img/site/logo.png" rel="icon">
        <meta charset="UTF-8">
        <meta name="author" content="Adryan, Felipe e Igor">
        <meta name="description" content="Conecte-se com seu nutricionista!">
        <meta name="keywords" content="Nutricionismo, Nutrição, Nutricionista">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Receitas</title>
    </head>

    <body>
        <?php
            include "../../../php/header/header.php";
        ?>

        <div class="body">
            <?php
                include "../../../php/side/side.php";
            ?>

            <div class="base" id="base" <?php if ($_SESSION["side"] == "FALSE") {echo "style='margin-left: 96px;'";} ?>>
                <div class="content" style="width: 800px;">
                    <form action="../../../php/principal/receitas/add.php" autocomplete="off" enctype="multipart/form-data" method="POST">
                        <div class="fundo">
                            <img class="fundo" id="preview" src="../../../img/receita/no-image.png">
                            <label for="image"><div class="button"></div></label>
                            <input accept="image/*" id="image" name="image" style="display: none;" type="file">
                        </div>

                        <div style="margin-top: 32px;">
                            <div>
                                <div>
                                    <label class="texto" for="titulo">Título da receita</label>
                                </div>
                                <div style="margin-top: 8px;">
                                    <textarea class="receita" maxlength="64" name="titulo" required></textarea>
                                </div>
                            </div>
                            <div style="margin-top: 16px;">
                                <div>
                                    <label class="texto" for="ingredientes">Descrição</label>
                                </div>
                                <div style="margin-top: 8px;">
                                    <textarea class="receita" maxlength="800" name="descricao" required></textarea>
                                </div>
                            </div>
                            <div style="margin-top: 16px;">
                                <div>
                                    <label class="texto" for="ingredientes">Ingredientes</label>
                                </div>
                                <div style="margin-top: 8px;">
                                    <textarea class="receita" maxlength="800" name="ingredientes" required></textarea>
                                </div>
                            </div>
                            <div style="margin-top: 16px;">
                                <div>
                                    <label class="texto" for="preparo">Modo de preparo</label>
                                </div>
                                <div style="margin-top: 8px;">
                                    <textarea class="receita" maxlength="6400" name="preparo" required></textarea>
                                </div>
                            </div>
                            <div style="margin-left: auto; margin-top: 32px; width: fit-content;">
                                <input class="submit" type="submit" value="Publicar">
                            </div>
                        </div>
                    </form>
                </div>
            <div>
        </div>

        <script src="../../../js/header.js"></script>
        <script src="../../../js/receitas.js"></script>
    </body>
</html>