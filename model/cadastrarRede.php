<?php

$sql = "INSERT INTO `links`(`rede`, `link`)"
        . " VALUES (\"$rede\",\"$link\")";

if (!mysqli_query($conexao, $sql)) {
    die('Error: ' . mysqli_error($conexao));
}