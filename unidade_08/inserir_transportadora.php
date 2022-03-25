<?php
    $conectar = mysqli_connect("localhost", "root", "", "andes");
    if(mysqli_connect_errno()) {
        die("Conexão falhou: " . mysqli_connect_errno());
    }

    if(isset($_POST) && !empty($_POST)) {
        $nome = $_POST["nome"];
        $endereco = $_POST["endereco"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estados"];

        $inserir =  "INSERT INTO
                        transportadoras (nometransportadora, endereco, cidade, estadoID)
                    VALUES
                        ('$nome', '$endereco', '$cidade', $estado)";
        $con_inserir =  mysqli_query($conectar, $inserir);
        $retorno = array();
        if($con_inserir) {
            $retorno["Sucesso"] = true;
            $retorno["mensagem"] = "Transportadora inserida com sucesso.";
        } else {
            $retorno["Sucesso"] = false;
            $retorno["mensagem"] = "Falha no sistema, tente mais tarde.";
        }

        echo json_encode($retorno);
    }

    /*$conectar = mysqli_connect("localhost", "root", "", "andes");
    if(mysqli_connect_errno()) {
        die("Conexão falhou: " . mysqli_connect_errno());
    }

    if(isset($_GET["nometransportadora"])) {
        $nome = utf8_decode($_GET["nometransportadora"]);
        $endereco = $_GET["endereco"];
        $cidade = $_GET["cidade"];
        $estado = $_GET["estados"];

        $inserir = "INSERT INTO transportadoras ";
        $inserir .= "(nometransportadora, endereco, cidade, estadoID) ";
        $inserir .= "VALUES ";
        $inserir .= "('$nome', '$endereco', '$cidade', $estado)";

        $con_inserir = mysqli_query($conectar, $inserir);
        if($con_inserir) {
            echo "ok";
        } else {
            echo "falha";
        }
    }*/
?>