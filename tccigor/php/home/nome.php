<?php

$id = $_SESSION["ID"];

$sql = "SELECT * FROM `contas` WHERE `ID` = $id";
$res = mysqli_query($con, $sql);
$holder = mysqli_fetch_assoc($res);

$nome = $holder["Nome"];
$sobrenome = $holder["Sobrenome"];

echo $nome . ' ' . $sobrenome;

?>