<?php

require_once '../model/conectar.php';

$texto = $_POST['texto'];
$texto = str_replace('"', "'", $texto);
$capa = $_POST['capa'];
$email = $_POST['email'];

require_once '../model/atualizarContato.php';
