<?php

require_once '../model/conectar.php';
$QTDMOSTRAR = 15;
$repetir = 0;
$botaoMostrar = "<br><button type='submit' onclick='MostrarMais()'>Mostrar Mais</button>";
if (isset($_POST['k2'])) {
    $itemPesquisa = $_POST['k2'];
    $q = "SELECT * FROM noticia WHERE titulo LIKE '%$itemPesquisa%' or "
            . "caminho LIKE '%$itemPesquisa%' or "
            . "lead LIKE '%$itemPesquisa%' or "
            . "data LIKE '%$itemPesquisa%' or "
            . "txtNoticia LIKE '%$itemPesquisa%' "
            . "ORDER BY data DESC";
    mysqli_query($conexao, $q);
    $query = $conexao->query($q);
    $num = $query->num_rows;

    if ($num > 0) {
        echo "<table>
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Lead</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Autor</th>
                    <th>Editado</th>
                    <th>Funções</th>
                </tr>
            </thead>";
        while ($qtd = mysqli_fetch_array($query) and $repetir < $QTDMOSTRAR) {

            $qAutor = "SELECT nomeCompleto FROM usuarios WHERE id=$qtd[6]";
            $queryAutor = $conexao->query($qAutor);
            $resultAutor = $queryAutor->fetch_array(MYSQL_NUM);
            $qtd[6] = $resultAutor[0];
            if (isset($qtd[9])) {
                $editado = "Sim";
            } else {
                $editado = "Não";
            }
            echo"<tbody>
                <tr>
                    <td><a href='../noticias/$qtd[2]'>$qtd[1]</a></td>
                    <td>$qtd[3]</td>
                    <td>$qtd[4]</td>
                    <td>$qtd[5]</td>
                    <td>$qtd[6]</td>
                    <td>$editado</td>
                    <td><a onclick='Editar($qtd[0])'><i class='fa fa-pencil'></i></a>\t<a onclick='Excluir($qtd[0])'><i class='fa fa-trash'></i></a></td>
                </tr>
            </tbody>";
            $repetir++;
        }
        echo"</table>";
    } else {
        $q2 = "SELECT id FROM usuarios WHERE nomeCompleto Like '%$itemPesquisa%'";
        mysqli_query($conexao, $q2);
        $query2 = $conexao->query($q2);
        $qtd2 = mysqli_fetch_array($query2);
        $num2 = $query2->num_rows;

        if ($num2 > 0) {
            echo "<table>
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Lead</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Autor</th>
                    <th>Editado</th>
                    <th>Funções</th>
                </tr>
            </thead>";
            while ($qtd = mysqli_fetch_array($query) and $repetir < $QTDMOSTRAR) {

                $qAutor = "SELECT nomeCompleto FROM usuarios WHERE id=$qtd[6]";
                $queryAutor = $conexao->query($qAutor);
                $resultAutor = $queryAutor->fetch_array(MYSQL_NUM);
                $qtd[6] = $resultAutor[0];
                if (isset($qtd[9])) {
                    $editado = "Sim";
                } else {
                    $editado = "Não";
                }
                echo"<tbody>
                <tr>
                    <td><a href='../noticias/$qtd[2]'>$qtd[1]</a></td>
                    <td>$qtd[3]</td>
                    <td>$qtd[4]</td>
                    <td>$qtd[5]</td>
                    <td>$qtd[6]</td>
                    <td>$editado</td>
                    <td><a onclick='Editar($qtd[0])'><i class='fa fa-pencil'></i></a>\t<a onclick='Excluir($qtd[0])'><i class='fa fa-trash'></i></a></td>
                </tr>
            </tbody>";
                $repetir++;
            }
            echo"</table>";
        } else {
            echo"<p class='lead'>Nada encontrado para '$itemPesquisa'</p>";
        }
    }
} else {
    $q = "SELECT * FROM noticia ORDER BY data DESC";
    mysqli_query($conexao, $q);
    $query = $conexao->query($q);
    $num = $query->num_rows;
    if ($num > 0) {
        echo "<h3>Notícias</h3>
                                        <p>Clique no Lápis para editar ou no lixo para apagar</p>
                                        <input oninput='Pesquisar()' id='k2' type='search' class='search-field' placeholder='Pesquise' >
                                          <div class='table-responsive' id='tabela'>                                          
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Titulo</th>
                                                        <th>Lead</th>
                                                        <th>Data</th>
                                                        <th>Hora</th>
                                                        <th>Autor</th>
                                                        <th>Editado</th>
                                                        <th>Funções</th>
                                                    </tr>
                                                    </thead>";
        while ($qtd = mysqli_fetch_array($query) and $repetir < $QTDMOSTRAR) {

            $qAutor = "SELECT nomeCompleto FROM usuarios WHERE id=$qtd[6]";
            $queryAutor = $conexao->query($qAutor);
            $resultAutor = $queryAutor->fetch_array(MYSQL_NUM);
            $qtd[6] = $resultAutor[0];
            if (isset($qtd[9])) {
                $editado = "Sim";
            } else {
                $editado = "Não";
            }
            echo"<tbody>
                                                <tr>
                                                    <td><a href='../noticias/$qtd[2]'>$qtd[1]</a></td>
                                                    <td>$qtd[3]</td>
                                                    <td>$qtd[4]</td>
                                                    <td>$qtd[5]</td>
                                                    <td>$qtd[6]</td>
                                                    <td>$editado</td>
                                                    <td><a onclick='Editar($qtd[0])'><i class='fa fa-pencil'></i></a>\t<a onclick='Excluir($qtd[0])'><i class='fa fa-trash'></i></a></td>
                                                </tr>
                                            </tbody>";
            $repetir++;
        }
        echo"</div></div></table></div>";
    } else {
        echo"<p class='lead'>Sem notícias cadastradas</p>";
    }
}