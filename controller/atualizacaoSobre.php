<?php

require_once '../model/conectar.php';

$texto = $_POST['texto'];
$texto = str_replace('"', "'", $texto);
$capa = $_POST['capa'];

require_once '../model/atualizarSobre.php';
