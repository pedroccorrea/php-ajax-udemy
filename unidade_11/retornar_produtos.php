<?php
    $conectar = mysqli_connect("localhost", "root", "", "andes");
    if(mysqli_connect_errno()) {
        die("Falha na conexão: " . mysqli_connect_errno());
    }
    if(isset($_GET["categoriaID"])) {
        $id = $_GET["categoriaID"];
    } else {
        $id = 2;
    }

    $produtos = "SELECT
                    produtoID, nomeproduto
                FROM
                    produtos
                WHERE
                    categoriaID = {$id}";
    $con_produtos = mysqli_query($conectar, $produtos);
    if(!$con_produtos) {
        die("Falha ao conectar com o banco de dados");
    }

    $retorno = array();

    while ($linha = mysqli_fetch_object($con_produtos)) {
        $retorno[] = $linha;
    }

    echo json_encode($retorno);

    mysqli_close($conectar);
?>