<?php
    if (isset($_GET["id"]) && ($_GET["id"] != "")){
        $idAlimento = filter_input(INPUT_GET, "id", FILTER_SANITIZE_SPECIAL_CHARS);

        $sql = "SELECT * FROM `alimentos` WHERE `ID` = '$idAlimento' LIMIT 1";
        $res = mysqli_query($con, $sql);

        if ($holder_doka = mysqli_fetch_assoc($res)){
            // Deu certo
        }
        else{
            header("Location: ../home/home.php");
        }
    }
    else{
        header("Location: ../home/home.php");
    }
?>