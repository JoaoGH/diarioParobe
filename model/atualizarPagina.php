<?php

if (isset($capa)) {
    $sql = "UPDATE `noticia` SET `titulo`=\"$titulo\", `lead`=\"$lead\",`data`=\"$data\","
            . "`hora`=\"$hora\",`autor`=\"$autor\",`txtNoticia`=\"$texto\",`capa`=\"$capa\","
            . "`editado`='1' WHERE `idNoticia`=$idNoticia";
}else{
    $sql = "UPDATE `noticia` SET `titulo`=\"$titulo\", `lead`=\"$lead\",`data`=\"$data\","
            . "`hora`=\"$hora\",`autor`=\"$autor\",`txtNoticia`=\"$texto\",`editado`='1' "
            . "WHERE `idNoticia`=$idNoticia";
}

if (!mysqli_query($conexao, $sql)) {
    die('Error: ' . mysqli_error($conexao));
}