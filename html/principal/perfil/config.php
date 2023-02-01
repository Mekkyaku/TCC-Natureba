<?php
    include "../../../php/principal/sessao.php";
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <link href="../../../css/base.css" rel="stylesheet">
        <link href="../../../css/header.css" rel="stylesheet">
        <link href="../../../css/side.css" rel="stylesheet">
        <link href="../../../css/config.css" rel="stylesheet">
        <link href="../../../img/site/logo.png" rel="icon">
        <meta charset="UTF-8">
        <meta name="author" content="Adryan, Felipe e Igor">
        <meta name="description" content="Conecte-se com seu nutricionista!">
        <meta name="keywords" content="Nutricionismo, Nutrição, Nutricionista">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Configurações</title>
    </head>

    <body onload="error(); erro()">
        <?php  
            include "../../../php/header/header.php";
        ?>

        <div class="body">
            <?php
                include "../../../php/side/side.php";
            ?>

            <div class="base" id="base" <?php if ($_SESSION["side"] == "FALSE"){ echo "style='margin-left: 96px;'";}?>>
                <div class="content" style="width: 772px;">
                    <?php
                        include "../../../php/principal/perfil/config-nutri.php";
                        include "../../../php/principal/perfil/config-perfil.php";
                    ?>

                    <div id="conta">
                        <div style="padding-top: 16px;">
                            <h1 class="config">Configurações de conta</h1>
                        </div>
                        <div>
                            <h2 class="config">Edite as informações pessoais de sua conta</h2>
                        </div>
                        <?php
                            include "../../../php/principal/perfil/error.php";
                        ?>
                        <div class="form">
                            <div style="margin-bottom: 16px;">
                                <div>
                                    <button class="dropdown" onclick="dropdown('email')">Editar seu e-mail</button>
                                </div>
                                <div class="dropada" id="email" style="display: none;">
                                    <form action="../../../php/principal/perfil/edit-email.php" autocomplete="off" method="POST">
                                        <div style="margin-top: 16px;">
                                            <label for="email">E-mail novo</label>
                                            <input class="configg" maxlength="256" name="email" placeholder="exemplo@exemplo.com" required style="font-size: 14px;" type="email">
                                        </div>
                                        <div style="margin-top: 16px;">
                                            <label for="senha">Senha atual</label>
                                            <input class="configg" maxlength="256" name="senha" placeholder="••••••••" required style="font-size: 14px;" type="password">
                                        </div>
                                        <div style="margin-top: 16px; margin-left: auto; margin-right: auto; width: 20%;">
                                            <input class="submitt" style="font-size: 14px;" type="submit" value="Editar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div style="margin-bottom: 16px;">
                                <div>
                                    <button class="dropdown" onclick="dropdown('senha')">Editar sua senha</button>
                                </div>
                                <div class="dropada" id="senha" style="display: none;">
                                    <form action="../../../php/principal/perfil/edit-senha.php" autocomplete="off" method="POST">
                                        <div style="margin-top: 16px;">
                                            <label for="new">Senha nova</label>
                                            <input class="configg" maxlength="256" name="new" placeholder="••••••••" required style="font-size: 14px;" type="password">
                                        </div>
                                        <div style="margin-top: 16px;">
                                            <label for="senha">Senha atual</label>
                                            <input class="configg" maxlength="256" name="senha" placeholder="••••••••" required style="font-size: 14px;" type="password">
                                        </div>
                                        <div style="margin-top: 16px; margin-left: auto; margin-right: auto; width: 20%;">
                                            <input class="submitt" style="font-size: 14px;" type="submit" value="Editar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <button class="dropdown" onclick="dropdown('excluir')">Excluir sua conta</button>
                                </div>
                                <div class="dropada" id="excluir" style="display: none;">
                                    <p class="conta">
                                       <b>Tem certeza de que deseja excluir sua conta? Essa ação não pode ser revertida!</b>
                                    </p>
                                    <form action="../../../php/principal/perfil/excluir.php" autocomplete="off" method="POST">
                                        <div style="margin-top: 16px;">
                                            <label for="senha">Senha atual</label>
                                            <input class="configg" maxlength="256" name="senha" placeholder="••••••••" required style="font-size: 14px;" type="password">
                                        </div>
                                        <div style="margin-top: 16px;">
                                            <label for="confirm">Digite "Excluir" para continuar</label>
                                            <input class="configg" maxlength="256" name="confirm" placeholder="Excluir" required style="font-size: 14px;" type="text">
                                        </div>
                                        <div style="margin-top: 16px; margin-left: auto; margin-right: auto; width: 20%;">
                                            <input class="submitt" style="background-color: #F0A3A3; font-size: 14px;" type="submit" value="Excluir">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div>

        </div>

        <script src="../../../js/header.js"></script>
        <script src="../../../js/perfil.js"></script>
    </body>
</html>