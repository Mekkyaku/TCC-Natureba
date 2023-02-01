<?php
    include "../sessao.php";

    if (isset($_POST["id"])){
        $idAlimento = $_POST["id"];

        $sql = "SELECT * FROM `alimentos` WHERE `ID` = '$idAlimento' LIMIT 1;";
        $res = mysqli_query($con, $sql);

        $alimento = mysqli_fetch_assoc($res);

        echo    "<div class='nome'>
                    <h1 class='nome'>" . $alimento["Nome"] . "</h1>
                </div>
                <div style='margin-left: auto; margin-right: auto; margin-top: 16px; width: fit-content;'>
                    <img alt='Imagem do alimento' class='alimento' src='../../../img/alimento/" . $alimento["Imagem"] ."'>
                </div>
                <div style='margin-top: 16px;'>
                    <label class='texto'>Informações nutricionais:</label>
                    <textarea class='texto' readonly style='height: 640px;'>" . $alimento["Info"] . "</textarea>
                </div>
                <div class='a' style='margin-left: auto; width: fit-content;'>";

                    if ($tipo == 'A'){
                        echo "<a class='alimento' href='edit.php?id=" . $idAlimento . "'>Editar alimento</a>";
                    }

        echo    "</div>";
    }
?>