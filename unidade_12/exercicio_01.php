<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP com AJAX</title>
</head>
<body>
    
    <script src="_js/jquery.js"></script>
    <script>
        var cep = "87020170"
        $.ajax({
            url: 'https://viacep.com.br/ws/' + cep + '/json',
            type: 'GET'
        }).done(function(data) {
            console.log(data)
        }).fail(function() {
            console.log("Erro")
        })
    </script>
</body>
</html>