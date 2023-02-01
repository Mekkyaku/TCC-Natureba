<?php 
    $sql = "SELECT * FROM `alimentos` ORDER BY `ID` ASC LIMIT 1";
    $res = mysqli_query($con, $sql);
    $min = mysqli_fetch_assoc($res);
    
    $sql2 = "SELECT * FROM `alimentos` ORDER BY `ID` DESC LIMIT 1";
    $res2 = mysqli_query($con, $sql2);
    $max = mysqli_fetch_assoc($res2);

    $id = rand($min["ID"], $max["ID"]);

    $sql = "SELECT * FROM `alimentos` WHERE `ID` = '$id' LIMIT 1;";
    $res = mysqli_query($con, $sql);
    $holder_a = mysqli_fetch_assoc($res);

    $nome = $holder_a["Nome"];

    echo "<center> Tabela nutricional do " . $nome . "</center> <br>";

    $imagem = $holder_a["Imagem"];

    echo "<center> <img src='../../../img/alimento/". "$imagem" . "'> </center>"; 

    $classe = $holder_a["Classe"];
    
    echo "<h4> Classe: " . $classe . "</h4>";

    //CHEQUE AGORA!
    $sqlc = "SELECT * FROM `alimentos` WHERE `ID` = $id LIMIT 1";
    $resc = mysqli_query($con, $sqlc);
    $holder_c = mysqli_fetch_assoc($resc);

    $idalimento = $holder_c["Nome"];

    echo '<div class="cheque">';
    echo '<a href="../alimentos/alimentos.php?pesquisa='. $idalimento .'"> Cheque agora </a>';
    echo '</div>';

?>