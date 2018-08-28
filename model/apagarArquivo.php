<?php

$q = "SELECT caminho FROM noticia WHERE idNoticia=$idNoticia";
$query = $conexao->query($q);
$result = $query->fetch_array(MYSQL_NUM);
$apagar="../noticias/$result[0].php";
unlink($apagar);


//rmdir("../noticia/$result[0].php");
//array_map("unlink", "../noticia/$result[0].php");
//unlink(realpath("../noticia/$result[0].php")) or die("Erro exluir diretório");