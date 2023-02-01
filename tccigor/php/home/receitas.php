<?php
//RANDOMIZANDO POST
$sql = "SELECT * FROM `receitas` ORDER BY `ID` ASC LIMIT 1";
$res = mysqli_query($con, $sql);
$min = mysqli_fetch_assoc($res);

$sql2 = "SELECT * FROM `receitas` ORDER BY `ID` DESC LIMIT 1";
$res2 = mysqli_query($con, $sql2);
$max = mysqli_fetch_assoc($res2);

$rand = rand($min["ID"], $max["ID"]);


$sqlid = "SELECT * FROM `receitas` WHERE `ID` = $rand ";
$resid = mysqli_query($con, $sqlid);
$holder_id = mysqli_fetch_assoc($resid);

$id = $holder_id["idDono"];

//PEGANDO IMAGEM DO DONO DO POST
$sql = "SELECT * FROM `perfis` WHERE `ID` = '$id' LIMIT 1;";
$res = mysqli_query($con, $sql);
$holder_a = mysqli_fetch_assoc($res);

$sqlb = "SELECT * FROM `contas` WHERE `ID` = '$id' LIMIT 1;";
$resb = mysqli_query($con, $sqlb);
$holder_b = mysqli_fetch_assoc($resb);

$img = $holder_a["Imagem"];
$nome = $holder_b["Nome"];
$sobrenome = $holder_b["Sobrenome"];
$titulo = $holder_id["Titulo"];
$descricao = $holder_id["Descricao"];
//TÍTULO DO POST
echo '<div class="titulo">';    
echo '<img src="../../../img/perfil/' . $img . '"> <p>Nova receita de: ' . $nome . ' ' . $sobrenome . '</p> </div>';

//DESCRIÇÃO DO POST
echo '<h4>' . $titulo . '</h4>';
echo $descricao;

//CHEQUE AGORA!
$sqlc = "SELECT * FROM `receitas` WHERE `idDono` = $id LIMIT 1";
$resc = mysqli_query($con, $sqlc);
$holder_c = mysqli_fetch_assoc($resc);

$idreceita = $holder_c["ID"];

echo '<div class="cheque">';
echo '<a href="../receitas/view.php?id='. $idreceita .'"> Cheque agora </a>';
echo '</div>';

?>