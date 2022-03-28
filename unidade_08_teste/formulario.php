<?php
    $conectar = mysqli_connect("localhost", "root", "", "andes");
    if(mysqli_connect_errno()) {
        die("Conexão falhou: " . mysqli_connect_errno());
    }

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
                <form id="formulario">
                    <label for="nome">Nome da transportadora</label>
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
                </form>
            </div>

            <div id="mensagem">
                <p></p>
            </div>
        </main>
        <script src="jquery.js"></script>
        <script>
            $('#formulario').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'inserir.php',
                    type: 'POST',
                    data: $('#formulario').serialize(),
                    success: function(data) {
                        
                    }
                })
            })
        </script>
    </body>
</html>