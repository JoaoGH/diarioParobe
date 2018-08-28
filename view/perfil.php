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

        <section class="s-content s-content--narrow">

            <div class="row">

                <div class="s-content__header col-full">
                    <h1 class="s-content__header-title">
                        Olá 
                        <?php
                        echo $_SESSION['nomeCompleto'];
                        ?>
                    </h1>
                </div> <!-- end s-content__header -->



                <div class="col-full s-content__main">
                    <div class="row">
                        <div class="col-six tab-full">
                            <h3>Seus dados</h3>
                            <?php
                            require_once '../model/infoUser.php';
                            ?>
                            <button onclick="AlterarDados('altDados')" type="submit" class="btn">Alterar dados <i class="fa fa-2x fa-cog"></i></button>
                            <button onclick="AlterarDados('altSenha')" class="btn">Alterar senha <i class="fa fa-2x fa-key"></i></button>
                        </div>
                        <div id="altDados" class="col-six tab-full" style="display:none">
                            <h3>Alterar Dados</h3>
                            <fieldset>
                                <div hidden="" class="form-field">
                                    <input name="NomeUser" type="text" id="NomeUser" value="<?php echo $result[1]; ?>">
                                </div>
                                <div class="form-field">
                                    <input name="NovoNomeCompleto" type="text" id="NovoNomeCompleto" class="full-width" placeholder="Novo nome completo" required="" value="<?php echo $result[4]; ?>">
                                </div>
                                <div class="form-field">
                                    <input name="NovoEmail" type="text" id="NovoEmail" class="full-width" placeholder="Novo e-mail" value="<?php echo $result[3]; ?>" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="exemplo@email.com">
                                </div>
                                <div class="form-field">
                                    <span id="msg" class="alert-box--info"></span>
                                </div><br>
                                <button onclick="AttDados()" type="submit" class="submit btn btn--primary">Enviar</button>
                                <button onclick="Cancelar()" type="submit" class="submit btn btn--stroke">Cancelar</button>
                            </fieldset>
                        </div>
                        <div id="altSenha" class="col-six tab-full" style="display:none">
                            <h3>Alterar Senha</h3>
                            <!--<form method="POST" action="../model/alterarSenha.php">-->
                            <fieldset>
                                <div hidden="" class="form-field">
                                    <input name="NomeUser2" type="text" id="NomeUser2" value="<?php echo $result[1]; ?>">
                                </div>
                                <div class="form-field">
                                    <input oninput="Senhas()" name="senha" type="password" id="senha" class="full-width" placeholder="Nova senha"  value="" required="" minlength="8">
                                </div>
                                <div class="form-field">
                                    <input oninput="Senhas()" name="senha2" type="password" id="senha2" class="full-width" placeholder="Confirme a senha"  value="" required="">
                                </div>
                                <div class="form-field">
                                    <input name="senhaAntiga" type="password" id="senhaAntiga" class="full-width" placeholder="Senha Antiga"  value="" required="">
                                </div>
                                <div class="form-field">
                                    <span id="msg2" class="alert-box--notice"></span><br>
                                    <span id="msg1" class="alert-box--info"></span>
                                </div><br>
                                <button onclick="AttSenha()" type="submit" class="submit btn btn--primary">Enviar</button>
                                <button onclick="Cancelar()" type="submit" class="submit btn btn--stroke">Cancelar</button>
                            </fieldset>
                            <!--</form>-->
                        </div> <!-- end row -->
                    </div> <!-- end row -->
                    <div class="row">
                        <div class="col-six tab-full">
                            <h3>Manutenção de páginas</h3>
                            <a href="./altSobre"><button type="submit" class="btn">Alterar "Sobre" <i class="fa fa-2x fa-question"></i></button></a>
                            <a href="./altContato"><button type="submit" class="btn">Alterar "Contato" <i class="fa fa-2x fa-envelope"></i></button></a>
                        </div>
                        <div class="col-six tab-full">
                            <h3>Manutenção de notícias</h3>
                            <a href="./escrever"><button type="submit" class="btn">Escrever <i class="fa fa-2x fa-newspaper-o"></i></button></a>
                            <a href="./atualizarExcluir.php"><button type="submit" class="btn">Atualização/Exclusão <i class="fa fa-2x fa-wrench"></i></button></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-six tab-full">
                            <h3>Manutenção de redes socias</h3>
                            <a href="./novaRede.php"><button type="submit" class="btn">Inserir novas <i class="fa fa-2x fa-link"></i></button></a>
                            <a href="./atualizarRede.php"><button type="submit" class="btn">Atualizar atuais <i class="fa fa-2x fa-link"></i></button></a>
                        </div>
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