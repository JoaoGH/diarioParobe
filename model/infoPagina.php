<?php
$qConteudo = "SELECT * FROM noticia WHERE idNoticia=$idNoticia";
$queryConteudo = $conexao->query($qConteudo);
$resultConteudo = $queryConteudo->fetch_array(MYSQL_NUM);

