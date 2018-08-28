<?php

$sql = "UPDATE `links` SET `rede`=\"$rede\", `link`=\"$link\" WHERE `idLink`=$idRede";
if (!mysqli_query($conexao, $sql)) {
    die('Error: ' . mysqli_error($conexao));
}