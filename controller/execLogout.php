<?php
require_once './verificarSessao.php';
session_destroy();
$_SESSION['login'] = "";

header('Location: ../view/index.php');