<?php

$user = $_POST['usuario'];
$pas = md5($_POST['senha']);
require_once '../model/conectar.php';
require_once '../model/logar.php';