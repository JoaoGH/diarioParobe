<?php

$q = "SELECT usuario,senha,nomeCompleto FROM usuarios WHERE usuario='$user' and senha='$pas'";
$query = $conexao->query($q);
$result = $query->fetch_array(MYSQL_NUM);
if ($user == $result[0] && $pas==$result[1]) {
    session_start();
    $_SESSION['login'] = $user;
    $_SESSION['nomeCompleto'] = $result[2];
    echo"True";
} else {
    echo"False";
}