<?php
date_default_timezone_set('America/Sao_Paulo');
$data=date("d/m/Y");
$hora=date("H:m");


if(isset($capa)){
    $sql = "INSERT INTO `noticia`(`titulo`, `caminho`, `lead`, `data`, `hora`, `autor`, `txtNoticia`,`capa`)"
        . " VALUES (\"$titulo\",\"$caminho\",\"$lead\",\"$data\",\"$hora\",\"$autor\",\"$texto\",\"$capa\" )";
}else{
    $sql = "INSERT INTO `noticia`(`titulo`, `caminho`, `lead`, `data`, `hora`, `autor`, `txtNoticia`)"
        . " VALUES (\"$titulo\",\"$caminho\",\"$lead\",\"$data\",\"$hora\",\"$autor\",\"$texto\" )";
}

if (!mysqli_query($conexao, $sql)) {
    die('Error: ' . mysqli_error($conexao));
}

