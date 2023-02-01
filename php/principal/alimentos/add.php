<?php
    include "../sessao.php";

    if ((isset($_POST["nome"])) && (isset($_POST["classe"])) && (isset($_POST["info"])) && (isset($_POST["tags"])) && ($tipo == "A")){
        $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
        $classe = filter_input(INPUT_POST, "classe", FILTER_SANITIZE_SPECIAL_CHARS);
        $info = filter_input(INPUT_POST, "info", FILTER_SANITIZE_SPECIAL_CHARS);
        $tags = filter_input(INPUT_POST, "tags", FILTER_SANITIZE_SPECIAL_CHARS);

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
            $imagem = "no-image.png";
        }

        $sql = "INSERT INTO `alimentos` VALUES(NULL, '$nome', '$classe', '$info', '$tags', '$imagem');";
        $res = mysqli_query($con, $sql);

        header("Location: ../../../html/principal/alimentos/alimentos.php");
    }
    else{
        header("Location: ../../../html/principal/home/home.php");
    }
?>