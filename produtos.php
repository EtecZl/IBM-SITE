
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
                            <button class="btn btn-success" onclick="addToCart('Mesa Multiuso com Altura Regulável', 280.20)">Adicionar ao Carrinho</button>
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
                            <button class="btn btn-success" onclick="addToCart('Mesa Escolar com 3 Alturas', 550.00)">Adicionar ao Carrinho</button>
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
                            <button class="btn btn-success" onclick="addToCart('Mesa Escolar Adaptada', 980.00)">Adicionar ao Carrinho</button>
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
                            <button class="btn btn-success" onclick="addToCart('Mesa Multiuso com Altura Regulável', 280.20)">Adicionar ao Carrinho</button>
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
                            <button class="btn btn-success" onclick="addToCart('Mesa Escolar com 3 Alturas', 550.00)">Adicionar ao Carrinho</button>
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
                            <button class="btn btn-success" onclick="addToCart('Mesa Escolar Adaptada', 980.00)">Adicionar ao Carrinho</button>
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