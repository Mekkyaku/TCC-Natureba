<?php
    include "../../../php/principal/sessao.php";
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <link href="../../../css/base.css" rel="stylesheet">
        <link href="../../../css/header.css" rel="stylesheet">
        <link href="../../../css/side.css" rel="stylesheet">
        <link href="../../../img/site/logo.png" rel="icon">
        <link href="../../../css/diario.css" rel="stylesheet">
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
                <div class="content">
                    
                    <div id="wrapperd"> 
                        <h3> Data do dia atual  \/</h3>
                    </div>
                    <div id="afterdown"> 
                        Café da manhã: Pão, café <br>
                        Almoço: Arroz, feijão, bife <br>
                        Janta: Macarrão com salsicha
                    </div>

                </div>
            <div>

        </div>

        <script src="../../../js/header.js"></script>
    </body>
</html>