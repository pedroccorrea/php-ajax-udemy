<?php
    //preparar o arquivo para callback
    $callback = isset($_GET['callback']) ? $_GET['callback'] : false;

    // abrir conexão
    $conectar = mysqli_connect("localhost", "root", "", "andes");

    // realizar consulta ao banco de dados
    $produtos = "SELECT
                    nomeproduto, precounitario, imagempequena
                FROM
                    produtos";
    $con_produtos = mysqli_query($conectar, $produtos);
    if(!$con_produtos) {
        die("Erro ao conectar com o banco de dados.");
    }

    $retorno = array();

    // criar json
    while($linha = mysqli_fetch_object($con_produtos)) {
        $retorno[] = $linha;
    }
    echo ($callback? $callback . '(': '') . json_encode($retorno) . ($callback? ')' : '');
?>

<?php
    // fechar conexão
    mysqli_close($conectar);
?>