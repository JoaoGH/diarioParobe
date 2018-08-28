<?php
require_once '../controller/verificarSessao.php';
if ($logado != "sim") {
    header('Location: ./index.php');
}
require_once '../model/conectar.php';
$idNoticia = $_POST['id'];
require_once '../model/infoPagina.php';
?>
<!DOCTYPE html>
<html class="no-js">
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


    <body>

        <section class="s-content s-content--narrow">

            <div class="col-full s-content__main">

                <section class="s-content s-content--narrow s-content--no-padding-bottom">

                    <article class="row format-standard">
                        <input type="hidden" id="idNoticia" value="<?php echo $idNoticia; ?>"/>
                        <strong>Título da notícia (*):</strong>
                        <div class="form-field">
                            <input oninput="Titulo()" name="titulo" type="text" id="titulo" class="full-width" placeholder="Insira o título aqui..." value="<?php echo $resultConteudo[1]; ?>" required="">
                            <span id="msg" class="alert-box--error"></span><br>
                        </div>
                        <br>

                        <ul class="s-content__header-meta">
                            <?php date_default_timezone_set('America/Sao_Paulo'); ?>
                            <strong>Data: </strong><li class="date" id="data"><?php echo date("d/m/Y"); ?></li><br>
                            <strong>Hora: </strong><li class="date" id="hora"><?php echo date("H:m"); ?></li><br>
                            <strong>Por: </strong><li class="cat" id="autorNome">
                                <?php
                                $qConteudo2 = "SELECT nomeCompleto FROM usuarios WHERE id=$resultConteudo[6]";
                                $queryConteudo2 = $conexao->query($qConteudo2);
                                $resultConteudo2 = $queryConteudo2->fetch_array(MYSQL_NUM);
                                echo $resultConteudo2[0];
                                ?>
                            </li><br>
                            <input type="hidden" id="autor" value="<?php echo $resultConteudo[6]; ?>">
                        </ul>
                        <br>

                        <strong>Capa da notícia:</strong>
                        <select id="capa" class="full-width" onchange="AtualizaCapa()">
                            <option value="0">Manter</option>
                            <option value="1">Retirar</option>
                            <option value="2">Alterar</option>
                        </select>
                        <div id="divCapa" class="form-field" style="display: none">
                            Insira imagem de capa (*): <input id="imgCapa" type="file" name="imgCapa" onchange="Capa()">
                            <input type="hidden" id="capaB64" value="<?php echo $resultConteudo[8]; ?>"/>
                        </div>
                        <br>

                        <strong><a href="https://www.google.com/search?ei=MZpGW9bVMKTO5gKrrKHQCQ&q=O+que+%C3%A9+lead+jornalismo%3F&oq=O+que+%C3%A9+lead+jornalismo%3F&gs_l=psy-ab.3..0i22i30k1l2.2061.3825.0.4394.3.3.0.0.0.0.294.856.2-3.3.0....0...1c.1.64.psy-ab..0.3.856...0j0i7i30k1j0i8i30k1.0.aOJS-c_XCvk" target="_blank">Lead</a> da notícia (*):</strong>
                        <div class="form-field">
                            <input name="lead" type="text" id="lead" class="full-width" placeholder="Insira o lead da notícia aqui..." value="<?php echo $resultConteudo[3]; ?>" required="">
                        </div>
                        <br>

                        <strong>Texto da notícia (*):</strong>
                        <div id="editor" style="margin: auto;text-align: left;">
                            <div id='edit' name="edit">
                                <?php echo $resultConteudo[7]; ?>
                            </div>
                        </div>
                        <br>

                        <button id="cadNoticia" type="submit" onclick="Atualizar()">Atualizar/Editar</button>
                        <button type="submit" onclick="Cancelar()">Cancelar</button>
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
            </div> <!-- end row -->

        </section> <!-- s-content -->

    </body>

</html> 