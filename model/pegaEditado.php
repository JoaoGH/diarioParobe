<?php

$qConteudo = "SELECT editado FROM noticia WHERE caminho='$nomeArquivo'";
$queryConteudo = $conexao->query($qConteudo);
$resultConteudo = $queryConteudo->fetch_array(MYSQL_NUM);
if (isset($resultConteudo[0])) {
    echo "Editado";
}
else{
    echo "";
}

