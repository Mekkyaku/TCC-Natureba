<?php
    include "../../../php/principal/sessao.php";
    include "../../../php/principal/alimentos/edit-info.php";

    if ($tipo != "A"){
        header("Location: ../home/hoem.php");
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
                            Editar um alimento
                        </h1>
                        <h2 class="alimentos">
                            Preencha os campos abaixo para editar um alimento
                        </h2>
                    </div>

                    <form action="../../../php/principal/alimentos/edit.php?id=<?php echo $idAlimento;?>" autocomplete="off" enctype="multipart/form-data" method="POST">
                        <div class="forms" style="margin-top: 16px;">
                            <div>
                                <img class="forms" id="preview" src="../../../img/alimento/<?php echo $holder_doka["Imagem"]; ?>">
                                <label for="image"><div class="button"></div></label>
                                <input accept="image/*" id="image" name="image" style="display: none;" type="file">
                            </div>
                            <div style="margin-left: 32px; width: 100%">
                                <div>
                                    <label for="nome">Nome do alimento</label>
                                    <input class="alimento" maxlength="64" name="nome" placeholder="Nome do alimento" required type="text" value="<?php echo $holder_doka["Nome"]?>">
                                </div>
                                <div style="margin-top: 16px;">
                                    <label class="forms" for="classe">Classificação</label>
                                    <select class="alimento" name="classe" required>
                                        <option disabled hidden selected>Classificação</option>
                                        <option value="acucares" <?php if($holder_doka["Classe"] == "acucares"){ echo "selected";}?>>Açucares e doces</option>
                                        <option value="bebidas" <?php if($holder_doka["Classe"] == "bebidas"){ echo "selected";}?>>Bebidas</option>
                                        <option value="carboidratos" <?php if($holder_doka["Classe"] == "carboidratos"){ echo "selected";}?>>Carboidratos</option>
                                        <option value="carnes" <?php if($holder_doka["Classe"] == "carnes"){ echo "selected";}?>>Carnes e ovos</option>
                                        <option value="frutas" <?php if($holder_doka["Classe"] == "frutas"){ echo "selected";}?>>Frutas</option>
                                        <option value="hortalicas" <?php if($holder_doka["Classe"] == "hortalicas"){ echo "selected";}?>>Hortaliças</option>
                                        <option value="leguminosas" <?php if($holder_doka["Classe"] == "leguminosas"){ echo "selected";}?>>Leguminosas</option>
                                        <option value="leites" <?php if($holder_doka["Classe"] == "leites"){ echo "selected";}?>>Leites e derivados</option>
                                        <option value="oleos" <?php if($holder_doka["Classe"] == "oleos"){ echo "selected";}?>>Óleos e gorduras</option>
                                    </select>
                                </div>
                                <div style="margin-top: 16px;">
                                    <label for="info">Informações nutricionais</label>
                                    <textarea class="texto" maxlength="3200" name="info" placeholder="Informações nutricionais" required style="margin-top: 0;"><?php echo $holder_doka["Info"];?></textarea>
                                </div>
                                <div style="margin-top: 8px;">
                                    <label for="tags">Tags</label>
                                    <textarea class="texto" maxlength="640" name="tags" placeholder="Tags" required style="margin-top: 0;"><?php echo $holder_doka["Tags"];?></textarea>
                                </div>
                                <div style="margin-left: auto; margin-top: 16px; width: fit-content;">
                                    <input class="submit" type="submit" value="Editar">
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