<?php

//exlui do banco
$sql = "DELETE FROM `links` WHERE idLink=$idRede";
if (!mysqli_query($conexao, $sql)) {
    die('Error: ' . mysqli_error($conexao));
}
