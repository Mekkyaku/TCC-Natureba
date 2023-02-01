<?php
    include "../../../php/principal/sessao.php";
    include "../../../php/principal/receitas/pesquisa.php";
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <link href="../../../css/base.css" rel="stylesheet">
        <link href="../../../css/header.css" rel="stylesheet">
        <link href="../../../css/side.css" rel="stylesheet">
        <link href="../../../css/receitas.css" rel="stylesheet">
        <link href="../../../css/pesquisa.css" rel="stylesheet">
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

            <div class="base" id="base" <?php if ($_SESSION["side"] == "FALSE"){ echo "style='margin-left: 96px;'";}?>>
                <div class="content">
                <form action="receitas.php" autocomplete="off" method="GET">
                        <div class="pesquisa">
                            <div style="width: 60%;">
                                <input class="pesquisa" name="pesquisa" placeholder="Pesquisar pelo título de uma receita" type="text" value="<?php echo $pesquisa;?>">
                            </div>
                            <div style="margin-left: 8px; width: 35%">
                                <select class="pesquisa" name="ordem">
                                    <option value="rp" <?php if($ordem == "rp"){echo "selected";}?>>Mais recente primeiro</option>
                                    <option value="ap" <?php if($ordem == "ap"){echo "selected";}?>>Mais antigo primeiro</option>
                                    <option value="ep" <?php if($ordem == "ep"){echo "selected";}?>>Mais estrelas primeiro</option>
                                </select>
                            </div>
                            <div style="margin-left: 8px; padding-top: 8px;">
                                <input class="pesquisa-s" type="submit" value="">
                            </div>
                        </div>
                    </form>

                    <div class="a" style="margin-left: auto; margin-top: 4px; width: fit-content;">
                        <?php
                            if ($tipo == "N" || $tipo == "A"){
                                echo "<a class='receita' href='add.php'>Adicionar uma receita</a>";
                            }
                        ?>
                    </div>
                    
                    <div style="margin-top: 32px;">
                        <?php
                            include "../../../php/principal/receitas/list.php";
                        ?>
                    </div>

                    <div>
                        <?php
                            include "../../../php/principal/receitas/paginas.php";
                        ?>
                    </div>
                </div>
            <div>

        </div>

        <script src="../../../js/header.js"></script>
        <script src="../../../js/receitas.js"></script>
    </body>
</html>