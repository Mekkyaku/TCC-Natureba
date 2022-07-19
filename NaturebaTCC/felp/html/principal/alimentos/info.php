<?php
    $id = $_POST['id'];

    $con = mysqli_connect("localhost", "root", "", "natureba");
    $code = "SELECT * FROM `alimentos` WHERE `ID` = '$id' LIMIT 1;";
    $exec = $con->query($code) or die($con->error);
    $alimento = $exec->fetch_assoc();

    echo    "<div style='padding: 16px;'>
                <div>
                    <button class='info' onclick='hideinfo()'></button>
                </div>
                <div>
                    <h1 class='info'>Informações do alimento</h1> 
                </div>
                <div style='padding-top: 32px;'>
                    <div class='info'><p class='info'>" . $alimento["nome"] . "</p></div>
                </div>
                <div style='padding-top: 8px;'>
                    <textarea class='info' readonly>" . $alimento["info"] . "</textarea>
                </div>
            </div>";
?>