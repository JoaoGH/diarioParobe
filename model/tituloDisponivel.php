<?php
$q = "SELECT caminho FROM noticia WHERE caminho='$caminho'";
$query = $conexao->query($q);
$result = $query->fetch_array(MYSQL_NUM);
if ($caminho == $result[0]) {
    $disponivel=FALSE;
    echo"False";
} else {
    $disponivel=TRUE;
    echo"True";
}