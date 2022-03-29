<?php
    $conectar  = mysqli_connect("localhost", "root", "", "andes");
    if(mysqli_connect_errno()){
        die("Conexão falhou: " . mysqli_connect_errno());
    }
?>
<?php
    $estados = "SELECT *
                FROM
                    estados";
    $con_estados = mysqli_query($conectar, $estados);
    if(!$con_estados) {
        die("Falha ao conectar com o banco de dados.");
    }
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
            <form  id="form">
                <label for="nome">Nome da Transportadora</label>
                <input type="text" name="nome" id="nome">

                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco">

                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" id="cidade">

                <label for="estados">Estado</label>
                <select name="estados">
                    <option selected hidden disabled value="">-- Selecione seu Estado -- </option>
                    <?php
                        while($linha = mysqli_fetch_assoc($con_estados)) {
                    ?>
                        <option value="<?php echo $linha["estadoID"] ?>">
                            <?php echo $linha["nome"] ?>
                        </option>
                    <?php
                        }
                    ?>
                </select>

                <input type="submit" value="Confirmar Inclusão">
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
                url: 'inserir.php',
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
            });
        })
    </script>
</body>
</html>