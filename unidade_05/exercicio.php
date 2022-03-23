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
    <div id="listagem"></div>

    <script src="jquery.js"></script>
    <script>
        $('button#botao').click(function() {
            carregarDados();
            $('div#listagem').css('display', 'block');
        })
        function carregarDados(){

            $.getJSON('_json/produtos.json', function(data) {
                var elemento;
                elemento = "<ul>";
                $.each(data, function(i, valor) {
                    elemento += "<li class='nome'>" + valor.nomeproduto + "</li>";
                    elemento += "<li class='preco'>" + valor.precounitario + "</li>";
                })
                elemento += "</ul";
                $('div#listagem').html(elemento);
            });
        }
    </script>
</body>
</html>