<?php

$encontrou = 0;
$q = "SELECT * FROM noticia WHERE titulo LIKE '%$itemPesquisa%' or "
        . "caminho LIKE '%$itemPesquisa%' or "
        . "lead LIKE '%$itemPesquisa%' or "
        . "data LIKE '%$itemPesquisa%' or "
        . "txtNoticia LIKE '%$itemPesquisa%' "
        . "ORDER BY data DESC";
mysqli_query($conexao, $q);
$query = $conexao->query($q);
$num = $query->num_rows;
if ($num > 0) {
    while ($qtd = mysqli_fetch_array($query)) {
        $qAutor = "SELECT nomeCompleto FROM usuarios WHERE id=$qtd[6]";
        $queryAutor = $conexao->query($qAutor);
        $resultAutor = $queryAutor->fetch_array(MYSQL_NUM);
        $qtd[6] = $resultAutor[0];
        if ($qtd[8] != null) {
            echo"
                    <article class='masonry__brick entry format-standard' data-aos='fade-up'>

                        <div class='entry__thumb'>
                            <a href='../noticias/" . $qtd[2] . "' class='entry__thumb-link'>
                                <img src='" . $qtd[8] . "' style='width: 100%; height: 100%' alt=''>
                            </a>
                        </div>

                        <div class='entry__text'>
                            <div class='entry__header'>

                                <div class='entry__date'>" .
            $qtd[4] . "\t" . $qtd[5] .
            "</div>
                                <h1 class='entry__title'><a href='../noticias/" . $qtd[2] . "'>" . $qtd[1] . "</a></h1>

                            </div>
                            <div class='entry__excerpt'>
                                <p>
                                    " . $qtd[3] . "
                                </p>

                                <cite>Por " . $qtd[6] . "</cite>
                            </div>
                        </div>

                    </article> <!-- noticia com imgem -->";
        } else {
            echo"
                    <article class='masonry__brick entry format-standard' data-aos='fade-up'>
                        <div class='entry__text'>
                            <div class='entry__header'>

                                <div class='entry__date'>" .
            $qtd[4] . "\t" . $qtd[5] .
            "
                                </div>
                                <h1 class='entry__title'><a href='../noticias/" . $qtd[2] . "'>" . $qtd[1] . "</a></h1>

                            </div>
                            <div class='entry__excerpt'>
                                <p>
                                    " . $qtd[3] . "
                                </p>

                                <cite>Por " . $qtd[6] . "</cite>
                            </div>
                        </div>

                    </article> <!-- noticia com imgem -->";
        }
    }
    $encontrou = $encontrou + 1;
}

$q2 = "SELECT id FROM usuarios WHERE nomeCompleto Like '%$itemPesquisa%'";
mysqli_query($conexao, $q2);
$query2 = $conexao->query($q2);
$qtd2 = mysqli_fetch_array($query2);
$num2 = $query2->num_rows;
if ($num2 > 0) {
    for ($i = 0; $i < count($qtd2) - 1; $i++) {
        $q3 = "SELECT * FROM noticia WHERE autor=$qtd2[$i] "
                . "ORDER BY data DESC";
        $query3 = $conexao->query($q3);
        $num3 = $query3->num_rows;
        if ($num3 > 0) {
            while ($qtd3 = mysqli_fetch_array($query3)) {
                $qAutor = "SELECT nomeCompleto FROM usuarios WHERE id=$qtd3[6]";
                $queryAutor = $conexao->query($qAutor);
                $resultAutor = $queryAutor->fetch_array(MYSQL_NUM);
                $qtd3[6] = $resultAutor[0];
                if ($qtd3[8] != null) {
                    echo"
                    <article class='masonry__brick entry format-standard' data-aos='fade-up'>

                        <div class='entry__thumb'>
                            <a href='../noticias/" . $qtd3[2] . "' class='entry__thumb-link'>
                                <img src='" . $qtd3[8] . "' style='width: 100%; height: 100%' alt=''>
                            </a>
                        </div>

                        <div class='entry__text'>
                            <div class='entry__header'>

                                <div class='entry__date'>" .
                    $qtd3[4] . "\t" . $qtd3[5] .
                    "</div>
                                <h1 class='entry__title'><a href='../noticias/" . $qtd3[2] . "'>" . $qtd3[1] . "</a></h1>

                            </div>
                            <div class='entry__excerpt'>
                                <p>
                                    " . $qtd3[3] . "
                                </p>

                                <cite>Por " . $qtd3[6] . "</cite>
                            </div>
                        </div>

                    </article> <!-- noticia com imgem -->";
                } else {
                    echo"
                    <article class='masonry__brick entry format-standard' data-aos='fade-up'>
                        <div class='entry__text'>
                            <div class='entry__header'>

                                <div class='entry__date'>" .
                    $qtd3[4] . "\t" . $qtd3[5] .
                    "
                                </div>
                                <h1 class='entry__title'><a href='../noticias/" . $qtd3[2] . "'>" . $qtd3[1] . "</a></h1>

                            </div>
                            <div class='entry__excerpt'>
                                <p>
                                    " . $qtd3[3] . "
                                </p>

                                <cite>Por " . $qtd3[6] . "</cite>
                            </div>
                        </div>

                    </article> <!-- noticia com imgem -->";
                }
            }
        }
        $encontrou = $encontrou + 1;
    }
} if ($encontrou == 0) {
    echo"<p class='lead'>Sem notícias encontradas para '$itemPesquisa'.</p>";
}