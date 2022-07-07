<?php
    session_start();

    if ((isset($_SESSION["login"]) && ($_SESSION["login"] == TRUE))){
        session_destroy();
    }

    header("Location: ../../index.html");
?>