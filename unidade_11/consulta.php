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
    <main>
        <div id="janela_formulario">
            <form id="pesquisarProdutos">
                <label for="categorias">Categorias</label>
                <select name="categorias" id="categorias">

                </select>

                <label for="produtos">Produtos</label>
                <select name="produtos" id="produtos">
                    
                </select>
            </form>
        </div>
    </main>
    <script src="_js/jquery.js"></script>
    <script>
        function retornarCategorias(data) {
            var categoria = ""
            $.each(data, function(chave, valor) {
                categoria += '<option value="' + valor.categoriaID + '">' + valor.nomecategoria + '</option>'
            })
            $('#categorias').html(categoria)
        }

        $('#categorias').change(function(e) {
            categoriaID = $(this).val()
            $.ajax({
                url: 'retornar_produtos.php',
                type: 'GET',
                data: 'categoriaID=' + categoriaID,
                success: function(data) {
                    var produtos = ""
                    $.each($.parseJSON(data), function(chave, valor) {
                        produtos += '<option value="' + valor.produtoID + '">' + valor.nomeproduto + '</option>'
                    })
                    $('#produtos').html(produtos)
                }
            })
        })
    </script>
    <script src="http://localhost/php-ajax-udemy/php-ajax-udemy/unidade_11_teste/retornar_categorias.php?callback=retornarCategorias"></script>
</body>
</html>