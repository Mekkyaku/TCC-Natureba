<?php
    session_start();

    if ((isset($_SESSION["logado"]) && ($_SESSION["logado"] == TRUE))){
        session_destroy();
    }

    header("Location: login.php");
?>