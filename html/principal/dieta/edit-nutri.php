<?php
    include "../../../php/principal/sessao.php";
    include "../../../php/principal/dieta/info-cliente.php";
    include "../../../php/principal/dieta/info-dieta.php";

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
        <link href="../../../css/dieta.css" rel="stylesheet">
        <link href="../../../img/site/logo.png" rel="icon">
        <meta charset="UTF-8">
        <meta name="author" content="Adryan, Felipe e Igor">
        <meta name="description" content="Conecte-se com seu nutricionista!">
        <meta name="keywords" content="Nutricionismo, Nutrição, Nutricionista">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dieta</title>
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
                <div class="content" style="min-height: 1316px; padding: 64px 96px; width: 930px;">
                    <div>
                        <div style="margin-left: auto; margin-right: auto; width: fit-content;">
                            <img alt="Logo do Natureba" class="dieta" src="../../../img/site/nome.png">
                        </div>
                        <div style="margin-top: 32px;">
                            <div style="display: flex; justify-content: space-between;">
                                <div>
                                    <h1 class="dieta"><b>Cliente: </b><?php echo $holder_cliente["Completo"];?></h1>
                                </div>
                                <div>
                                    <h1 class="dieta"><b>Nutricionista: </b><?php echo $completo;?></h1>
                                </div>
                            </div>
                            <div>
                                <h1 class="dieta"><b>Data: </b><?php echo $holder_dieta["Data"];?></h1>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 32px;">
                        <form action="../../../php/principal/dieta/edit-nutri.php?id=<?php echo $idCliente;?>" autocomplete="off" method="POST">
                        <textarea class="dieta" maxlength="3200" name="texto"><?php echo $holder_dieta["Texto"];?></textarea>
                    </div>
                    <div class="dieta-botao">
                        <div>
                            <button class="dieta">Editar</button>
                        </div>
                        </form>
                    </div>
                </div>
            <div>
        </div>

        <script src="../../../js/header.js"></script>
    </body>
</html>