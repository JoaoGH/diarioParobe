<?php

require_once '../model/conectar.php';
//
$user = $_POST['nomeU'];
$senha1 = md5($_POST['senha1']);
$senha2 = md5($_POST['senha2']);
$senhaA = md5($_POST['senhaA']);
if ($senha1 == $senha2) {
    $q1 = "SELECT * FROM usuarios WHERE usuario='$user'";
    $query1 = $conexao->query($q1);
    $result1 = $query1->fetch_array(MYSQL_NUM);
    if ($senhaA == $result1[2]) {
        $q = "UPDATE usuarios SET senha='$senha1' WHERE usuario='$user'";
        $query = $conexao->query($q);
        echo "True";
    } else {
        echo "Senha incorreta";
    }
} else {
    echo "Senhas diferentes";
}