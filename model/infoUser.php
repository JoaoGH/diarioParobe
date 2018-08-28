<?php
require_once '../model/conectar.php';
$user = $_SESSION['login'];

$q = "SELECT * FROM usuarios WHERE usuario='$user'";
$query = $conexao->query($q);
$result = $query->fetch_array(MYSQL_NUM);

                    
echo "<p>Nome de usuário: ".$result[1]."<br>";
echo "E-mail: ".$result[3]."<br>";
echo "Nome completo: ".$result[4]."</p>";