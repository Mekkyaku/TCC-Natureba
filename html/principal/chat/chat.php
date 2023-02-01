<?php
    include "../../../php/principal/sessao.php";
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <link href="../../../css/base.css" rel="stylesheet">
        <link href="../../../css/header.css" rel="stylesheet">
        <link href="../../../css/side.css" rel="stylesheet">
        <link href="../../../css/chat.css" rel="stylesheet">
        <link href="../../../img/site/logo.png" rel="icon">
        <meta charset="UTF-8">
        <meta name="author" content="Adryan, Felipe e Igor">
        <meta name="description" content="Conecte-se com seu nutricionista!">
        <meta name="keywords" content="Nutricionismo, Nutrição, Nutricionista">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chat</title>
    </head>

    <body onload="refresh()">
        <?php  
            include "../../../php/header/header.php";
        ?>

        <div class="body">
            <?php
                include "../../../php/side/side.php";
            ?>

            <div class="base" id="base" <?php if ($_SESSION["side"] == "FALSE"){ echo "style='margin-left: 96px;'";}?>>
                <div class="chat">
                    <div class="area">
                        <div class="mensagens">
                            <div>
                                <?php
                                    include "../../../php/principal/chat/mensagens.php";
                                ?>
                            </div>
                        </div>
                        <?php
                            if (isset($_GET["id"])){ ?>
                                <div class="box">
                                    <form autocomplete="off" id="textarea" method="POST">
                                        <div style="align-items: center; display: flex; justify-content: space-between; width: 666px;">
                                            <input name="contato" readonly type="hidden" value="<?php echo $_GET["id"];?>">
                                            <div style="width: 100%">
                                                <textarea autofocus class="chat" id="textbox" maxlength="256" name="mensagem" placeholder="Escreva uma mensagem..." required></textarea>
                                            </div>
                                            <div style="margin-left: 8px;">
                                                <button class="submit" id="botao"></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            <?php }
                        ?>
                    </div>
                    <div class="lista">
                        <?php
                            include "../../../php/principal/chat/contatos.php";
                        ?>
                    </div>
                </div>
            <div>

        </div>

        <script src="../../../js/header.js"></script>
        <script src="chat.js"></script>
    </body>
</html>