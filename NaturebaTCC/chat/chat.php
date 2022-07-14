<?php
    session_start();

    if ((!isset($_SESSION["login"]) || ($_SESSION["login"] == FALSE))){
        header("Location: ../account/login.php");
        die;
    }
    else{
        $con = mysqli_connect("localhost", "root", "", "naturebabd");
        $id = $_SESSION["ID"];

        $sql = "SELECT * FROM `contas`;";
        $res = mysqli_query($con, $sql);

            $code = "SELECT * FROM `contas` WHERE `ID` = $id LIMIT 1";
            $exec = $con->query($code) or die($con->error);

                 $user = $exec->fetch_assoc();
    }
?>

<!DOCTYPE html>

<html lang="pt-br">

    <head>
        <link href="../css/style.css" rel="stylesheet">
        <link href="../images/misc/icon.png" rel="icon">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../js/script.js"></script>
        <title>Natureba</title>
    </head>

    <body class="main">
        



            <section id='areaprincipal'>
                
                <section id='chatarea'>
                    <!-- ÁREA DO CHAT -->
                    <div id='conversa'>
                        <!-- area da conversa -->
                        <div class='msgrecebida'>
                            <a href='#'><img class='imgconversa' src='../images/profile/userimg.png'></a href='#'>
                            <p class='msg'>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa </p>          
                        </div>

                        <div class='msgenviada'>
                            <p class='msg'>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa </p></p>
                            <a href='#'><img class='imgconversa' src='../images/profile/userimg.png'></a href='#'>
                        </div>
                        <div class='msgrecebida'>
                            <a href='#'><img class='imgconversa' src='../images/profile/userimg.png'></a href='#'>
                            <p class='msg'>Olá igor! como voce esta nessa noite </p>
                        </div>

                        <div class='msgenviada'>
                            <p class='msg'>Olá felpo! estou muito bem nessa noite e você? </p>
                            <a href='#'><img class='imgconversa' src='../images/profile/userimg.png'></a href='#'>
                        </div>
                        <div class='msgrecebida'>
                            <a href='#'><img class='imgconversa' src='../images/profile/userimg.png'></a href='#'>
                            <p class='msg'>Olá igor! como voce esta nessa noite </p>
                        </div>

                        <div class='msgenviada'>
                            <p class='msg'>Olá felpo! estou muito bem nessa noite e você? </p>
                            <a href='#'><img class='imgconversa' src='../images/profile/userimg.png'></a href='#'>
                        </div>
                        <div class='msgrecebida'>
                            <a href='#'><img class='imgconversa' src='../images/profile/userimg.png'></a href='#'>
                            <p class='msg'>Olá igor! como voce esta nessa noite </p>
                        </div>

                        <div class='msgenviada'>
                            <p class='msg'>Olá felpo! estou muito bem nessa noite e você? </p>
                            <a href='#'><img class='imgconversa' src='../images/profile/userimg.png'></a href='#'>
                        </div>
                        <div class='msgrecebida'>
                            <a href='#'><img class='imgconversa' src='../images/profile/userimg.png'></a href='#'>
                            <p class='msg'>Olá igor! como voce esta nessa noite </p>
                        </div>

                        <div class='msgenviada'>
                            <p class='msg'>Olá felpo! estou muito bem nessa noite e você? </p>
                            <a href='#'><img class='imgconversa' src='../images/profile/userimg.png'></a href='#'>
                        </div>
                        <div class='msgrecebida'>
                            <a href='#'><img class='imgconversa' src='../images/profile/userimg.png'></a href='#'>
                            <p class='msg'>Olá igor! como voce esta nessa noite </p>
                        </div>

                        <div class='msgenviada'>
                            <p class='msg'>Olá felpo! estou muito bem nessa noite e você? </p>
                            <a href='#'><img class='imgconversa' src='../images/profile/userimg.png'></a href='#'>
                        </div>
                    </div>

                    <div class='baixo'>
                        <!-- area da caixa de texto --> 
                        <form method='post'>
                            <input type='text' name='iduser' hidden>
                            <input type='text' name='idoutrouser' hidden> 
                            <input type='text' name='mensagem' id='txtbox'>
                            <button id='enviar' class='vertical-center'> </button>
                        </form>
                    </div>
                </section>

                <section id='listarea'>
                    <!-- Lista de conversas -->
                    <h2 id='titulo'> Mensagens </h2>
                        
                        <form method='post'>
                            <button class='contatos'>
                                <img src='../images/profile/userimg.png'>
                                <p> Felipe Delfino </p>
                            </button>
                            <button class='contatos'>
                                <img src='../images/profile/userimg.png'>
                                <p> Felipe Delfino </p>
                            </button>
                            <button class='contatos'>
                                <img src='../images/profile/userimg.png'>
                                <p> Felipe Delfino </p>
                            </button>
                        </form>

                </section>

            </section>
        

    </body>

</html>