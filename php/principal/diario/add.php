<?php
    include "../sessao.php";

    if ((isset($_POST["peso"])) && (isset($_POST["alimentacao"])) && (isset($_POST["agua"]))){
        $peso = filter_input(INPUT_POST, "peso", FILTER_SANITIZE_SPECIAL_CHARS);
        $alimentacao = filter_input(INPUT_POST, "alimentacao", FILTER_SANITIZE_SPECIAL_CHARS);
        $agua = filter_input(INPUT_POST, "agua", FILTER_SANITIZE_SPECIAL_CHARS);

        if (isset($_POST["extra"])){
            $extra = filter_input(INPUT_POST, "extra", FILTER_SANITIZE_SPECIAL_CHARS);
        }
        else{
            $extra = "";
        }

        if (isset($_POST["exercicios"])){
            $exercicios = filter_input(INPUT_POST, "exercicios", FILTER_SANITIZE_SPECIAL_CHARS);
        }
        else{
            $exercicios = "";
        }

        if (isset($_POST["sintomas"])){
            $sintomas = filter_input(INPUT_POST, "sintomas", FILTER_SANITIZE_SPECIAL_CHARS);
        }
        else{
            $sintomas = "";
        }

        $sucess = FALSE;
        if ((isset($_FILES["image"]["name"])) && ($_FILES["image"]["error"] == 0)){
            $tmp = $_FILES["image"]["tmp_name"];
            $name = $_FILES["image"]["name"];
            $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

            if (strstr(".jpg;.jpeg;.gif;.png", $ext)){
                $imagem = uniqid(time()) . "." . $ext;
                $local = "../../../img/diario/" . $imagem;

                if (move_uploaded_file($tmp, $local)){
                    $sucess = TRUE;
                }
            }
        }
        if ($sucess == FALSE){
            $imagem = "no-image.png";
        }

        include "data.php";

        $sql = "INSERT INTO `diarios` VALUES(NULL, '$id', '$dataa', '$peso', '$alimentacao', '$agua', '$extra', '$exercicios', '$sintomas', '$imagem');";
        $res = mysqli_query($con, $sql);

        header("Location: ../../../html/principal/diario/view.php");
    }
    else{
        header("Location: ../../../html/principal/home/home.php");
    }
?>