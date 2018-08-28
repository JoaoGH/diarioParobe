<?php
require_once '../model/conectar.php';

$q = "SELECT rede FROM links WHERE rede='$rede'";
$query = $conexao->query($q);
$result = $query->fetch_array(MYSQL_NUM);
if ($rede == $result[0]) {
    $disponivel = FALSE;
    echo"False";
} else {
    $disponivel = TRUE;
    echo"True";
}