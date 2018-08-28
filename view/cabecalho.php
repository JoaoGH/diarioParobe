<?php
require_once '../controller/verificarSessao.php';
?>

<section class="s-pageheader s-pageheader--home">
    <header class="header">
        <div class="header__content row">
            <div class="header__content row">
                <span class="col-ten"> </span>
                <form method="GET" action="../view/pesquisa.php">
                    <input id="k" name="k" type="search" class="search-field" placeholder="Pesquise" >
                </form>
            </div>
            <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>
            <nav class="header__nav-wrap">
                <h2 class="header__nav-heading h6">Navegação</h2>
                <ul class="header__nav">
                    <li><a href="../view/index" title="">Pagina inicial</a></li>
                    <li><a href="../view/sobre" title="">Sobre</a></li>
                    <li><a href="../view/contato" title="">Contato</a></li>
                    <?php
                    if (!isset($logado))
                        echo"<li><a href='../view/login' title=''>Acesso Administrativo</a></li>";
                    if ($logado == 'sim') {
                        echo"<li class='has-children'>
                            <a href='#0' title=''>Funções administrativas</a>
                            <ul class='sub-menu'>
                            <li><a href='../view/perfil'>Perfil</a></li>
                            <hr></hr>
                            <li><a href='../view/escrever'>Escrever Notícias</a></li>
                            <li><a href='../view/atualizarExcluir'>Editar Notícias</a></li>
                            <hr></hr>
                            <li><a href='../controller/execLogout'>Sair</a></li>
                            </ul>
                        </li>";
                    }
                    ?>
                </ul> <!-- end header__nav -->
                <a href ="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>
            </nav> <!-- end header__nav-wrap -->
        </div> <!-- header-content -->
    </header> <!-- header -->
    <div class="pageheader-content row">
        <div class="col-full" style="margin-top: -20%">
            <div class="featured">
                <div class="header__content row">
                    <div class="logo">
                        <img class="fixed-top" src="../images/DP.jpg"/>
                    </div>
                </div>
            </div> <!-- end featured -->
        </div> <!-- end col-full -->
    </div> <!-- end pageheader-content row -->
</section> <!-- end s-pageheader -->