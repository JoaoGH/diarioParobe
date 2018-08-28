<?php

$qConteudo = "SELECT txtNoticia FROM noticia WHERE caminho='$nomeArquivo'";
$queryConteudo = $conexao->query($qConteudo);
$resultConteudo = $queryConteudo->fetch_array(MYSQL_NUM);
echo $resultConteudo[0];

