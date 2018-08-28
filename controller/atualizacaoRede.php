<?php

require_once '../model/conectar.php';

$idRede = $_POST['idRede'];
$rede = $_POST['rede'];
$link = $_POST['link'];

require_once '../model/atualizarRede.php';
