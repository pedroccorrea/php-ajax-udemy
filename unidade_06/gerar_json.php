<?php
    // configurações gerais
    header('Access-Control-Allow-Origin:*');

    // abrir conexão
    $conectar = mysqli_connect("localhost", "root", "", "andes");

    $produtos = "SELECT
                    nomeproduto, precounitario, imagempequena
                FROM
                    produtos";
    $con_produtos = mysqli_query($conectar, $produtos);
    if(!$con_produtos) {
        die("Erro ao conectar com o banco de dados.");
    }

    $retorno = array();

    while($linha = mysqli_fetch_object($con_produtos)) {
        $retorno[] = $linha;
    }

    echo json_encode($retorno);
?>
<?php
    // fechar conexão
    mysqli_close($conectar);
?>