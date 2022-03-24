<?php
    $conectar = mysqli_connect("localhost", "root", "", "andes");
    if(mysqli_connect_errno()) {
        die("Conexão falhou: " . mysqli_connect_errno());
    }
?>

<?php
    if(isset($_POST["nometransportadora"])) {
        $nometransportadora = $_POST["nometransportadora"];
        $endereco = $_POST["endereco"];
        $cidade = $_POST["cidade"];
        $estadoID = $_POST["estados"];

        $tr = "INSERT INTO
                    transportadoras (nometransportadora, endereco, cidade, estadoID)
                VALUES
                    ('$nometransportadora', '$endereco', '$cidade', $estadoID)";
        $con_tr = mysqli_query($conectar, $tr);
        if($con_tr) {
            echo "ok";
        } else {
            echo "falha";
        }
        header("location: formulario2.php");
    }
?>

<?php
    mysqli_close($conectar);
?>