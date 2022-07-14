<?php
   session_start();

   if ((!isset($_SESSION["login"]) || ($_SESSION["login"] == FALSE))){
       header("Location: html/account/login.php");
       die;
   }
   else{


    $iduser = $_SESSION["ID"];
    $conexao = mysqli_connect("localhost", "root", "", "naturebabd");
    $sql = "SELECT * FROM `hamensagem` WHERE iduser1 = $iduser OR iduser2 = $iduser";
    $resultado = mysqli_query($conexao,$sql);

    //VERIFICAÇÃO VISUAL SE HÁ MENSAGENS

        //MENSAGENS IN REAL TIME
        echo $iduser;
                
        
    


    



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="chatcss.css" rel='stylesheet'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
</head>
<body>
    
    <section id='englobador'>
        <section id='msglista'>
            <div id='titulo'>
                <h3>Mensagens</h3>
            </div>
            <?php
                while($linha = mysqli_fetch_array($resultado)){
                    if(($_SESSION["ID"] == $linha['iduser1'])){
                        $hamensagem = TRUE;

                        $idoutrouser = $linha['iduser2'];
                        $sql1 = "SELECT * FROM `contas` WHERE ID = $idoutrouser";
                        $resultado1 = mysqli_query($conexao, $sql1);
                        $linha1 = mysqli_fetch_array($resultado1);

                        if($linha1['Conta'] == 'C'){
                            echo "<a href='chat.php?id=". $linha1['ID'] ."'>
                                    <div class='msguser'>
                                        <h4>" .$linha1['Nome']. " ". $linha1['Sobrenome']  . "</h4>
                                    </div>
                                </a>
                                <hr>";
                        } else if($linha1['Conta'] == 'N'){
                            echo "<a href='chat.php?id=". $linha1['ID'] ."'>
                                    <div class='msguser'>
                                        <h4> Dr. " .$linha1['Nome']. " ". $linha1['Sobrenome']  . "</h4>
                                    </div>
                                </a>
                                <hr>";
                        }

                    } else if (($_SESSION["ID"] == $linha['iduser2'])){
                        $hamensagem = TRUE;
                        
                        $idoutrouser = $linha['iduser1'];
                        $sql1 = "SELECT * FROM `contas` WHERE ID = $idoutrouser";
                        $resultado1 = mysqli_query($conexao, $sql1);
                        $linha1 = mysqli_fetch_array($resultado1);
                        
                        if($linha1['Conta'] == 'C'){
                            echo "<a href='chat.php?id=". $linha1['ID'] ."'>
                                    <div class='msguser'>
                                        <h4>" .$linha1['Nome']. " ". $linha1['Sobrenome']  . "</h4>
                                    </div>
                                </a>
                                <hr>";
                        } else if($linha1['Conta'] == 'N'){
                            echo "<a href='chat.php?id=". $linha1['ID'] ."'>
                                    <div class='msguser'>
                                        <h4> DR." .$linha1['Nome']. " ". $linha1['Sobrenome']  . "</h4>
                                    </div>
                                </a>
                                <hr>";
                        }

                    } else{
                        echo "<p> Ainda não há mensagens :( ! Experimente enviar uma para seu nutricionista!";
                    }
                }

                if(isset($_GET['id'])){
                    $click = TRUE;
                }
                else{
                    $click = FALSE;
                }

        ?>

        </section>

        <section id='chat'>
            <div id='titulo2'>
                <h3> Chat - <?php if($click == TRUE){ 
                                        $idoutrouser = $_GET['id'];
                                        
                                        $sqltitle = "SELECT * FROM `contas`";
                                        $resultadotitle = mysqli_query($conexao, $sqltitle);
                                        while($linhatitle = mysqli_fetch_array($resultadotitle)){
                                            if($linhatitle['ID'] == $idoutrouser){
                                                echo $linhatitle['Nome'] . " " . $linhatitle['Sobrenome'];
                                            }
                                        }

                                        
                                    
                            ?> 
                </h3>
                <form id='btperfil' action='perfil.php'>
                    <button type='submit'> Perfil </button>
                </form>
            </div>

           <div id='msgs'>
               <div id='msgsdiv'>
                <?php
                
                    if($hamensagem = TRUE){
                        $sql2 = "SELECT * FROM `msg`";
                        $resultado2 = mysqli_query($conexao, $sql2);
                        while($linha2 = mysqli_fetch_array($resultado2)){


                            if($linha2['iduser1'] == $iduser && $linha2['iduser2'] == $idoutrouser){
                                //USUÁRIO MANDOU A MENSAGEM
                                $sqlimg = "SELECT * FROM `contas` WHERE ID = $iduser";
                                $resultadoimg = mysqli_query($conexao, $sqlimg);
                                $linhaimg = mysqli_fetch_array($resultadoimg);


                                    if($linhaimg['ID'] == $iduser){

                                        echo "<div class='wrappermsg'>
                                        
                                        <div class='msgenviada'>"
                                            . $linha2['msg'] . "
                                        </div>
                                        <img src=' images/profile/". $linhaimg['Imagem']. "'>
                                    </div>";
                                    }else{
                                        echo "<div class='wrappermsg'>
                                        
                                        <div class='msgenviada'>"
                                            . $linha2['msg'] . "
                                        </div>
                                        <img src='userimg.png'>
                                    </div>";
                                    }
                                    
                                
                            }
                            if($iduser == $linha2["iduser2"] && $linha2['iduser1'] == $idoutrouser){
                                //USUÁRIO RECEBEU A MENSAGEM
                                $sqlimg = "SELECT * FROM `contas` WHERE ID = $idoutrouser";
                                $resultadoimg = mysqli_query($conexao, $sqlimg);
                                $linhaimg = mysqli_fetch_array($resultadoimg);

                                    if($linhaimg['ID'] == $idoutrouser){

                                        

                                        echo "<div class='wrappermsg'>
                                            <img src=' images/profile/". $linhaimg['Imagem']. "'>
                                            <div class='msgrecebida'>"
                                                . $linha2['msg'] . "
                                            </div>
                                        </div>";
                                    }
                                        else{
                                            echo "<div class='wrappermsg'>
                                            <img src='userimg.png'>
                                            <div class='msgrecebida'>"
                                                . $linha2['msg'] . "
                                            </div>
                                        </div>";
                                        }
                                
                            }
                        }
                    }
                }
                else{
                    echo "Vazio! Escolha uma conversa!";
                }

            }?>
                
               </div>

               

                
                    <form id='msgbox'>
                        <input type='text' name='iduser' value= '<?php echo $iduser; ?>' >
                        <input type='text' name='idoutrouser' value='<?php echo $idoutrouser; ?>' > 
                        <input id='txtbox' type='text' name='msg' placeholder='Escreva sua mensagem...'>
                        <button id='enviarbt'> a </button>
                    </form>
                
           </div>
            

        </section>
    </section>


    <script src='Javascript/chat.js'></script>
</body>
</html>