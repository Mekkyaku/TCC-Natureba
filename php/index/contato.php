<?php
    if ((isset($_POST["nome"])) && (isset($_POST["email"])) && (isset($_POST["msg"]))){
        $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $msg = filter_input(INPUT_POST, "msg", FILTER_SANITIZE_SPECIAL_CHARS);

        $con = mysqli_connect("localhost", "root", "", "natureba");
        $sql = "INSERT INTO `mensagens` VALUES (NULL, '$nome', '$email', '$msg');";
        $res = mysqli_query($con, $sql);

        header("Location: ../../html/index/index.html?msg=1#contato");
    }
    else{
        header("Location: ../../html/index/index.html");
    }
?>