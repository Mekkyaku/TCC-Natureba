<?php
    include "../sessao.php";

    if ((isset($_GET["id"])) && (isset($_POST["nome"])) && (isset($_POST["classe"])) && (isset($_POST["info"])) && (isset($_POST["tags"])) && ($tipo == "A")){
        $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
        $classe = filter_input(INPUT_POST, "classe", FILTER_SANITIZE_SPECIAL_CHARS);
        $info = filter_input(INPUT_POST, "info", FILTER_SANITIZE_SPECIAL_CHARS);
        $tags = filter_input(INPUT_POST, "tags", FILTER_SANITIZE_SPECIAL_CHARS);
        $idAlimento = filter_input(INPUT_GET, "id", FILTER_SANITIZE_SPECIAL_CHARS);

        $sql = "SELECT * FROM `alimentos` WHERE `ID` = '$idAlimento' LIMIT 1;";
        $res = mysqli_query($con, $sql);
        $holder_quavo = mysqli_fetch_assoc($res);

        $sucess = FALSE;
        if ((isset($_FILES["image"]["name"])) && ($_FILES["image"]["error"] == 0)){
            $tmp = $_FILES["image"]["tmp_name"];
            $name = $_FILES["image"]["name"];
            $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

            if (strstr(".jpg;.jpeg;.gif;.png", $ext)){
                $imagem = uniqid(time()) . "." . $ext;
                $local = "../../../img/alimento/" . $imagem;

                if (move_uploaded_file($tmp, $local)){
                    $sucess = TRUE;
                }
            }
        }
        if ($sucess == FALSE){
            $imagem = $holder_quavo["Imagem"];
        }

        $sql = "UPDATE `alimentos` SET `Nome` = '$nome', `Classe` = '$classe', `Info` = '$info', `Tags` = '$tags', `Imagem` = '$imagem' WHERE `ID` = '$idAlimento' LIMIT 1;";
        $res = mysqli_query($con, $sql);

        header("Location: ../../../html/principal/alimentos/alimentos.php");
    }
    else{
        header("Location: ../../../html/principal/home/home.php");
    }
?>