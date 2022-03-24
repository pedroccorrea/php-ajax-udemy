<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP com AJAX</title>
    <script>
        function retornarProdutos(data) {
            console.log(data[0].nomeproduto);
        }
    </script>
</head>
<body>
    <script src="http://localhost/php-ajax-udemy/php-ajax-udemy/unidade_07/gerar_json.php?callback=retornarProdutos"></script>
</body>
</html>