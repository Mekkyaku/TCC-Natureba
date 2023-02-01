<?php
    include "../../php/sessao/sessao.php";
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <link href="../../css/sessao.css" rel="stylesheet">
        <link href="../../img/site/logo.png" rel="icon">
        <meta charset="UTF-8">
        <meta name="author" content="Adryan, Felipe e Igor">
        <meta name="description" content="Conecte-se com seu nutricionista!">
        <meta name="keywords" content="Nutricionismo, Nutrição, Nutricionista">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Criar conta</title>

        <?php
            $data = date("Y");
            $max = $data - 16;
            $min = $data - 100;
        ?>
    </head>

    <body onload="error()">
        <div class="middle"></div> 

        <div class="body">
            <h1>Criar conta</h1>

            <?php
                include "../../php/sessao/erro.php";
            ?>

            <div class="forms">
                <form action="../../php/sessao/registro.php" autocomplete="off" method="POST">
                    <div style="margin-top: 16px">
                        <label for="completo">Nome completo</label>
                        <div id="completo" style="display: flex; justify-content: space-between;">
                            <input class="forms" maxlength="64" name="nome" placeholder="Nome" required style="width: 49%;" type="text">
                            <input class="forms" maxlength="64" name="sobrenome" placeholder="Sobrenome" required style="width: 49%;" type="text">
                        </div>
                    </div>

                    <div style="margin-top: 16px">
                        <label for="email">E-mail</label>
                        <input class="forms" id="email" maxlength="256" name="email" placeholder="exemplo@exemplo.com" required type="email">
                    </div>

                    <div style="margin-top: 16px">
                        <label for="senha">Senha</label>
                        <input class="forms" id="senha" maxlength="256" name="senha" placeholder="••••••••" required type="password">
                    </div>

                    <div style="margin-top: 16px">
                        <label for="nascimento">Data de nascimento</label>
                        <div id="nascimento" style="display: flex; justify-content: space-between;">
                            <input class="forms" max="31" min="1" name="dia" placeholder="Dia" required style="width: 32%" type="number">
                            <select class="forms" name="mes" required style="width: 32%">
                                <option disabled hidden selected>Mês</option>
                                <option value="1">Janeiro</option>
                                <option value="2">Fevereiro</option>
                                <option value="3">Março</option>
                                <option value="4">Abril</option>
                                <option value="5">Maio</option>
                                <option value="6">Junho</option>
                                <option value="7">Julho</option>
                                <option value="8">Agosto</option>
                                <option value="9">Setembro</option>
                                <option value="10">Outubro</option>
                                <option value="11">Novembro</option>
                                <option value="12">Dezembro</option>
                            </select>
                            <input class="forms" max="<?php echo $max;?>" min="<?php echo $min;?>" name="ano" placeholder="Ano" required style="width: 32%" type="number">
                        </div>
                    </div>

                    <div style="margin-top: 16px">
                        <label for="tipo">Tipo de conta</label>
                        <div id="tipo">
                            <div>
                                <input id="cliente" name="tipo" required type="radio" value="C">
                                <label class="tipo" for="cliente">Cliente</label>
                            </div>
                            <div>
                                <input id="nutri" name="tipo" required type="radio" value="N">
                                <label class="tipo" for="nutri">Nutricionista</label>
                            </div>
                        </div>
                    </div>

                    <div style="margin-top: 24px">
                        <input class="submit" type="submit" value="Continuar">
                    </div>

                    <div style="margin-top: 8px">
                        <p class="link">Já possui uma conta? <a href="login.php">Entre aqui </a></p>
                    </div>
                </form>
            </div>
        </div>

        <script src="../../js/sessao.js"></script>
    </body>
</html>