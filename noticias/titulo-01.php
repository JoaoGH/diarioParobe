
<?php
require_once '../model/conectar.php';
require_once '../model/pegaCaminho.php';
?>
<!DOCTYPE html>
<html class='no-js'>
    <?php
    require_once '../view/head.php';
    ?>

    <body id='top'>

        <!-- pageheader
        ================================================== -->
        <?php
        require_once '../view/cabecalho.php';
        ?>

        <section class='s-content s-content--narrow'>

            <div class='row'>

                <div class='s-content__header col-full'>
                    <h1 class='s-content__header-title'>
                        <?php
                        require_once '../model/pegaTitulo.php';
                        ?>
                    </h1>
                </div> <!-- end s-content__header -->

                <div class='s-content__media col-full'>
                    <div class='s-content__post-thumb'>
                        <!--capa-->
                        <img src='
                        <?php
                        require_once '../model/pegaCapa.php';
                        ?>
                        ' style='width: 100%; height: 100%' alt=''>
                    </div>
                </div> <!-- end s-content__media -->
                <ul class='s-content__header-meta'>
                    <!--Data e Hora-->
                    <li class='date'>
                        <?php
                        require_once '../model/pegaData.php';
                        ?>
                        <lt>
                        <?php
                        require_once '../model/pegaHora.php';
                        ?>
                    </li>
                    <!--Autor-->
                    <li class='cat'>
                        <?php
                        require_once '../model/pegaAutor.php';
                        ?>
                    </li>   
                    <!--Editado-->
                    <br>
                    <li>
                        <?php
                        require_once '../model/pegaEditado.php';
                        ?>
                    </li>
                </ul>

                <div class='col-full s-content__main'>
                    <!--Lead-->
                    <p class='lead'>
                        <?php
                        require_once '../model/pegaLead.php';
                        ?>
                    </p>
                    
                    <?php
                    require_once '../model/pegaTexto.php';
                    ?>



                </div> <!-- end s-content__main -->
                <div id='fb-root'></div>
                <script>(function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id))
                            return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.0';
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                <div class='fb-comments' data-href='http://localhost/diarioparobe/diarioParobe1.22/noticias/titulo-01' data-width='100%' data-numposts='5'></div>
            </div> <!-- end row -->

        </section> <!-- s-content -->
        <?php
        require_once '../view/rodape.php';
        ?>       


        <!-- Java Script
        ================================================== -->
        <script src='../js/jquery-3.2.1.min.js'></script>
        <script src='../js/plugins.js'></script>
        <script src='../js/main.js'></script>

    </body>

</html>