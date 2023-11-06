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
    <link rel="stylesheet" href="assets/CSS/categoria.css" />
	  
    <!-- JavaScript Bootstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <!--JQuery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="assets/JS/app3.js"></script>
    
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


<br><br><br>


<div class="container text-center mx-auto p-2">
    <div class="row">
        <div class="col-md-2 d-flex flex-column align-items-center mx-auto p-2">
            <a href="produtos.php">
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
    <?php
    // Conexão com o banco de dados
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "completlar"; // Nome do seu banco de dados

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $pesquisa = $_POST["pesquisa"];
            
            $sql = "SELECT * FROM produtos WHERE Nome LIKE :pesquisa"; // Alterado para a tabela produtos
            
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':pesquisa', '%' . $pesquisa . '%', PDO::PARAM_STR);
            $stmt->execute();
            
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if ($result) {
                echo "<h2 class='mb-4'>Resultados da Pesquisa</h2>";
                
                $counter = 0; // Inicializa um contador
                echo "<div class='row'>"; // Inicia uma nova linha
                
                foreach ($result as $row) {
                    echo "<div class='col-md-4 py-3 py-md-0'>";
                    echo "<div class='card'>";
                    
                    // Exiba a imagem armazenada no banco de dados
                    echo "<img src='data:image/jpeg;base64," . base64_encode($row["imagem"]) . "' class='card-img-top' alt='{$row["Nome"]}'>";
                    
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>{$row["Nome"]}</h5>";
                    echo "<p class='card-text'>R$ {$row["Preço"]}</p>";
                    echo "<div class='d-grid gap-2'>";
                    echo "<a class='btn btn-primary' href='Comprar.php?produto={$row["IdProduto"]}'>Comprar</a>";
                    echo "<button class='btn btn-success' onclick='addToCart(\"{$row["Nome"]}\", {$row["Preço"]})'>Adicionar ao Carrinho</button>";
                    // Star rating
                    echo "<div class='star-rating'>";
                    echo "<input type='radio' name='rating{$row["IdProduto"]}' value='5' id='rating{$row["IdProduto"]}-5'><label for='rating{$row["IdProduto"]}-5'></label>";
                    echo "<input type='radio' name='rating{$row["IdProduto"]}' value='4' id='rating{$row["IdProduto"]}-4'><label for='rating{$row["IdProduto"]}-4'></label>";
                    echo "<input type='radio' name='rating{$row["IdProduto"]}' value='3' id='rating{$row["IdProduto"]}-3'><label for='rating{$row["IdProduto"]}-3'></label>";
                    echo "<input type='radio' name='rating{$row["IdProduto"]}' value='2' id='rating{$row["IdProduto"]}-2'><label for='rating{$row["IdProduto"]}-2'></label>";
                    echo "<input type='radio' name='rating{$row["IdProduto"]}' value='1' id='rating{$row["IdProduto"]}-1'><label for='rating{$row["IdProduto"]}-1'></label>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                
                
                    
                    $counter++; // Incrementa o contador
                    
                    // Se já tivermos 3 cards na linha, fecha a linha atual e inicia uma nova linha
                    if ($counter % 3 == 0) {
                        echo "</div>"; // Fecha a linha atual
                        echo "<div class='row'>"; // Inicia uma nova linha
                    }
                }
                
                echo "</div>"; // Fecha a última linha, se necessário
          
                
            } else {
                echo "<p>Nenhum resultado encontrado.</p>";
            }
        }
    } catch (PDOException $e) {
        echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    }
    ?>
</div> 


    <h3><center>Móveis Para Escritorio</h3></center><br>

    <div class="container">
        <div class="row">
        <div class="col-md-4 py-3 py-md-0">
    <div class="card position-relative"> <!-- Adicione a classe "position-relative" ao cartão para posicionamento relativo -->
        <div class="new-badge">Novo</div> <!-- Adicione a faixa "Novo" aqui -->
        <img src="assets/Imagens/Produtos/EscrivaninhaP1.jpg" class="card-img-top" alt="Cinque Terre">
        <div class="card-body">
            <h5 class="card-title">Escrivaninha Petrolina 2 GV</h5>
            <p class="card-text">R$ 530,96</p>
            <div class="d-grid gap-2"><br>
                <a class="btn btn-primary" href="Escrevaninha1.php">Comprar</a>
                <button class="btn btn-success" onclick="addToCart('Escrivaninha Petrolina 2 GV', 530,96)"> Adicionar ao Carrinho  <i class="bi bi-cart-plus"></i></button>
            </div>
        </div>
    </div>
</div>

    
            <div class="col-md-4 py-3 py-md-0">
            <div class="card position-relative"> <!-- Adicione a classe "position-relative" ao cartão para posicionamento relativo -->
        <div class="new-badge">Novo</div> <!-- Adicione a faixa "Novo" aqui -->
                    <img src="assets/Imagens/Produtos/MesaGamer.jpg" class="card-img-top" alt="Cinque Terre">
                    <div class="card-body">
                        <h5 class="card-title">Mesa para Computador Gamer</h5>
                        <p class="card-text">R$ 269,99</p>
                        <div class="d-grid gap-2"><br>
                            <a class="btn btn-primary" href="MesaComputa.php">Comprar</a>
                            <button class="btn btn-success" onclick="addToCart('Mesa para Computador Gamer', 269,99)"> Adicionar ao Carrinho  <i class="bi bi-cart-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-4 py-3 py-md-0">
            <div class="card position-relative"> <!-- Adicione a classe "position-relative" ao cartão para posicionamento relativo -->
        <div class="new-badge">Novo</div> <!-- Adicione a faixa "Novo" aqui -->
                    <img src="assets/Imagens/Produtos/Escrivaninha.jpg" class="card-img-top" alt="Cinque Terre">
                    <div class="card-body">
                        <h5 class="card-title">Escrivaninha Studio</h5>
                        <p class="card-text">R$ 422,96</p>
                        <div class="d-grid gap-2"><br><br>
                            <a class="btn btn-primary" href="escrivaninha.php">Comprar</a>
                            <button class="btn btn-success" onclick="addToCart('Escrivaninha Studio', 422,96)">Adicionar ao Carrinho  <i class="bi bi-cart-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="assets/Imagens/Produtos/cadeiraEscri.jpg" class="card-img-top" alt="Cinque Terre">
                    <div class="card-body">
                        <h5 class="card-title">Cadeira de Escritório Secretária Giratória</h5>
                        <p class="card-text">R$ 386,98</p>
                        <div class="d-grid gap-2"><br>
                            <a class="btn btn-primary" href="#">Comprar</a>
                            <button class="btn btn-success" onclick="addToCart('Cadeira de Escritório Secretária Giratória', 386,98)">Adicionar ao Carrinho  <i class="bi bi-cart-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="assets/Imagens/Produtos/cadeiraEscri1.jpg" class="card-img-top" alt="Cinque Terre">
                    <div class="card-body">
                        <h5 class="card-title">Cadeira de Escritório Presidente Giratória com Relax Finland</h5>
                        <p class="card-text">R$ 503,98</p>
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary" href="#">Comprar</a>
                            <button class="btn btn-success" onclick="addToCart('Cadeira de Escritório Presidente Giratória com Relax Finland', 503,98)">Adicionar ao Carrinho  <i class="bi bi-cart-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="assets/Imagens/Produtos/mesadCozi1.jpg" class="card-img-top" alt="Cinque Terre">
                    <div class="card-body">
                        <h5 class="card-title">Cadeira de Escritório Diretor Giratória Eames Comfort</h5>
                        <p class="card-text">R$ 809,98</p>
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary" href="#">Comprar</a>
                            <button class="btn btn-success" onclick="addToCart('Cadeira de Escritório Diretor Giratória Eames Comfort', 809,98)">Adicionar ao Carrinho  <i class="bi bi-cart-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div class="container">
        <div class="row">
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="assets/Imagens/Produtos/estanteC.jpg" class="card-img-top" alt="Cinque Terre">
                    <div class="card-body">
                        <h5 class="card-title">Estante Colmeia 2 PT 1</h5>
                        <p class="card-text">R$ 1.275,29</p>
                        <div class="d-grid gap-2"><br>
                            <a class="btn btn-primary" href="#">Comprar</a>
                            <button class="btn btn-success" onclick="addToCart('Estante Colmeia 2 PT 1', 1.275,29)">Adicionar ao Carrinho  <i class="bi bi-cart-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="assets/Imagens/Produtos/estanteT.jpg" class="card-img-top" alt="Cinque Terre">
                    <div class="card-body">
                        <h5 class="card-title">Estante Temper</h5>
                        <p class="card-text">R$ 300,47</p>
                        <div class="d-grid gap-2"><br>
                            <a class="btn btn-primary" href="#">Comprar</a>
                            <button class="btn btn-success" onclick="addToCart('Estante Temper', 300,47)">Adicionar ao Carrinho  <i class="bi bi-cart-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="assets/Imagens/Produtos/ArmarioEscritorio.jpg" class="card-img-top" alt="Cinque Terre">
                    <div class="card-body">
                        <h5 class="card-title">Armário de Escritório Indiana</h5>
                        <p class="card-text">R$ 368,99</p>
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary" href="#">Comprar</a>
                            <button class="btn btn-success" onclick="addToCart('Armário de Escritório Indiana', 368,99)">Adicionar ao Carrinho  <i class="bi bi-cart-plus"></i></button>
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