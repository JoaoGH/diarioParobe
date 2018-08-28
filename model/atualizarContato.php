<?php

if (isset($capa)) {
    $sql = "UPDATE `fixos` SET `texto`=\"$texto\",`capa`=\"$capa\", email=\"$email\""
            . " WHERE `pagina`='Contato'";
}else{
    $sql = "UPDATE `fixos` SET `texto`=\"$texto\""
            . " WHERE `pagina`='Contato'";
}

if (!mysqli_query($conexao, $sql)) {
    die('Error: ' . mysqli_error($conexao));
}