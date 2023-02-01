<?php
    if (isset($_GET["id"])){
        $sql = "SELECT * FROM `chat` WHERE `User1` = '$id' OR `User2` = '$id' ORDER BY `ID` ASC;";
        $res = mysqli_query($con, $sql);

        while ($holder_future = mysqli_fetch_assoc($res)){
            $idPreset = filter_input(INPUT_GET, "id", FILTER_SANITIZE_SPECIAL_CHARS);

            if ($holder_future["User1"] == $idPreset){
                
                $sql = "SELECT * FROM `contas` WHERE `ID` = '$idPreset' LIMIT 1;";
                $rst = mysqli_query($con, $sql);
                $holder_woo = mysqli_fetch_assoc($rst);

                $sql = "SELECT * FROM `perfis` WHERE `idUser` = '$idPreset' LIMIT 1;";
                $rst = mysqli_query($con, $sql);
                $holder_owo = mysqli_fetch_assoc($rst);

                echo    "<div class='mensagem' style='margin-top: 16px;'>
                            <div>
                                <img alt='Imagem de perfil' class='mensagem' src='../../../img/perfil/" . $holder_owo["Imagem"] . "'>
                            </div>
                            <div class='texto' style='margin-left: 16px;'>" . $holder_future["Mensagem"] . "</div>
                        </div>";
            }
            else if ($holder_future["User2"] == $idPreset){
                echo    "<div class='mensagem' style='margin-left: auto; margin-top: 16px;'>
                            <div class='texto' style='background-color: #A5E887; margin-right: 16px;'>" . $holder_future["Mensagem"] . "</div>
                            <div>
                                <img alt='Imagem de perfil' class='mensagem' src='../../../img/perfil/" . $imagem . "'>
                            </div>
                        </div>";
            }
        }
    }
?>