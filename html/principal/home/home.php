<?php
    include "../../../php/principal/sessao.php";
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <link href="../../../css/base.css" rel="stylesheet">
        <link href="../../../css/header.css" rel="stylesheet">
        <link href="../../../css/side.css" rel="stylesheet">
        <link href="../../../css/home.css" rel="stylesheet">
        <link href="../../../img/site/logo.png" rel="icon">
        <meta charset="UTF-8">
        <meta name="author" content="Adryan, Felipe e Igor">
        <meta name="description" content="Conecte-se com seu nutricionista!">
        <meta name="keywords" content="Nutricionismo, Nutrição, Nutricionista">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Natureba</title>
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
                    <div class="wfeed">
                        <div id="feed">
                            <h1> Bem-vindo, <?php include "../../../php/principal/home/nome.php" ?>!</h1>
                            <hr width="80%">
                            <br>

                            <div class="post">
                                    <!-- SEÇÃO DAS RECEITAS -->

                                <div class="wrapperpost">
                                    <div class="conteudo">
                                        <?php include "../../../php/principal/home/receitas.php"?>
                                        <br>
                                    </div>
                                </div> 

                                <br>

                                <div class="wrapperpost">
                                        <!--  SEÇÃO DO ALIMENTO  -->

                                    <div class="conteudo"> 
                                        <?php include "../../../php/principal/home/alimento.php"?>
                                        
                                        
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            <div>

        </div>

        <script src="../../../js/header.js"></script>
    </body>
</html>