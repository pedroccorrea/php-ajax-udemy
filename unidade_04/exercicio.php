<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP com AJAX</title>
</head>
<body>
    <div id="listagem"></div>

    <script src="jquery.js"></script>
    <script>
        $.ajax({
            url:'_xml/produtos.xml'
        }).then(sucesso, falha);

        function sucesso(arquivo) {
            console.log(arquivo);
        }

        function falha() {
            console.log("Falhou");
        }
    </script>
</body>
</html>