<?php 
    session_start();
    if ((!isset($_SESSION["login"]) || ($_SESSION["login"] == FALSE))){
        header("Location: html/account/login.php");
        die;
    }
    else{

        $conexao = mysqli_connect("localhost", "root", "", "naturebabd");

        $iduser = mysqli_real_escape_string($conexao, $_POST['iduser']);
        $idoutrouser = mysqli_real_escape_string($conexao, $_POST['idoutrouser']);
        $msg = mysqli_real_escape_string($conexao, $_POST['msg']);

        if(!empty($msg)){
            $sql = mysqli_query($conexao, "INSERT INTO msg (id, msg, iduser1, iduser2)
                                            VALUES (NULL, '$msg', '$iduser', '$idoutrouser')" );
        }else{
            header("html/account/login.php")
        }
 }


?>