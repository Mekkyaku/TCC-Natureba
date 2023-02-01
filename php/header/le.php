<?php
    include "../principal/sessao.php";

    if (isset($_POST["act"]) && ($_POST["act"] == 1)){
        $sql = "UPDATE `notificacoes` SET `Lido` = 'S' WHERE `idDono` = '$id' AND `Lido` = 'N';";
        $res= mysqli_query($con, $sql);
    }
?>