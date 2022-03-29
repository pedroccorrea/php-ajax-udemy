<?php
    $conectar = mysqli_connect("localhost", "root", "", "andes");
    if(mysqli_connect_errno()) {
        die("Falha na conexão: " . mysqli_connect_errno());
    }

    if(isset($_POST) && !empty($_POST)) {
        $nome = $_POST["nome"];
        $endereco = $_POST["endereco"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estados"];

        $inserir = "INSERT INTO
                        transportadoras (nometransportadora, endereco, cidade, estadoID)
                    VALUES
                        ('$nome', '$endereco', '$cidade', $estado)";
        $con_inserir = mysqli_query($conectar, $con_inserir);
        if($con_inserir) {
            $sucesso = true;
            $mensagem = "Transportadora inserida com sucesso!";
        } else {
            $sucesso = false;
            $mensagem = "Falha na conexão, tente novamente mais tarde.";
        }
    }
?>