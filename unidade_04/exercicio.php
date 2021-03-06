<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP com AJAX</title>
    <link rel="stylesheet" href="_css/style.css">
</head>
<body>
    <button id="botao">Carregar</button>
    <div id="listagem"></div>

    <script src="jquery.js"></script>
    <script>
        $('button#botao').click(function() {
            $('div#listagem').css('display', 'block');
            carregarDados();
        });

        function carregarDados() {
            $.ajax({
                url:'_xml/produtos.xml'
            }).then(sucesso,falha);

            function sucesso(arquivo) {
                var elemento;
                elemento = "<ul>";
                $(arquivo).find('produto').each(function () {
                    var nome = $(this).find('nomeproduto').text();
                    var preco = $(this).find('precounitario').text();
                    elemento += "<li class='nome'>" + nome + "</li>";
                    elemento += "<li class='preco'>" + "R$" + preco + "</li>"
                });

                elemento += "</ul>";
                $('div#listagem').html(elemento);

            }

            function falha() {
                $('div#listagem').html("Falha ao carregar dados");
            }
        }
    </script>
</body>
</html>