<?php

$qConteudo = "SELECT autor FROM noticia WHERE caminho='$nomeArquivo'";
$queryConteudo = $conexao->query($qConteudo);
$resultConteudo = $queryConteudo->fetch_array(MYSQL_NUM);

$qConteudo2 = "SELECT nomeCompleto FROM usuarios WHERE id=$resultConteudo[0]";
$queryConteudo2 = $conexao->query($qConteudo2);
$resultConteudo2 = $queryConteudo2->fetch_array(MYSQL_NUM);


echo $resultConteudo2[0];

