<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <link href="../../css/index.css" rel="stylesheet">
        <link href="../../img/site/logo.png" rel="icon">
        <meta charset="UTF-8">
        <meta name="author" content="Adryan, Felipe e Igor">
        <meta name="description" content="Conecte-se com seu nutricionista!">
        <meta name="keywords" content="Nutricionismo, Nutrição, Nutricionista">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Natureba</title>
    </head>
    <body onload="notification()">
        <div class="header">
            <div class="nav">
                <div>
                    <img alt="Logo do Natureba" class="logo" src="../../img/site/logo.png">
                </div>
                <div class="links">
                    <div><a class="links" href="#sobre">Sobre</a></div>
                    <div><a class="links" href="#equipe">Equipe</a></div>
                    <div><a class="links" href="#contato">Contato</a></div>
                    <div><a href="../sessao/login.php"><button class="link">Entrar</button></a></div>
                </div>
            </div>
            <div class="main">
                <div>
                    <div><h1>Natureba</h1></div>
                    <div style="margin-top: -16px;"><h2>Comer bem é viver bem</h2></div>
                    <div style="margin-top: 24px;"><a href="../sessao/registro.php"><button class="main">Faça parte</button></a></div>
                </div>
                <div>
                    <img alt="Árvore" class="header" src="../../img/site/index.png">
                </div>
            </div>
        </div>

        <div class="body">
            <div class="line-1" id="sobre">
                <div>
                    <img alt="Barraquinha" class="texto" src="../../img/site/texto.png">
                </div>
                <div style="width: 50%;">
                    <h3>Sobre nós</h3>
                    <div>
                        <p class="texto">
                            Tendo como objetivo auxiliar as pessoas em relação a alimentação, nasce o Natureba. Atualmente, comer é uma atividade realizada com pouco cuidado, o que pode acarretar em diversos problema de saúde, problemas esses cada vez mais presentes em nossa sociedade.
                        </p>
                        <p class="texto">
                            Acreditamos que a educação e o acompanhamento profissional são as principais armas nessa batalha. Baseados nisso, desenvolvemos algumas funcionalidades, como a possibilidade de buscar e interagir com nutricionistas, assim como a disponibilização de informações sobre alimentos que consumimos no dia-a-dia.
                        </p>
                    </div>
                </div>
            </div>
            <div class="line-2" id="equipe">
                <h3>Nossa equipe</h3>
                <div class="equipe">
                    <div class="membro">
                        <a href="https://www.instagram.com/adryan_welke/">
                            <div><img alt="Adryan" class="equipe" src="../../img/site/no-image.png"></div>
                        </a>
                        <div class="nome">
                            <p class="equipe">Adryan</p>
                        </div>
                    </div>
                    <div class="membro">
                        <a href="https://github.com/LiFX3500">
                            <div><img alt="Felipe" class="equipe" src="../../img/site/no-image.png"></div>
                        </a>
                        <div class="nome">
                            <p class="equipe">Felipe</p>
                        </div>
                    </div>
                    <div class="membro">
                        <a href="https://github.com/Mekkyaku">
                            <div><img alt="Igor" class="equipe" src="../../img/site/no-image.png"></div>
                        </a>
                        <div class="nome">
                            <p class="equipe">Igor</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="line-1" id="contato">
                <div style="width: 33%;">
                    <h3>Fale conosco</h3>
                    <div class="texto-form">
                        <p class="texto">
                            Caso deseje mandar uma mensagem para nós, preencha os campos ao lado e envie. Em breve, nossa equipe te responderá!
                        </p>
                    </div>

                    <?php
                        if ((isset($_GET["msg"])) && ($_GET["msg"] == 1)){
                            echo    "<div class='notification' id='notification'>
                                        <p class='notification'>Mensagem enviada com sucesso</p>
                                    </div>";
                        }
                    ?>
                </div>
                <div class="forms">
                    <form action="../../php/index/contato.php" autocomplete="off" method="POST">
                        <div style="margin-bottom: 16px;">
                            <label for="nome">Nome</label>
                            <input class="form" id="nome" name="nome" placeholder="Informe seu nome" required type="text">
                        </div>

                        <div style="margin-bottom: 16px;">
                            <label for="email">E-mail</label>
                            <input class="form" id="email" name="email" placeholder="Informe seu e-mail" required type="email">
                        </div>

                        <div style="margin-bottom: 32px;">
                            <div style="margin-bottom: 8px;"><label for="msg">Mensagem</label></div>
                            <textarea class="form" id="msg" name="msg" placeholder="Digite sua mensagem" required></textarea>
                        </div>

                        <div>
                            <input class="submit" type="submit" value="Enviar">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="footer">
            <div>
                <img alt="Logo do Natureba" class="logo-footer" src="../../img/site/logo-footer.png">
            </div>
            <div>
                <p class="footer">Copyright © 2022, Natureba. Todos os direitos reservados.</p>
            </div>
            <div>
                <a href="#"><button class="footer"></button></a>
            </div>
        </div>

        <script src="../../js/index.js"></script>
    </body>
</html>