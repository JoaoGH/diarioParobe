<?php

require_once '../model/conectar.php';

$idNoticia = $_POST['idNoticia'];
$titulo = $_POST['titulo'];
$lead = $_POST['lead'];
$lead = str_replace("\"", "'", $lead);
$data = $_POST['data'];
$hora = $_POST['hora'];
$autor = $_POST['autor'];
$texto = $_POST['texto'];
$texto = str_replace('"', "'", $texto);
$capa = $_POST['capa'];

require_once '../model/atualizarPagina.php';
