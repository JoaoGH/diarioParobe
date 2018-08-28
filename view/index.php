<?php
require_once '../controller/verificarSessao.php';
?>
<!DOCTYPE html>
<html class="no-js">
    <?php
    require_once './head.php';
    ?>
    <body id="top">
        <!-- pageheader
        ================================================== -->
        <?php
        require_once './cabecalho.php';
        ?>
        <section class="s-content">
            <div class="row masonry-wrap">
                <div class="masonry">
                    <div class="grid-sizer"></div>
                    <?php
                    // MOSTRA A MENSAGEM DE SUCESSO
                    require_once '../model/conectar.php';
                    $q = "SELECT * FROM noticia ORDER BY data DESC";
                    mysqli_query($conexao, $q);
                    $query = $conexao->query($q);
                    $num = $query->num_rows;
                    if ($num > 0) {
                        while ($qtd = mysqli_fetch_array($query)) {
                            $qAutor = "SELECT nomeCompleto FROM usuarios WHERE id=$qtd[6]";
                            $queryAutor = $conexao->query($qAutor);
                            $resultAutor = $queryAutor->fetch_array(MYSQL_NUM);
                            $qtd[6]=$resultAutor[0];
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
                    }else{
                        echo"<p class='lead'>Sem notícias, entre em <a href='./contato'>contato</a> conosco para nos avisar que não conseguiu ler.</p>";
                    }
                    ?>
                </div> <!-- end masonry -->
            </div> <!-- end masonry-wrap -->
        </section> <!-- s-content -->    
        <?php
        require_once './rodape.php';
        ?>
        <!-- preloader
        ================================================== -->
        <div id="preloader">
            <div id="loader">
                <div class="line-scale">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
        <!-- Java Script
        ================================================== -->
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/plugins.js"></script>
        <script src="../js/main.js"></script>
    </body>
</html>