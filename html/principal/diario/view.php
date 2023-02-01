<?php
    include "../../../php/principal/sessao.php";
    include "../../../php/principal/diario/view.php";
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <link href="../../../css/base.css" rel="stylesheet">
        <link href="../../../css/header.css" rel="stylesheet">
        <link href="../../../css/side.css" rel="stylesheet">
        <link href="../../../css/diario.css" rel="stylesheet">
        <link href="../../../img/site/logo.png" rel="icon">
        <meta charset="UTF-8">
        <meta name="author" content="Adryan, Felipe e Igor">
        <meta name="description" content="Conecte-se com seu nutricionista!">
        <meta name="keywords" content="Nutricionismo, Nutrição, Nutricionista">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Diário</title>
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
                <div class="content" style="width: 864px;">
                    <div style="align-items: center; display: flex; justify-content: space-between;">
                        <div>
                            <div>
                                <h1 class="diario">Diário de <?php echo $nomeDono;?></h1>
                            </div>
                            <div>
                                <h2 class="diario"><?php echo $data;?></h2>
                            </div>
                        </div>
                        <div>
                            <a href="paginas.php?idDono=<?php echo $idDono;?>"><button class="historico">Páginas</button></a>
                        </div>
                    </div>
                    <div style="display: flex; margin-top: 32px;">
                        <div>
                            <img class="diario" id="preview" src="../../../img/diario/<?php echo $imaagem;?>">
                        </div>
                        <div style="margin-left: 32px; width: 100%;">
                            <div>
                                <label for="peso">Peso</label>
                                <input class="diario" max="400" min="40" name="peso" placeholder="Vazio" readonly value="<?php echo $peso;?>">
                            </div>

                            <div style="margin-top: 16px;">
                                <label for="alimentacao">Alimentação</label>
                                <textarea class="diario" maxlength="500" name="alimentacao" placeholder="Vazio" readonly><?php echo $alimentacao;?></textarea>
                            </div>  

                            <div style="margin-top: 16px;">
                                <label for="agua">Água</label>
                                <input class="diario" name="agua" placeholder="Vazio" readonly value="<?php echo $agua;?>">
                            </div>

                            <div style="margin-top: 16px;">
                                <label for="extra">Medicamentos e suplementos</label>
                                <textarea class="diario" maxlength="500" name="extra" placeholder="Vazio" readonly><?php echo $extra;?></textarea>
                            </div>

                            <div style="margin-top: 16px;">
                                <label for="exercicios">Exercícios físicos</label>
                                <textarea class="diario" maxlength="500" name="exercicios" placeholder="Vazio" readonly><?php echo $exercicios;?></textarea>
                            </div>

                            <div style="margin-top: 16px;">
                                <label for="sintomas">Queixas e sintomas</label>
                                <textarea class="diario" maxlength="500" name="sintomas" placeholder="Vazio" readonly><?php echo $sintomas;?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            <div>
        </div>

        <script src="../../../js/header.js"></script>
        <script src="../../../js/diario.js"></script>
    </body>
</html>