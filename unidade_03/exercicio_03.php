<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP com AJAX</title>
</head>
<body>
    <div id="nome"></div>
    <div id="mensagem"></div>

    <script src="jquery.js"></script>
    <script>
        $.ajax({
            url:'nome.php'
        }).done(function(valor) {
            $('div#nome').html(valor);
        }).fail(function() {
            $('div#nome').html('Falha no carregamento');
        }).always(function() {
            $('div#mensagem').html('Mensagem de qualquer coisa');
        })
    </script>
</body>
</html>