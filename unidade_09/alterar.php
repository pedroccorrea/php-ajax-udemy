<?php
    $conectar = mysqli_connect("localhost", "root", "", "andes");
    if(mysqli_connect_errno()) {
        die("Falha na conexão: " . mysqli_connect_errno());
    }
?>
<?php
    if(isset($_POST) && !empty($_POST)) {
        $nome = $_POST["nome"];
        $endereco =$_POST["endereco"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estados"];
        $id = $_POST["id"];

        $alt = "UPDATE
                    transportadoras
                SET
                    nometransportadora = '{$nome}', endereco = '{$endereco}', cidade = '{$cidade}', estadoID = {$estado}
                WHERE
                    transportadoraID = {$id}";
        $con_alt = mysqli_query($conectar, $alt);
        $retorno = array();
        if($con_alt) {
            $retorno["sucesso"] = true;
            $retorno["mensagem"] = "Alteração realizada com sucesso!";
        } else {
            $retorno["sucesso"] = false;
            $retorno["mensagem"] = "Falha no sistema, tente novamente mais tarde.";
        }

        echo json_encode($retorno);
    }
?>