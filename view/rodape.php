<?php
require_once '../controller/verificarSessao.php';
require_once '../model/conectar.php';
?>

<footer class="s-footer">

    <div class="s-footer__main">
        <div class="row">

            <div class="col-four md-four mob-full s-footer__sitelinks">

                <h4>Menu Rápido</h4>

                <ul class="s-footer__linklist">
                    <li><a href="../view/index.php">Página incial</a></li>
                    <li><a href="../view/sobre.php">Sobre</a></li>
                    <li><a href="../view/contato.php">Contato</a></li>
                    <?php
                    if (!isset($logado)) {
                        echo "<li><a href='../view/login' title=''>Acesso Administrativo</a></li>";
                    }if ($logado == "sim") {
                        echo "  <li><a href='../view/perfil'>Perfil</a></li>
                                    <li><a href='../view/altSobre'>Alterar \"Sobre\"</a></li>
                                    <li><a href='../view/altContato'>Alterar \"Contato\"</a></li>
                                    <li><a href='../view/escrever'>Escrever Notícias</a></li>
                                    <li><a href='../view/atualizarExcluir'>Editar Notícias</a></li>
                                    <li><a href='../view/novaRede'>Inserir novas</a></li>
                                    <li><a href='../view/atualizarRede'>Atualizar atuais</a></li>
                                    <li><a href='../controller/execLogout'>Sair</a></li>
                            </ul>";
                    }
                    ?>
                </ul>
            </div>
            <?php
            $qRede = "SELECT rede, link FROM links";
            mysqli_query($conexao, $qRede);
            $queryRede = $conexao->query($qRede);
            $numRede = $queryRede->num_rows;
            if ($numRede > 0) {
                echo"<div class='col-four md-four mob-full s-footer__social'>
                            <h4>Redes Sociais</h4>
                            <ul class='s-footer__linklist'>";
                while ($resultRede = mysqli_fetch_array($queryRede)) {
                    echo"<li><a href='" . $resultRede[1] . "' target='_blank'>" . $resultRede[0] . "</a></li>";
                }
                echo"</ul>
                            </div>";
            }
            ?>


        </div>
    </div> <!-- end s-footer__main -->

    <div class="s-footer__bottom">
        <div class="row">
            <div class="col-full">
                <div class="s-footer__copyright">
                    <span>© Copyright Diario Parobé 2018</span>
                </div>

                <div class="go-top">
                    <a class="smoothscroll" title="Back to Top" href="#top"></a>
                </div>
            </div>
        </div>
    </div> <!-- end s-footer__bottom -->

</footer> <!-- end s-footer -->