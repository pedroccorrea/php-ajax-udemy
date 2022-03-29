<?php
    $conectar = mysqli_connect("localhost", "root", "", "andes");
    if(mysqli_connect_errno()) {
        die("Falha na conexão: " . mysqli_connect_errno);
    }
?>
<?php
    $tr = "SELECT *
            FROM
                transportadoras ";
    if(isset($_GET["codigo"])){
        $id = $_GET["codigo"];
        $tr .= "WHERE transportadoraID = {$id} ";
    } else {
        $tr .= "WHERE transportadoraID = 1";
    }
    $con_tr = mysqli_query($conectar, $tr);
    if(!$con_tr) {
        die("Falha ao conectar com o banco de dados.");
    }
    $info_tr = mysqli_fetch_assoc($con_tr);


    $estados = "SELECT *
                FROM
                    estados";
    $con_estados = mysqli_query($conectar, $estados);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP com AJAX</title>
    <link rel="stylesheet" href="_css/estilo.css">
</head>
<body>
    <main>
        <div id="janela_formulario">
            <form id="form">
                <label for="nome">Nome da Transportadora</label>
                <input type="text" name="nome" id="nome" value="<?php echo $info_tr["nometransportadora"] ?>">

                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco" value="<?php echo $info_tr["endereco"] ?>">
                
                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" id="cidade" value="<?php echo $info_tr["cidade"] ?>">
                
                <label for="estados">Estados</label>
                <select name="estados">
                    <?php
                        while($linha = mysqli_fetch_assoc($con_estados)) {
                    ?>
                        <option value="<?php echo $linha["estadoID"] ?> <?php echo $linha["estadoID"] == $info_tr["estadoID"]? "selected" : "" ?>">
                            <?php echo $linha["nome"] ?>
                        </option>
                    <?php
                        }
                    ?>
                </select>
                <input type="hidden" name="id" id="id" value="<?php echo $info_tr["transportadoraID"] ?>">
                <input type="submit" value="Confirmar alteração">
            </form>
        </div>
        <div id="mensagem">
            <p></p>
        </div>
    </main>

    <script src="jquery.js"></script>
    <script>
        $('#form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: 'alterar.php',
                type: 'POST',
                data: $('#form').serialize(),
                success: function(data) {
                    $sucesso = $.parseJSON(data)["sucesso"];
                    $mensagem = $.parseJSON(data)["mensagem"];

                    $('#mensagem').show();

                    if($sucesso) {
                        $('#mensagem').html($mensagem);
                    } else {
                        $('#mensagem').html($mensagem);
                    }
                }
            })
        })
    </script>
</body>
</html>