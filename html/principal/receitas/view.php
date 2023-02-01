<?php
    include "../../../php/principal/sessao.php";
    include "../../../php/principal/receitas/info.php";
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
                    <div class="fundo">
                        <img alt="Imagem da receita" class="fundo" src="../../../img/receita/<?php echo $holder_451["Imagem"];?>">
                    </div>

                    <div style="margin-top: 16px;">
                        <div style="align-items: center; display: flex; justify-content: space-between;">
                            <div>
                                <h1 class="view"><?php echo $holder_451["Titulo"];?></h1>
                            </div>
                            <div style="align-items: center; display: flex;">
                                <div id="<?php echo $idReceita . 'r';?>">
                                    <p class="contador"><?php echo $holder_451["Estrelas"];?></p>
                                </div>
                                <div>
                                    <button class="estrela" id="<?php echo $idReceita;?>" onclick="onstrela('<?php echo $idReceita;?>', '<?php echo $id;?>')" <?php if ($unico == FALSE){ echo "style='display:none;'";}?>></button>
                                    <button class="estrela" id="<?php echo $idReceita . 'o';?>" onclick="offstrela('<?php echo $idReceita;?>', '<?php echo $id;?>')" style="background-image: url(../../../img/site/estrela-fill.png); <?php if ($unico == TRUE){ echo 'display:none;';}?>">
                                </div>
                            </div>
                        </div>
                        <div style="display:flex; justify-content: space-between; margin-top: -4px;">
                            <div>
                                <h2 class="receita">Publicado em <?php echo $holder_451["Data"];?>, por <?php echo $holder_palito["Completo"];?></h2>
                            </div>
                            <?php 
                                if ($id == $holder_451["idDono"]){ ?>
                                    <div class="a">
                                        <a class="receita" href="edit.php?id=<?php echo $idReceita;?>">Editar receita</a>
                                    </div>
                                <?php }
                            ?>
                        </div>
                    </div>

                    <div style="margin-top: 32px;">
                        <div>
                            <label class="texto">Descrição</label>
                        </div>
                        <textarea class="receita" readonly style="margin-top: 8px;"><?php echo $holder_451["Descricao"];?></textarea>

                        <div style="margin-top: 32px;">
                            <label class="texto">Ingredientes</label>
                        </div>
                        <textarea class="receita" readonly style="margin-top: 8px;"><?php echo $holder_451["Ingredientes"];?></textarea>

                        <div style="margin-top: 32px;">
                            <label class="texto">Modo de preparo</label>
                        </div>
                        <textarea class="receita" readonly style="margin-top: 8px;"><?php echo $holder_451["Preparo"];?></textarea>
                    </div>
                </div>
            <div>

            </div>

            <script src="../../../js/header.js"></script>
            <script src="../../../js/receitas.js"></script>
    </body>

</html>