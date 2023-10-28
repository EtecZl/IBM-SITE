
<?php
// Seção PHP para inicializar ou recuperar o carrinho
session_start();

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

if (isset($_POST['adicionar_carrinho'])) {
    $produtoNome = $_POST['produto_nome'];
    $produtoPreco = $_POST['produto_preco'];
    $carrinhoItem = ['nome' => $produtoNome, 'preco' => $produtoPreco];
    $_SESSION['carrinho'][] = $carrinhoItem;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completlar - Sua Casa, Seu Estilo.</title>
    <link lr rel="shortcut icon" href="assets/assets/Imagens/Home/icons/logo.ico" type="image/x-icon" />
    <!-- Google fonts Lato -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <!-- CSS Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <!-- Bootstrap Icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
    />
    <!-- CSS do projeto -->
    <link rel="stylesheet" href="assets/CSS/home_style.css" />
	  
    <!-- JavaScript Bootstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>

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
include 'includes/conexao.php';
 $conn = new Conectar();

// Consulta para selecionar todos os produtos
$sql = "SELECT * FROM produtos";

$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($result) {
    echo "<div class='row'>";
    
    foreach ($result as $row) {
        echo "<div class='col-md-4 py-3 py-md-0'>";
        echo "<div class='card'>";
        
        echo "<img src='" . $row["caminho_imagem"] . "' class='card-img-top' alt='{$row["nome"]}'>";
        
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>{$row["nome"]}</h5>";
        echo "<p class='card-text'>R$ {$row["preco"]}</p>";
        echo "<div class='d-grid gap-2'>";
        echo "<a class='btn btn-primary' href='Comprar.php?produto={$row["IdProduto"]}'>Comprar</a>";
        echo "<button class='btn btn-success' onclick='addToCart(\"{$row["nome"]}\", {$row["preco"]})'>Adicionar ao Carrinho</button>";
        // Star rating (adicionar o código para estrelas, se necessário)
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    
    echo "</div>";
} else {
    echo "<p>Nenhum produto encontrado.</p>";
}
?>


</div>





  





    <h3><center>Móveis Adaptados</h3></center>

    <div class="container">
        <div class="row">
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="assets/Imagens/Produtos/Guarda-Roupa-Espelho.jpg" class="card-img-top" alt="Cinque Terre">
                    <div class="card-body">
                        <h5 class="card-title">Mesa Multiuso com Altura Regulável</h5>
                        <p class="card-text">R$ 280,20</p>
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary" href="Comprar (16).html">Comprar</a>
                            <!-- Botão do Carrinho -->
<button id="carrinhoBtn" class="btn btn-primary">Carrinho</button>
                            <!-- Star rating -->
                            <div class="star-rating">
                                <input type="radio" name="rating1" value="5" id="rating1-5"><label for="rating1-5"></label>
                                <input type="radio" name="rating1" value="4" id="rating1-4"><label for="rating1-4"></label>
                                <input type="radio" name="rating1" value="3" id="rating1-3"><label for="rating1-3"></label>
                                <input type="radio" name="rating1" value="2" id="rating1-2"><label for="rating1-2"></label>
                                <input type="radio" name="rating1" value="1" id="rating1-1"><label for="rating1-1"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="assets/Imagens/Produtos/Guarda-Roupa-Casal.jpg" class="card-img-top" alt="Cinque Terre">
                    <div class="card-body">
                        <h5 class="card-title">Mesa Escolar com 3 Alturas</h5>
                        <p class="card-text">R$ 550,00</p>
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary" href="ComprarMesaEscolar3Alt.html">Comprar</a>
                            <!-- Botão do Carrinho -->
<button id="carrinhoBtn" class="btn btn-primary">Carrinho</button>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="assets/Imagens/Produtos/sofa-slim.jpg" class="card-img-top" alt="Cinque Terre">
                    <div class="card-body">
                        <h5 class="card-title">Mesa Escolar Adaptada</h5>
                        <p class="card-text">R$ 980,00</p>
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary" href="ComprarMesaEscolarAdap.html">Comprar</a>
<!-- Botão do Carrinho -->
<button id="carrinhoBtn" class="btn btn-primary">Carrinho</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h3><center>Móveis Adaptados</h3></center>

    <div class="container">
        <div class="row">
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="assets/Imagens/Produtos/mesa-escritório.jpg" class="card-img-top" alt="Cinque Terre">
                    <div class="card-body">
                        <h5 class="card-title">Mesa Multiuso com Altura Regulável</h5>
                        <p class="card-text">R$ 280,20</p>
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary" href="Comprar (16).html">Comprar</a>
                           <!-- Botão do Carrinho -->
<button id="carrinhoBtn" class="btn btn-primary">Carrinho</button>
                            <!-- Star rating -->
                            <div class="star-rating">
                                <input type="radio" name="rating1" value="5" id="rating1-5"><label for="rating1-5"></label>
                                <input type="radio" name="rating1" value="4" id="rating1-4"><label for="rating1-4"></label>
                                <input type="radio" name="rating1" value="3" id="rating1-3"><label for="rating1-3"></label>
                                <input type="radio" name="rating1" value="2" id="rating1-2"><label for="rating1-2"></label>
                                <input type="radio" name="rating1" value="1" id="rating1-1"><label for="rating1-1"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="assets/Imagens/Produtos/Armario-Mesa-Dobravel.jpg" class="card-img-top" alt="Cinque Terre">
                    <div class="card-body">
                        <h5 class="card-title">Mesa Escolar com 3 Alturas</h5>
                        <p class="card-text">R$ 550,00</p>
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary" href="ComprarMesaEscolar3Alt.html">Comprar</a>
                          <!-- Botão do Carrinho -->
<button id="carrinhoBtn" class="btn btn-primary">Carrinho</button>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="assets/Imagens/Produtos/Mesa-Multiuso.jpg" class="card-img-top" alt="Cinque Terre">
                    <div class="card-body">
                        <h5 class="card-title">Mesa Escolar Adaptada</h5>
                        <p class="card-text">R$ 980,00</p>
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary" href="ComprarMesaEscolarAdap.html">Comprar</a>
                         <!-- Botão do Carrinho -->
<button id="carrinhoBtn" class="btn btn-primary">Carrinho</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

    <br><br>
  <?php include 'includes/footer.php'; ?>
  





</body>
</html>