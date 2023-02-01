<?php
    $sql = "SELECT * FROM `notificacoes` WHERE `idDono` = '$id' AND `Lido` = 'N' LIMIT 1;";
    $res = mysqli_query($con, $sql);

    if ($holder_noti = mysqli_fetch_assoc($res)){
        echo "../../../img/site/noti-on.png";
    }
    else{
        echo "../../../img/site/noti-off.png";
    }
?>