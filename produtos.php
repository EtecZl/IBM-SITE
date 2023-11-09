<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completlar - Sua Casa, Seu Estilo</title>
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
        <link rel="stylesheet" href="assets/CSS/categoria.css" />
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

<br><br>
    <div class="container text-center mx-auto p-2">
    <div class="row">
        <div class="col-md-2 d-flex flex-column align-items-center mx-auto p-2">
            <a href="produtosAdap.php">
                <img src="assets/Imagens/Produtos/adaptados.jpg" class="img-fluid rounded-circle img-zoom" alt="Imagem 1">
                <p>Adaptados</p>
            </a>
        </div>
        <div class="col-md-2 d-flex flex-column align-items-center mx-auto p-2">
            <a href="produtosSE.php">
                <img src="assets/Imagens/Produtos/saladestarr.jpg" class="img-fluid rounded-circle img-zoom" alt="Imagem 1">
                <p>Sala De Estar</p>
            </a>
        </div>
        <div class="col-md-2 d-flex flex-column align-items-center mx-auto p-2">
            <a href="produtosQ.php">
                <img src="assets/Imagens/Produtos/quartos.jpg" class="img-fluid rounded-circle img-zoom" alt="Imagem 1">
                <p>Quartos</p>
            </a>
        </div>
        <div class="col-md-2 d-flex flex-column align-items-center mx-auto p-2">
            <a href="produtosC.php">
                <img src="assets/Imagens/Produtos/cozinhaa.jpg" class="img-fluid rounded-circle img-zoom" alt="Imagem 1">
                <p>Cozinha</p>
            </a>
        </div>
        <div class="col-md-2 d-flex flex-column align-items-center mx-auto p-2">
            <a href="produtosE.php">
                <img src="assets/Imagens/Produtos/escrito.jpg" class="img-fluid rounded-circle img-zoom" alt="Imagem 1">
                <p>Escritório</p>
            </a>
        </div>
    </div>
</div><br>
<div class="container mt-5">
    <div class="row">
        <?php
        include 'includes/conexao.php';
        $conn = new Conectar();

        $itensPorPagina = 6;
        $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        $totalProdutos = $conn->query("SELECT COUNT(*) as total FROM produtos")->fetch()['total'];
        $totalPaginas = ceil($totalProdutos / $itensPorPagina);
        $offset = ($paginaAtual - 1) * $itensPorPagina;
        $sql = "SELECT * FROM produtos LIMIT $itensPorPagina OFFSET $offset";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            echo '<div class="row">';
            foreach ($result as $row) {
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card h-100">';
                echo '<img src="' . $row['caminho_imagem'] . '" class="card-img-top custom-image-size img-fluid" alt="' . $row['nome'] . '" style="width: 500px; height: 500px;">';
        
                echo '<div class="card-body d-flex flex-column align-items-center" style="text-align: center; padding: 20px; background-color: #f8f9fa; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">';
                echo '<h5 class="card-title mb-2" style="color: #007bff; font-size: 1.5rem; font-weight: bold;">' . $row['nome'] . '</h5>';
                echo '<p class="card-text mb-3" style="color: #555; font-size: 1rem;">' . $row['descricao_imagem'] . '</p>';
                echo '<p class="card-price h4" style="color: #28a745; font-size: 1.25rem; margin-bottom: 15px;">$' . $row['preco'] . '</p>';
        
                echo '<form method="post" action="adiciona_ao_carrinho.php">';
                echo '<input type="hidden" name="product_id" value="' . $row['IdProduto'] . '">';
                echo '<input type="hidden" name="product_name" value="' . $row['nome'] . '">';
                echo '<input type="hidden" name="product_price" value="' . $row['preco'] . '">';
                echo '<button type="submit" name="add_to_cart" class="btn btn-primary mt-auto" style="background-color: #808080; border-color: #ffc107;">Adicionar ao Carrinho</button>';
                echo '</form>';
        
                echo '<form method="post" action="favoritar.php">';
                echo '<input type="hidden" name="product_id" value="' . $row['IdProduto'] . '">';
                echo '<button type="submit" class="btn btn-success favorite-btn">Favoritar</button>';
                echo '</form>';
        
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo '<p class="text-center mt-5">Nenhum produto encontrado.</p>';
        }
        ?>

        </div>

    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center mt-4">
            <?php
            if ($paginaAtual > 1) {
                echo '<li class="page-item"><a class="page-link" href="?pagina=' . ($paginaAtual - 1) . '">Anterior</a></li>';
            }

            for ($i = 1; $i <= $totalPaginas; $i++) {
                echo '<li class="page-item ' . ($paginaAtual === $i ? 'active' : '') . '"><a class="page-link" href="?pagina=' . $i . '">' . $i . '</a></li>';
            }

            if ($paginaAtual < $totalPaginas) {
                echo '<li class="page-item"><a class="page-link" href="?pagina=' . ($paginaAtual + 1) . '">Próxima</a></li>';
            }
            ?>
        </ul>
    </nav>
</div>


    <br><br>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
