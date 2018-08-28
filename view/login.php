<?php
require_once '../controller/verificarSessao.php';
if ($logado == "sim") {
    header("Location: ./perfil");
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
                        Bem-vindo!
                    </h1>
                </div> <!-- end s-content__header -->



                <div class="col-full s-content__main">

                    <h3>Informe seus dados</h3>
                        <fieldset>

                            <div class="form-field">
                                <input name="usuario" type="text" id="usuario" class="full-width" placeholder="Usuário" value="" required="">
                            </div>

                            <div class="form-field">
                                <input name="senha" type="password" id="senha" class="full-width" placeholder="Senha" value="" required="">
                            </div>

                            <div class="form-field">
                                <span id="msg"></span><br>
                                <a href="../view/recuperarSenha">Esqueceu sua senha?</a>
                            </div><br>
                            <button onclick="Login()" class="submit btn btn--primary full-width">Logar</button>

                        </fieldset>

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