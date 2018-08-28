<?php

require_once '../model/conectar.php';
//
$user = $_POST['nomeU'];
$novoNome = $_POST['nomeN'];
$novoEmail = $_POST['emailN'];
$q="UPDATE usuarios SET email='$novoEmail',nomeCompleto='$novoNome' WHERE usuario='$user'";
$query = $conexao->query($q);
echo "True";