<?php
    include "../../../php/principal/sessao.php";

    if ($tipo != "A"){
        header("Location: ../home/home.php");
    }
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <link href="../../../css/base.css" rel="stylesheet">
        <link href="../../../css/header.css" rel="stylesheet">
        <link href="../../../css/side.css" rel="stylesheet">
        <link href="../../../css/alimentos.css" rel="stylesheet">
        <link href="../../../img/site/logo.png" rel="icon">
        <meta charset="UTF-8">
        <meta name="author" content="Adryan, Felipe e Igor">
        <meta name="description" content="Conecte-se com seu nutricionista!">
        <meta name="keywords" content="Nutricionismo, Nutrição, Nutricionista">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alimentos</title>
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
                <div class="content" style="width: 800px;">
                    <div>
                        <h1 class="alimentos">
                            Adicionar um alimento
                        </h1>
                        <h2 class="alimentos">
                            Preencha os campos abaixo para adicionar um alimento
                        </h2>
                    </div>

                    <form action="../../../php/principal/alimentos/add.php" autocomplete="off" enctype="multipart/form-data" method="POST">
                        <div class="forms" style="margin-top: 16px;">
                            <div>
                                <img class="forms" id="preview" src="../../../img/alimento/no-image.png">
                                <label for="image"><div class="button"></div></label>
                                <input accept="image/*" id="image" name="image" style="display: none;" type="file">
                            </div>
                            <div style="margin-left: 32px; width: 100%">
                                <div>
                                    <label for="nome">Nome do alimento</label>
                                    <input class="alimento" maxlength="64" name="nome" placeholder="Nome do alimento" required type="text">
                                </div>
                                <div style="margin-top: 16px;">
                                    <label class="forms" for="classe">Classificação</label>
                                    <select class="alimento" name="classe" required>
                                        <option disabled hidden selected>Classificação</option>
                                        <option value="acucares">Açucares e doces</option>
                                        <option value="bebidas">Bebidas</option>
                                        <option value="carboidratos">Carboidratos</option>
                                        <option value="carnes">Carnes e ovos</option>
                                        <option value="frutas">Frutas</option>
                                        <option value="hortalicas">Hortaliças</option>
                                        <option value="leguminosas">Leguminosas</option>
                                        <option value="leites">Leites e derivados</option>
                                        <option value="oleos">Óleos e gorduras</option>
                                    </select>
                                </div>
                                <div style="margin-top: 16px;">
                                    <label for="info">Informações nutricionais</label>
                                    <textarea class="texto" maxlength="3200" name="info" placeholder="Informações nutricionais" required style="margin-top: 0;"></textarea>
                                </div>
                                <div style="margin-top: 8px;">
                                    <label for="tags">Tags</label>
                                    <textarea class="texto" maxlength="640" name="tags" placeholder="Tags" required style="margin-top: 0;"></textarea>
                                </div>
                                <div style="margin-left: auto; margin-top: 16px; width: fit-content;">
                                    <input class="submit" type="submit" value="Adicionar">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            <div>

        </div>

        <script src="../../../js/header.js"></script>
        <script src="../../../js/alimentos.js"></script>
    </body>
</html>