<?php
    $conecta = mysqli_connect("localhost","root","","andes");
    if ( mysqli_connect_errno()  ) {
        die("Conexao falhou: " . mysqli_connect_errno());
    }

    $tr = "SELECT * FROM transportadoras ";
    $consulta_tr = mysqli_query($conecta, $tr);
    if(!$consulta_tr) {
        die("erro no banco");
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP INTEGRACAO</title>
        <link href="_css/estilo.css" rel="stylesheet">
    </head>

    <body>        
        <main>  
            <div id="janela_transportadoras">
                <?php
                    while($linha = mysqli_fetch_assoc($consulta_tr)) {
                ?>
                <ul>
                    <li><?php echo utf8_encode($linha["nometransportadora"]) ?></li>
                    <li><?php echo utf8_encode($linha["cidade"]) ?></li>
                    <li><a href="" class="excluir" title="<?php echo $linha["transportadoraID"] ?>">Excluir</a></li>
                </ul>
                <?php
                    }
                ?>
            </div>
        </main>

        
        <script src="jquery.js"></script>
        <script>
            $('#janela_transportadoras ul li a.excluir').click(function(e) {
                e.preventDefault();
                
                var id = $(this).attr("title");
                var elemento = $(this).parent().parent();
                
                $.ajax({
                    url: 'exclusao.php',
                    type: 'POST',
                    data: 'transportadoraID=' + id,
                    success: function(data) {
                        $sucesso = $.parseJSON(data)["sucesso"];
                        $mensagem = $.parseJSON(data)["mensagem"];

                        if($sucesso) {
                            $(elemento).fadeOut();
                            console.log("deu certo");
                        } else {
                            console.log("Erro na exclusão");
                        }
                    }
                })
            });
        </script>
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>