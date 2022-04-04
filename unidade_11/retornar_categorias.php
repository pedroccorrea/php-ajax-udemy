<?php
    $callback = isset($_GET['callback']) ? $_GET['callback'] : false;
    $conectar = mysqli_connect("localhost", "root", "", "andes");
    if(mysqli_connect_errno()) {
        die("Falha na conexção: " . mysqli_connect_errno());
    }

    $selecao = "SELECT
                    categoriaID, nomecategoria
                FROM
                    categorias";
    $categorias = mysqli_query($conectar, $selecao);
    if(!$categorias) {
        die("Falha ao consultar o banco de dados.");
    }

    $retorno = array();
    while($linha = mysqli_fetch_object($categorias)) {
        $retorno[] = $linha;
    }

    echo ($callback ? $callback  . '(' : '') . json_encode($retorno) . ($callback? ')' : '');

    mysqli_close($conectar);
?>