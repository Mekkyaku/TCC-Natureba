<?php
    include "../../../php/principal/sessao.php";
    include "../../../php/principal/receitas/info-edit.php";
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
                    <form action="../../../php/principal/receitas/edit.php?id=<?php echo $idReceita;?>" autocomplete="off" enctype="multipart/form-data" method="POST">
                        <div class="fundo">
                            <img class="fundo" id="preview" src="../../../img/receita/<?php echo $holder_lil["Imagem"];?>">
                            <label for="image"><div class="button"></div></label>
                            <input accept="image/*" id="image" name="image" style="display: none;" type="file">
                        </div>

                        <div style="margin-top: 32px;">
                            <div>
                                <div>
                                    <label class="texto" for="titulo">Título da receita</label>
                                </div>
                                <div style="margin-top: 8px;">
                                    <textarea class="receita" maxlength="64" name="tituloo" required><?php echo $holder_lil["Titulo"];?></textarea>
                                </div>
                            </div>
                            <div style="margin-top: 16px;">
                                <div>
                                    <label class="texto" for="descricao">Descrição</label>
                                </div>
                                <div style="margin-top: 8px;">
                                    <textarea class="receita" maxlength="800" name="descricao" required><?php echo $holder_lil["Descricao"];?></textarea>
                                </div>
                            </div>
                            <div style="margin-top: 16px;">
                                <div>
                                    <label class="texto" for="ingredientes">Ingredientes</label>
                                </div>
                                <div style="margin-top: 8px;">
                                    <textarea class="receita" maxlength="800" name="ingredientes" required><?php echo $holder_lil["Ingredientes"];?></textarea>
                                </div>
                            </div>
                            <div style="margin-top: 16px;">
                                <div>
                                    <label class="texto" for="preparo">Modo de preparo</label>
                                </div>
                                <div style="margin-top: 8px;">
                                    <textarea class="receita" maxlength="6400" name="preparo" required><?php echo $holder_lil["Preparo"];?></textarea>
                                </div>
                            </div>
                            <div style="display: flex; margin-left: auto; margin-top: 32px; width: fit-content;">
                                <a href="../../../php/principal/receitas/delete.php?id=<?php echo $idReceita;?>"><div class="excluir">
                                    Excluir
                                </div></a>
                                <div style="margin-left: 32px;">
                                    <input class="submit" type="submit" value="Editar">
                                </div>
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