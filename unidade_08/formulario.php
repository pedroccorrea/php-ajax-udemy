<?php
    $conectar = mysqli_connect("localhost", "root", "", "andes");

    $estados = "SELECT *
                FROM
                    estados";
    $con_estados = mysqli_query($conectar, $estados);
    if(!$con_estados) {
        die("Erro ao conectar com o banco de daods.");
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
                <form id="formulario_transportadora">

                    <label for="nometransportadora">Nome da transportadora</label>
                    <input type="text" id="nometransportadora" name="nome">
                    <label for="endereco">Endereço</label>
                    <input type="text" id="endereco" name="endereco">
                    <label for="ciade">Cidade</label>
                    <input type="text" id="cidade" name="cidade">
                    <select name="estados">
                        <option selected hidden disabled value="">-- Selecione seu Estado -- </option>
                        <?php
                            while($linha = mysqli_fetch_assoc($con_estados)) {
                        ?>
                            <option value="<?php  echo $linha["estadoID"] ?>">
                                <?php echo $linha["nome"] ?>
                            </option>
                        <?php
                            }
                        ?>
                    </select>
                    <input type="submit" value="Confirmar Inclusão">
                </form>
            </div>
        </main>
        
        <script src="jquery.js"></script>
        <script>
            $('#formulario_transportadora').submit(function(e) {
                e.preventDefault();
                var formulario = $(this);
                var retorno = inserirFormulario(formulario);
            });

            function inserirFormulario(dados) {
                $.ajax({
                    type:"POST",
                    data:dados.serialize(),
                    url:"inserir_transportadora.php",
                    async:false
                }).then(sucesso, falha);
                
                function sucesso(data) {
                    console.log(data);
                }

                function falha() {
                    console.log("erro");
                }
            }
        </script>
    </body>
</html>

<?php
    mysqli_close($conectar);
?>