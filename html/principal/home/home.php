<?php
    include "../../../php/principal/sessao.php";
    include "../../../php/principal/home/home.php";
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
                <div class="content" style="min-height: 532px;">
                    <div style="align-items: center; display: flex; justify-content: space-between;">
                        <div>
                            <div>
                                <h1 class="home">Olá, <?php echo $nome;?>!</h1>
                            </div>
                            <div>
                                <h2 class="home">
                                    Confira essas indicações do Natureba:
                                </h2>
                            </div>
                            <a href="../alimentos/alimentos.php?pesquisa=<?php echo $holder_flatbed['Nome'];?>">
                                <div style="margin-top: 24px;">
                                    <p class="home">Dica de alimento</p>
                                    <div class="box">
                                        <?php echo $holder_flatbed["Nome"];?>
                                    </div>
                                </div>
                            </a>
                            <a href="../receitas/view.php?id=<?php echo $holder_vlone['ID']?>">
                                <div style="margin-top: 24px;">
                                    <p class="home">Dica de receita</p>
                                    <div class="box">
                                        <?php echo $holder_vlone["Titulo"];?>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <img alt="Mulher comendo salada" class="home" src="../../../img/site/intro.png">
                        </div>
                    </div>
                </div>
            <div>

        </div>

        <script src="../../../js/header.js"></script>
    </body>
</html>