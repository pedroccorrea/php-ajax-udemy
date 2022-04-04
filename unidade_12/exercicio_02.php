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
            <form action="">
                <label for="nome">Nome da Transportadora</label>
                <input type="text" id="nome" name="nome">

                <label for="cep">CEP (ex: 58000-100)</label>
                <input type="text" name="cep" id="cep">

                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco">

                <label for="numero">Número</label>
                <input type="text" name="numero" id="numnero">

                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" id="cidade">

                <label for="estado">Estado</label>
                <input type="text" name="estado" id="estado">
                
                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" id="bairro">

                <input type="submit" value="Confirmar alteração">

                <div id="mensagem">
                    <p></p>
                </div>
            </form>
        </div>
    </main>

    <script src="_js/jquery.js"></script>
    <script>
        $('#cep').blur(function(e) {
            var cep = $('#cep').val()
            var url= "http://viacep.com.br/ws/" + cep + "/json/"
            var validacep = /^[0-9]{5}-?[0-9]{3}$/;

            if(validacep.test(cep)) {
                pesquisarCEP(url)
                $('#mensagem').hide()
            } else {
                $('#mensagem').show()
                $('#mensagem p').html("CEP inválido")
            }
        })

        function pesquisarCEP(endereco) {
            $.ajax({
                url: endereco,
                type: 'GET'
            }).done(function(data){
                $('#bairro').val(data.bairro)
                $('#estado').val(data.uf)
                $('#cidade').val(data.localidade)
                $('#endereco').val(data.logradouro)

            }).fail(function() {
                console.log("Erro")
            })
        }
    </script>
</body>
</html>