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
        require_once '../model/conectar.php';
        $qConteudo = "SELECT texto,capa FROM fixos WHERE pagina='Contato'";
        $queryConteudo = $conexao->query($qConteudo);
        $resultConteudo = $queryConteudo->fetch_array(MYSQL_NUM);
        ?>
        <!-- s-content
    ================================================== -->
        <section class="s-content s-content--narrow">

            <div class="row">

                <div class="s-content__header col-full">
                    <h1 class="s-content__header-title">
                        Contato
                    </h1>
                </div><br>
                <div class='s-content__media col-full'>
                    <div class='s-content__post-thumb'>
                        <!--capa-->
                        <img src='
                        <?php
                        echo $resultConteudo[1];
                        ?>
                             ' style='width: 100%; height: 100%' alt=''>
                    </div>
                </div> <br>

                <div class="col-full s-content__main">
                    <div id="edit" name="edit">
                        <?php
                        echo $resultConteudo[0];
                        ?>
                    </div>
                    <?php
                    $qRede = "SELECT rede, link FROM links";
                    mysqli_query($conexao, $qRede);
                    $queryRede = $conexao->query($qRede);
                    $numRede = $queryRede->num_rows;
                    if ($numRede > 0) {
                        echo"<h4>Redes Sociais</h4>";
                        while ($resultRede = mysqli_fetch_array($queryRede)) {
                            echo"<a href='" . $resultRede[1] . "' target='_blank'>" . $resultRede[0] . "</a>";
                        }
                    }
                    ?>
                </div>


            </div> <!-- end s-content__main -->
        </div> <!-- end row -->

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