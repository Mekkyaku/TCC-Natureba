<?php
    $pesquisa = NULL;
    $classe = NULL;

    if ((isset($_GET["pqo"])) && ($_GET["pqo"] != "")){
        $pesquisa = $_GET["pqo"];
    }
    else if ((isset($_GET["pesquisa"])) && ($_GET["pesquisa"] != "")){
        $pesquisa = $_GET["pesquisa"];
    }

    if ((isset($_GET["clo"])) && ($_GET["clo"] != "")){
        $classe = $_GET["clo"];
    }
    else if ((isset($_GET["classe"])) && ($_GET["classe"] != "")){
        $classe = $_GET["classe"];
    }

    if ((!isset($pesquisa)) && (!isset($classe))){
        $contador = "SELECT COUNT(*) FROM `alimentos`;";
        $sql = "SELECT * FROM `alimentos`;";
        $caso = 1;
    }
    else if ((isset($pesquisa)) && (!isset($classe))){
        $contador = "SELECT COUNT(*) FROM `alimentos` WHERE `Tags` LIKE '%{$pesquisa}%';";
        $sql = "SELECT * FROM `alimentos` WHERE `Tags` LIKE '%{$pesquisa}%';";
        $caso = 2;
    }
    else if ((!isset($pesquisa)) && (isset($classe))){
        $contador = "SELECT COUNT(*) FROM `alimentos` WHERE `Classe` LIKE '$classe';";
        $sql = "SELECT * FROM `alimentos` WHERE `Classe` LIKE '$classe';";
        $caso = 3;
    }
    else if ((isset($pesquisa)) && (isset($classe))){
        $contador = "SELECT COUNT(*) FROM `alimentos` WHERE `Tags` LIKE '%{$pesquisa}%' AND `Classe` = '$classe';";
        $sql = "SELECT * FROM `alimentos` WHERE `Tags` LIKE '%{$pesquisa}%' AND `Classe` = '$classe';";
        $caso = 4;
    }

    $rst = mysqli_query($con, $contador);
    $qtd = $rst->fetch_row();

    $res = mysqli_query($con, $sql);
    $array = array();
    while ($holder_kaycyy = mysqli_fetch_assoc($res)){
        $array[] = $holder_kaycyy["ID"];
    }

    if (!isset($_GET["page"])){
        $_GET["page"] = 1;
    }
    $page = $_GET["page"];

    $min = 60 * ($page - 1);
    if (isset($array[$min])){
        if ($caso == 1){
            $sql = "SELECT * FROM `alimentos` WHERE `ID` >= '$array[$min]' LIMIT 60;";
        }
        else if ($caso == 2){
            $sql = "SELECT * FROM `alimentos` WHERE `ID` >= '$array[$min]' AND `Tags` LIKE '%{$pesquisa}%' LIMIT 60;";
        }
        else if ($caso == 3){
            $sql = "SELECT * FROM `alimentos` WHERE `ID` >= '$array[$min]' AND `Classe` = '$classe' LIMIT 60;";
        }
        else if ($caso == 4){
            $sql = "SELECT * FROM `alimentos` WHERE `ID` >= '$array[$min]' AND `Tags` LIKE '%{$pesquisa}%' AND `Classe` = '$classe' LIMIT 60;";
        }
    }

    $cleitom = mysqli_query($con, $sql);
?>