<?php
require_once '../controller/verificarSessao.php';
if ($logado != "sim") {
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
        <section class="s-content s-content--narrow">

            <div class="row">

                <div class="s-content__header col-full">
                    <h1 class="s-content__header-title">
                        Cadastro de redes sociais
                    </h1>
                </div> <!-- end s-content__header -->
                <br><br><br><br><br>
                <div class="col-full s-content__main">

                    <p>Preencha os campos obrigatórios (*).</p>
                    <section class="s-content s-content--narrow s-content--no-padding-bottom">

                        <article class="row format-standard">
                            <strong>Nome da rede social (*):</strong>
                            <div class="form-field">
                                <input oninput="Rede()" name="rede" type="text" id="rede" class="full-width" placeholder="Insira o nome da rede social aqui..." value="" required="" maxlength="255">
                                <span id="msg" class="alert-box--error"></span><br>
                            </div>
                            <br>
                            <div class="form-field">
                                <input name="link" type="text" id="link" class="full-width" placeholder="Insira o link da rede social aqui..." value="" required="" maxlength="255">
                            </div>
                            <br>
                            <button id="cadNoticia" type="submit" onclick="PodeCadRede()">Enviar</button>
                        </article>
                    </section>
                    <div id="testMaroto"></div>
                </div> <!-- end s-content__main -->

            </div> <!-- end row -->

        </section> <!-- s-content -->
        <?php
        require_once './rodape.php';
        ?>

        <!-- Java Script
        ================================================== -->
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/plugins.js"></script>
        <script src="../js/main.js"></script>
    </body>

</html> 