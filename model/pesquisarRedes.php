<?php

$q = "SELECT rede, link FROM links";
mysqli_query($conexao, $q);
$query = $conexao->query($q);
$num = $query->num_rows;
if ($num > 0) {
    while ($result = mysqli_fetch_array($query)) {
        echo"<li><a href='" . $result[1] . "' target='_blank'>" . $result[0] . "</a></li>";
    }
}
?>