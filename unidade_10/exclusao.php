<?php
    $conectar = mysqli_connect("localhost", "root", "", "andes");
    if(mysqli_connect_errno()) {
        die("Falha na conexão: " . mysqli_connect_errno());
    }
?>
<?php
    if(isset($_POST["transportadoraID"])) {
        $id = $_POST["transportadoraID"];

        $del = "DELETE FROM
                    transportadoras
                WHERE
                    transportadoraID = {$id}";
        $con_del = mysqli_query($conectar, $del);
        
        $retorno =   array();

        if($con_del) {
            $retorno["sucesso"] = true;
        } else {
            $retorno["sucesso"] = false;
        }

        echo json_encode($retorno);
    }
?>