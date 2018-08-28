<?php
require_once '../controller/verificarSessao.php';
if ($logado == NULL) {
    header('Location: ./index.php');
}
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
        <!-- s-content
    ================================================== -->

        <section class="s-content">

            <div class="row masonry-wrap">
                <div class="masonry">
                    <div class="grid-sizer"></div>
                    <div class='row add-bottom'>
                        <div class='col-twelve'>

                            <?php
                            require_once '../model/pesquisarManutencao.php';
                            ?>


                        </div> <!-- end masonry -->


                        <div id="editar"></div>
                    </div> <!-- end masonry-wrap -->

                </div>
                <div id="mostra"></div>
            </div>
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