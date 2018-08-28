<?php

$qConteudo = "SELECT capa FROM noticia WHERE caminho='$nomeArquivo'";
$queryConteudo = $conexao->query($qConteudo);
$resultConteudo = $queryConteudo->fetch_array(MYSQL_NUM);
echo $resultConteudo[0];

