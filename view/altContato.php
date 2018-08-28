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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <!--<link rel="stylesheet" href="../editordeTexto/css/font-awesome.min.css">-->
    <link rel="stylesheet" href="../editordeTexto/css/froala_editor.css">
    <link rel="stylesheet" href="../editordeTexto/css/froala_style.css">
    <link rel="stylesheet" href="../editordeTexto/css/plugins/char_counter.min.css">
    <link rel="stylesheet" href="../editordeTexto/css/plugins/code_view.min.css">
    <link rel="stylesheet" href="../editordeTexto/css/plugins/draggable.min.css">
    <link rel="stylesheet" href="../editordeTexto/css/plugins/colors.min.css">
    <link rel="stylesheet" href="../editordeTexto/css/plugins/fullscreen.min.css">
    <link rel="stylesheet" href="../editordeTexto/css/plugins/image.min.css">
    <link rel="stylesheet" href="../editordeTexto/css/plugins/image_manager.min.css">
    <link rel="stylesheet" href="../editordeTexto/css/plugins/line_breaker.min.css">
    <link rel="stylesheet" href="../editordeTexto/css/plugins/table.min.css">
    <link rel="stylesheet" href="../editordeTexto/css/plugins/video.min.css">
    <!--<link rel="stylesheet" href="../editordeTexto/css/codemirror.min.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">


    <?php
    require_once './cabecalho.php';
    ?>
    <body id="top">

        <!-- pageheader
        ================================================== -->
        <?php
        require_once '../model/conectar.php';
        $qSobre = "SELECT capa,texto,email FROM fixos WHERE pagina='Contato'";
        $querySobre = $conexao->query($qSobre);
        $resultSobre = $querySobre->fetch_array(MYSQL_NUM);
        ?>
        <!-- s-content
    ================================================== -->
        <section class="s-content s-content--narrow">

            <div class="row">

                <div class="s-content__header col-full">
                    <h1 class="s-content__header-title">
                        Atualização do texto de páginas
                    </h1>
                </div> <!-- end s-content__header -->
                <br><br><br><br><br>
                <div class="col-full s-content__main">

                    <p class="lead">Aqui você muda  textos das páginas Contato.</p>
                    <p>Preencha os campos obrigatórios (*).</p>
                    <section class="s-content s-content--narrow s-content--no-padding-bottom">

                        <article class="row format-standard">


                            <strong>Capa da página:</strong>
                            <select id="capa" class="full-width" onchange="AtualizaCapa()">
                                <option value="0">Manter</option>
                                <option value="1">Retirar</option>
                                <option value="2">Alterar</option>
                            </select>
                            <div id="divCapa" class="form-field" style="display: none">
                                Insira imagem de capa (*): <input id="imgCapa" type="file" name="imgCapa" onchange="Capa()">
                                <input type="hidden" id="capaB64" value="<?php echo $resultSobre[0]; ?>"/>
                            </div>
                            <strong>E-mail de contato (*):</strong><br><small>Serve para funções internas, como recuperação de senha.</small>
                            <input name="email" type="text" id="email" class="full-width" value="<?php echo $resultSobre[2]; ?>" required="">
                            <br>
                            <br>


                            <strong>Texto da página (*):</strong>
                            <div id="editor" style="margin: auto;text-align: left;">
                                <div id='edit' name="edit">
                                    <?php
                                    echo utf8_encode($resultSobre[1]);
                                    ?>
                                </div>
                            </div>
                            <br>

                            <button id="cadNoticia" type="submit" onclick="AtualizarContato()">Atualizar</button>
                        </article>
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                        <!--<script type="text/javascript" src="../editordeTexto/js/jquery.min.js"></script>-->
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
                        <!--<script type="text/javascript" src="../editordeTexto/js/codemirror.min.js"></script>-->
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
                        <!--<script type="text/javascript" src="../editordeTexto/js/xml.min.js"></script>-->
                        <script type="text/javascript" src="../editordeTexto/js/froala_editor.min.js" ></script>
                        <script type="text/javascript" src="../editordeTexto/js/plugins/align.min.js"></script>
                        <script type="text/javascript" src="../editordeTexto/js/plugins/char_counter.min.js"></script>
                        <script type="text/javascript" src="../editordeTexto/js/plugins/code_beautifier.min.js"></script>
                        <script type="text/javascript" src="../editordeTexto/js/plugins/code_view.min.js"></script>
                        <script type="text/javascript" src="../editordeTexto/js/plugins/colors.min.js"></script>
                        <script type="text/javascript" src="../editordeTexto/js/plugins/draggable.min.js"></script>
                        <script type="text/javascript" src="../editordeTexto/js/plugins/entities.min.js"></script>
                        <script type="text/javascript" src="../editordeTexto/js/plugins/fullscreen.min.js"></script>
                        <script type="text/javascript" src="../editordeTexto/js/plugins/image.min.js"></script>
                        <script type="text/javascript" src="../editordeTexto/js/plugins/image_manager.min.js"></script>
                        <script type="text/javascript" src="../editordeTexto/js/plugins/line_breaker.min.js"></script>
                        <script type="text/javascript" src="../editordeTexto/js/plugins/link.min.js"></script>
                        <script type="text/javascript" src="../editordeTexto/js/plugins/lists.min.js"></script>
                        <script type="text/javascript" src="../editordeTexto/js/plugins/paragraph_format.min.js"></script>
                        <script type="text/javascript" src="../editordeTexto/js/plugins/paragraph_style.min.js-"></script>
                        <script type="text/javascript" src="../editordeTexto/js/plugins/quote.min.js"></script>
                        <script type="text/javascript" src="../editordeTexto/js/plugins/save.min.js"></script>
                        <script type="text/javascript" src="../editordeTexto/js/plugins/table.min.js"></script>
                        <script type="text/javascript" src="../editordeTexto/js/plugins/url.min.js"></script>
                        <script type="text/javascript" src="../editordeTexto/js/plugins/video.min.js"></script>
                        <script src='../editordeTexto/js/languages/pt_br.js'></script>

                        <script>
                                $(function () {
                                    $('#editor').froalaEditor({
                                        language: 'pt_br'})
                                            .on('froalaEditor.image.beforeUpload', function (e, editor, files) {

                                                if (files.length) {
                                                    var reader = new FileReader();
                                                    reader.onload = function (e) {
                                                        var result = e.target.result;

                                                        editor.image.insert(result, null, null, editor.image.get());
                                                    };

                                                    reader.readAsDataURL(files[0]);
                                                }
                                                return false;
                                            })
                                });
                        </script>


                    </section>
                    <div id="testMaroto"></div>
                </div> <!-- end s-content__main -->

            </div> <!-- end row -->

        </section> <!-- s-content -->
        <?php
        require_once './rodape.php';
        ?>

    </body>

</html> 