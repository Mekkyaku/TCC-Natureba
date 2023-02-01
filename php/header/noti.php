<?php
    $sql = "SELECT * FROM `notificacoes` WHERE `idDono` = '$id' ORDER BY `ID` DESC;";
    $res = mysqli_query($con, $sql);

    $veriff = 1;
    while ($holder_n = mysqli_fetch_assoc($res)){
        echo    "<a href='" . $holder_n["Link"] . "'><div class='noti-o'>
                    <div>
                        <img alt='Imagem de perfil' class='noti' src='../../../img/perfil/" . $holder_n["Imagem"] . "'>
                    </div>
                    <div style='margin-left: 16px;'>
                        <div>
                            <h1 class='noti'>" . $holder_n["Titulo"] . "</h1>
                        </div>
                        <div style='margin-top: 4px;'>
                            <h2 class='noti'>" . $holder_n["Texto"] . "</h2>
                        </div>
                        <div style='margin-top: 8px;'>
                            <p class='noti'><b>Em: </b>" . $holder_n["Data"] . "</p>
                        </div>
                    </div>
                </div></a>";
        $veriff = 0;
    }

    if ($veriff == 1){
        echo    "<div style='text-align: center; padding-bottom: 16px;'>  
                    <h2 class='noti'>Sem notificações</h1>
                </div>";
    }
    
?>