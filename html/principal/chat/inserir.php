<?php
    include "../../../php/principal/sessao.php";

    $contato = mysqli_real_escape_string($con, $_POST["contato"]);
    $mensagem = mysqli_real_escape_string($con, $_POST["mensagem"]);

    $sql = "SELECT * FROM `existencia` WHERE `User1` = '$id' AND `User2` = '$contato' OR `User1` = '$contato' AND `User2` = '$id';";
    $rst = mysqli_query($con, $sql);

    if (!empty($mensagem)){
        $sql = "INSERT INTO `chat` VALUES(NULL, '$mensagem', '$id', '$contato');";
        $res = mysqli_query($con, $sql);

        if ($holder_ice = mysqli_fetch_assoc($rst)){
            die;
        }
        else{
            $sql = "INSERT INTO `existencia` VALUES(NULL, '$id', '$contato');";
            $res = mysqli_query($con, $sql);
        }
    }
?>