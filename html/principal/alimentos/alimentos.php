<?php
    include "../../../php/principal/sessao.php";
    include "../../../php/principal/alimentos/pesquisa.php";
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head> 
        <link href="../../../css/base.css" rel="stylesheet">
        <link href="../../../css/header.css" rel="stylesheet">
        <link href="../../../css/side.css" rel="stylesheet">
        <link href="../../../css/alimentos.css" rel="stylesheet">
        <link href="../../../css/pesquisa.css" rel="stylesheet">
        <link href="../../../img/site/logo.png" rel="icon">
        <meta charset="UTF-8">
        <meta name="author" content="Adryan, Felipe e Igor">
        <meta name="description" content="Conecte-se com seu nutricionista!">
        <meta name="keywords" content="Nutricionismo, Nutrição, Nutricionista">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alimentos</title>
    </head>

    <body id="body">
        <?php  
            include "../../../php/header/header.php";
        ?>

        <div class="body">
            <div class="info" id="info">
                 
            </div>

            <div class="a-shadow" id="s-alimento" onclick="hideInfo()"></div>

            <?php
                include "../../../php/side/side.php";
            ?>

            <div class="base" id="base" <?php if ($_SESSION["side"] == "FALSE"){ echo "style='margin-left: 96px;'";}?>>
                <div class="content">
                    <form action="alimentos.php" autocomplete="off" method="GET">
                        <div class="pesquisa">
                            <div style="width: 60%;">
                                <input class="pesquisa" name="pesquisa" placeholder="Pesquisar pelo nome de um alimento" type="text" value="<?php echo $pesquisa;?>">
                            </div>
                            <div style="margin-left: 8px; width: 35%">
                                <select class="pesquisa" name="classe">
                                    <option disabled hidden selected>Classificação</option>
                                    <option value="">- Nenhuma -</option>
                                    <option value="acucares" <?php if($classe == "acucares"){echo "selected";}?>>Açucares e doces</option>
                                    <option value="bebidas" <?php if($classe == "bebidas"){echo "selected";}?>>Bebidas</option>
                                    <option value="carboidratos" <?php if($classe == "carboidratos"){echo "selected";}?>>Carboidratos</option>
                                    <option value="carnes" <?php if($classe == "carnes"){echo "selected";}?>>Carnes e ovos</option>
                                    <option value="frutas" <?php if($classe == "frutas"){echo "selected";}?>>Frutas</option>
                                    <option value="hortalicas" <?php if($classe == "hortalicas"){echo "selected";}?>>Hortaliças</option>
                                    <option value="leguminosas" <?php if($classe == "leguminosas"){echo "selected";}?>>Leguminosas</option>
                                    <option value="leites" <?php if($classe == "leites"){echo "selected";}?>>Leites e derivados</option>
                                    <option value="oleos" <?php if($classe == "oleos"){echo "selected";}?>>Óleos e gorduras</option>
                                </select>
                            </div>
                            <div style="margin-left: 8px; padding-top: 8px;">
                                <input class="pesquisa-s" type="submit" value="">
                            </div>
                        </div>
                    </form>

                    <div class="a" style="margin-left: auto; margin-top: 4px; width: fit-content;">
                        <?php
                            if ($tipo == "A"){
                                echo "<a class='alimento' href='add.php'>Adicionar um alimento</a>";
                            }
                        ?>
                    </div>

                    <div style="margin-top: 32px;">
                        <?php
                            include  "../../../php/principal/alimentos/list.php";
                        ?>
                    </div>

                    <div>
                        <?php
                            include "../../../php/principal/alimentos/paginas.php";
                        ?>
                    </div>
                </div>
            <div>

        </div>

        <script src="../../../js/header.js"></script>
        <script src="../../../js/alimentos.js"></script>
    </body>
</html>