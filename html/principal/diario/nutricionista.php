<?php
    include "../../../php/principal/sessao.php";

    if ($tipo == "C"){
        header("Location: cliente.php");
        die;
    }
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
                <div class="content" style="min-height: 532px;">
                    <div>
                        <h1 class="nutri">Selecione um cliente para visualizar seu diário</h1>
                    </div>
                    <div style="margin-top: 16px;">
                        <?php
                            include "../../../php/principal/diario/list-clientes.php";
                        ?>
                    </div>
                </div>
            <div>
        </div>

        <script src="../../../js/header.js"></script>
    </body>
</html>