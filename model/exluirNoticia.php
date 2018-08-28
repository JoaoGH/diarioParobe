<?php

//exlui do banco
$sql = "DELETE FROM `noticia` WHERE idNoticia=$idNoticia";
if (!mysqli_query($conexao, $sql)) {
    die('Error: ' . mysqli_error($conexao));
}
