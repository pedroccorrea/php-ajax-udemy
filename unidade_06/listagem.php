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
    <button id="botao">Carregar</button>
    <button id="esconder">Esconder</button>

    <div id="listagem"></div>

    <script src="jquery.js"></script>
    <script>
        $('button#botao').click(function() {
            $('div#listagem').css('display', 'block');
            carregarDados();
        })
        $('button#esconder').click(function() {
            $('div#listagem').css('display', 'none');
        })

        function carregarDados() {
            $.getJSON('gerar_json.php', function(data){
                var elemento;
                elemento = "<ul>";

                $.each(data, function(i, valor){
                    elemento += "<li class='imagem'>" + "<img src='" + valor.imagempequena + "' alt='imagem ilustrativa'>" + "</li>";
                    elemento += "<li class='nome'>" + valor.nomeproduto + "</li>";
                    elemento += "<li class='preco'>" + "R$" + valor.precounitario + "</li>";
                });

                elemento += "</ul>";

                $('div#listagem').html(elemento);
            })
        }
    </script>
</body>
</html>