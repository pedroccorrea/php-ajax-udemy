<?php
    $conectar = mysqli_connect("localhost", "root", "", "andes");
    if(mysqli_connect_errno()) {
        die("Falha na conexã: " . mysqli_connect_errno());
    }
?>

<?php
    if(isset($_POST) && !empty($_POST)) {
        $nome = $_POST["nome"];
        $endereco = $_POST["endereco"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estados"];

        $inserir = "INSERT INTO
                        transportadoras (nometransportadora, endereco, cidade, estadoID)
                    VALUES
                        ('$nome', '$endereco', '$cidade', $estado)";
        $con_inserir = mysqli_query($conectar, $inserir);
        $retorno = array();
        if($con_inserir) {
            $retorno["sucesso"] = true;
            $retorno["mensagem"] = "Transportadora inserida com sucesso!";
        } else {
            $retorno["sucesso"] = false;
            $retorno["mensagem"] = "Falha no sistema, tente mais tarde.";
        }

        echo json_encode($retorno);
    }
?>