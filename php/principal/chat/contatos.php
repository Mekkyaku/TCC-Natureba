<?php
    $sql = "SELECT * FROM `existencia` WHERE `User1` = '$id' OR `User2` = '$id';";
    $res = mysqli_query($con, $sql);

    $existe = FALSE;
    while ($holder_uaua = mysqli_fetch_assoc($res)){
        $existe = TRUE;

        if ($id == $holder_uaua["User1"]){
            $contato = $holder_uaua["User2"];
        }
        else if ($id == $holder_uaua["User2"]){
            $contato = $holder_uaua["User1"];
        }

        $sql = "SELECT * FROM `contas` WHERE `ID` = '$contato' LIMIT 1;";
        $rst = mysqli_query($con, $sql);
        $holder_thugga = mysqli_fetch_assoc($rst);

        $sql = "SELECT * FROM `perfis` WHERE `idUser` = '$contato' LIMIT 1;";
        $rst = mysqli_query($con, $sql);
        $holder_travy = mysqli_fetch_assoc($rst);

        echo    "<a href='chat.php?id=" . $contato . "'><div class='celula'>
                    <div>
                        <img alt='Imagem de perfil' class='lista' src='../../../img/perfil/" . $holder_travy["Imagem"] . "'>
                    </div>
                    <div style='margin-left: 12px;'>
                        <p class='lista'>" . $holder_thugga["Completo"] . "</p>
                    </div>
                </div></a>";
    }

    if ($existe == FALSE){
        echo    "<div class='puts'>
                    <div>
                        <h1 class='puts'>Você ainda não possui mensagens</h1>
                    </div>
                    <div style='margin-top: 8px;'>
                        <h2 class='puts'>Tente enviar uma para um nutricionista</h2>
                    </div>
                    <div style='margin-top: 16px;'>
                        <a href='../profissionais/profissionais.php'><button class='puts'>Profissionais</button></a>
                    </div>
                </div>";
    }
?>