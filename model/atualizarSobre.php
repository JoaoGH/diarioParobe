<?php

if (isset($capa)) {
    $sql = "UPDATE `fixos` SET `texto`=\"$texto\",`capa`=\"$capa\""
            . " WHERE `pagina`='Sobre'";
}else{
    $sql = "UPDATE `fixos` SET `texto`=\"$texto\""
            . " WHERE `pagina`='Sobre'";
}

if (!mysqli_query($conexao, $sql)) {
    die('Error: ' . mysqli_error($conexao));
}