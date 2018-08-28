<?php

require_once '../model/conectar.php';
$qEmail = "SELECT email FROM fixos WHERE pagina='Contato'";
$queryEmail = $conexao->query($qEmail);
$resultEmail = $queryEmail->fetch_array(MYSQL_NUM);
$emailSite = $resultEmail[0];

function randString($size) {
    //String com valor possíveis do resultado, os caracteres pode ser adicionado ou retirados conforme sua necessidade
    $basic = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $return = "";
    for ($count = 0; $size > $count; $count++) {
        //Gera um caracter aleatorio
        $return .= $basic[rand(0, strlen($basic) - 1)];
    }
    return $return;
}

require_once '../model/conectar.php';

$nick = $_POST['usuario'];
$email = $_POST['email'];


$q = "SELECT usuario,email FROM usuarios WHERE usuario='$nick' and email='$email'";
$query = $conexao->query($q);
$result = $query->fetch_array(MYSQL_NUM);
if ($nick == $result[0] && $email == $result[1]) {
    $alterar = TRUE;
} else {
    $alterar = FALSE;
}

if ($alterar == TRUE) {
    $senhaG = randString(20);

    //email
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    //falar com anderson
    $from = "" . $emailSite;
    $to = "" . $email;
    $subject = "Diario Parobé";
    $message = "Você solicitou uma atualização de senha. Sua nova senha é: " . $senhaG;
    $headers = "De:" . $from;
    mail($to, $subject, $message, $headers);
    //att no db
    $senhaGC = md5($senhaG);
    $sql = "UPDATE `usuarios` SET `senha`='$senhaGC' WHERE 1";
    if (!mysqli_query($conexao, $sql)) {
        die('Error: ' . mysqli_error($conexao));
    }

    $msg = "Nova senha enviada via e-mail";
} else {
    $msg = "Nome de usuário ou e-mail inválidos.";
}
echo $msg;
