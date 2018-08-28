<?php
require_once '../controller/verificarSessao.php';
if ($logado != "sim") {
    header('Location: ./index.php');
}
require_once '../model/conectar.php';
$nomeRede = $_POST['nRede'];
$qLink = "SELECT * FROM links WHERE rede='$nomeRede'";
$queryLink = $conexao->query($qLink);
$resultLink = $queryLink->fetch_array(MYSQL_NUM);
?>
<!DOCTYPE html>
<html class="no-js">
    <body>

        <section class="s-content s-content--narrow">

            <div class="col-full s-content__main">

                <section class="s-content s-content--narrow s-content--no-padding-bottom">

                    <article class="row format-standard">
                        <strong>Nome da rede social (*):</strong>
                        <input id="idRede" type="hidden" value="<?php echo $resultLink[0]; ?>"/>
                        <div class="form-field">
                            <input oninput="Rede()" name="rede" type="text" id="rede" class="full-width" placeholder="Insira o nome da rede social aqui..." value="<?php echo $resultLink[1]; ?>" required="" maxlength="255">
                            <span id="msg" class="alert-box--error"></span><br>
                        </div>
                        <br>
                        <div class="form-field">
                            <input name="link" type="text" id="link" class="full-width" placeholder="Insira o link da rede social aqui..." value="<?php echo $resultLink[2]; ?>" required="" maxlength="255">
                        </div>
                        <br>

                        <button id="cadNoticia" type="submit" onclick="AtualizarRede()">Atualizar/Editar</button>
                        <button type="submit" onclick="Cancelar()">Cancelar</button>
                    </article>

                </section>
                <div id="testMaroto"></div>
            </div> <!-- end row -->

        </section> <!-- s-content -->

    </body>

</html> 