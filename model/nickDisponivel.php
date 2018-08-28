<?php
$q = "SELECT usuario FROM usuarios WHERE usuario='$user'";
$query = $conexao->query($q);
$result = $query->fetch_array(MYSQL_NUM);
if ($user == $result[0]) {
    $disponivel=FALSE;
    echo"False";
} else {
    $disponivel=TRUE;
    echo"True";
}