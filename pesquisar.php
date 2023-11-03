<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completlar - Sua Casa, Seu Estilo.</title>
    <link rel="shortcut icon" href="assets/assets/Imagens/Home/icons/logo.ico" type="image/x-icon" />

    <!-- Google fonts Lato -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet" />

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

    <!-- CSS do projeto -->
    <link rel="stylesheet" href="assets/CSS/main_produtos.css" />

    <!-- JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Plugin de Ver Libras -->
    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <?php include 'includes/header.php'; ?>

    <div class="container mt-5">
        <?php
        // Conecte-se ao banco de dados
        include 'includes/conexao.php';
        $conn = new Conectar();

        // Número de resultados por página
        $resultadosPorPagina = 6;

        // Verifique se a página atual foi especificada na URL
        $paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

        // Verifique se a variável de pesquisa está definida e não está vazia
        if (isset($_POST['pesquisar']) && !empty($_POST['pesquisar'])) {
            // Recupere a palavra-chave da barra de pesquisa
            $pesquisar = $_POST['pesquisar'];

            // Calcule o índice inicial
            $indiceInicial = ($paginaAtual - 1) * $resultadosPorPagina;

            // Prepare a consulta SQL com a pesquisa aproximada e limitação
            $query = "SELECT * FROM produtos WHERE nome LIKE :pesquisar OR descricao_imagem LIKE :pesquisar LIMIT :inicio, :quantidade";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(':pesquisar', "%$pesquisar%", PDO::PARAM_STR);
            $stmt->bindValue(':inicio', $indiceInicial, PDO::PARAM_INT);
            $stmt->bindValue(':quantidade', $resultadosPorPagina, PDO::PARAM_INT);
            $stmt->execute();

            // Verifique se foram encontrados resultados
            if ($stmt->rowCount() > 0) {
                // Inicialize a contagem de colunas
                $count = 0;

                // Exiba os resultados em cards
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    if ($count % 3 == 0) {
                        // Abre uma nova linha a cada 3 produtos
                        echo '<div class="row">';
                    }

                    echo '<div class="col-md-4">';
              echo '<div class="card mb-4">';
              echo '<img src="' . $row['caminho_imagem'] . '" class="card-img-top" alt="' . $row['nome'] . '">';
              echo '<div class="card-body">';
              echo '<h5 class="card-title">' . $row['nome'] . '</h5>';
              echo '<p class="card-text">' . $row['descricao_imagem'] . '</p>';
              echo '<p class="card-price">$' . $row['preco'] . '</p>';
              echo '<form method="post" action="adiciona_ao_carrinho.php">';
              echo '<input type="hidden" name="product_id" value="' . $row['IdProduto'] . '">';
              echo '<input type="hidden" name="product_name" value="' . $row['nome'] . '">';
              echo '<input type="hidden" name="product_price" value="' . $row['preco'] . '">';
              echo '<button class="btn btn-primary" type="submit" name="add_to_cart">Adicionar ao Carrinho</button>';
              echo '</form>';
              echo '<button class="btn btn-danger mt-2">❤️ Favorito</button>';
              echo '</div>';
              echo '</div>';
              echo '</div>';

                    if ($count % 3 == 2) {
                        // Fecha a linha a cada 3 produtos
                        echo '</div>';
                    }

                    $count++;
                }

                // Fecha a última linha, se necessário
                if ($count % 3 != 0) {
                    echo '</div>';
                }

                // Crie a interface de paginação
                echo '<ul class="pagination justify-content-center">';
                for ($pagina = 1; $pagina <= ceil($stmt->rowCount() / $resultadosPorPagina); $pagina++) {
                    $classeAtiva = ($pagina == $paginaAtual) ? 'active' : '';
                    echo '<li class="page-item ' . $classeAtiva . '">';
                    echo '<a class="page-link" href="?pagina=' . $pagina . '&pesquisar=' . $pesquisar . '">' . $pagina . '</a>';
                    echo '</li>';
                }
                echo '</ul>';
            } else {
                // Exiba uma mensagem se nenhum resultado for encontrado
                echo '<p>Nenhum produto encontrado. Aqui estão algumas opções:</p>';
                // Consulta para mostrar outras opções de produtos
                $query = "SELECT * FROM produtos LIMIT 6"; // Você pode ajustar a quantidade de produtos a serem exibidos
                $stmt = $conn->prepare($query);
                $stmt->execute();

                echo '<div class="row">';
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card mb-4">';
                    echo '<img src="' . $row['caminho_imagem'] . '" class="card-img-top" alt="' . $row['nome'] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['nome'] . '</h5>';
                    echo '<p class="card-text">' . $row['descricao_imagem'] . '</p>';
                    echo '<p class="card-price">$' . $row['preco'] . '</p>';
                    echo '<form method="post" action="adiciona_ao_carrinho.php">';
                    echo '<input type="hidden" name="product_id" value="' . $row['IdProduto'] . '">';
                    echo '<input type="hidden" name="product_name" value="' . $row['nome'] . '">';
                    echo '<input type="hidden" name="product_price" value="' . $row['preco'] . '">';
                    echo '<button class="btn btn-primary" type="submit" name="add_to_cart">Adicionar ao Carrinho</button>';
                    echo '</form>';
                    echo '<button class="btn btn-danger mt-2">❤️ Favorito</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
            }
        } else {
            // Exiba uma mensagem se a pesquisa estiver vazia
            echo '<p>Nenhum resultado encontrado.</p>';
        }

        // Feche o contêiner Bootstrap
        echo '</div>';
        ?>
    </div>

    <br><br>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
