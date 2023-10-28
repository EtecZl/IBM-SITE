





<!DOCTYPE html>
<html lang="pt-br   ">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
</head>
<body>
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <nav class="navbar navbar-expand-lg navbar-dark"> 
  <div class="container-fluid">
    <a class="navbar-brand">
      <img src="assets/Imagens/Home/logo.png" alt="Logo" width="60" height="40" class="d-inline-block align-text-top">
      COMPLET<span class="lar">LAR</span>
    </a>

 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          
            <ul class="navbar-nav me-auto">
            
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>

                <li class="nav-item dropdown justify-content-center">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Produtos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="produtos.php">Produtos Avulsos</a>
                        <a class="dropdown-item" href="#">Produtos Personalizados</a>
                        <a class="dropdown-item" href="orçamento.php"> Orçamento</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="blog.php">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nowrap" href="sobre_nos.php">Sobre Nós</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contato.php">Contato</a>
                </li>
                
            </ul>
           
            <form class="form-inline" method="POST" action="produtos.php">
         <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar produtos" aria-label="Pesquisar" name="pesquisa">
      <button class="btn btn-dark" type="submit" >Pesquisar</button>
    </form>

    
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="login.php"><i class="bi bi-person"></i> login/cadastro </a>
                </li>
                <a class="nav-link" href="addToCart.php">
                    <i class="fa fa-shopping-cart cart-icon" data-count="0"></i> Carrinho
                </a>
            </ul>
            
        </div>
        
    </div>
  </div>
</nav>

<div class="container mt-5">
        <h3>Itens no Carrinho</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody id="carrinho-itens">
                <!-- Aqui serão listados os itens do carrinho via JavaScript -->
            </tbody>
        </table>
    </div>

    <script>
        function addToCart(nome, preco) {
            // Função para adicionar itens ao carrinho
            $.ajax({
                type: 'POST',
                url: 'adicionar_carrinho.php',
                data: { produto_nome: nome, produto_preco: preco },
                success: function(response) {
                    alert('Produto adicionado ao carrinho!');
                    updateCart();
                },
                error: function() {
                    alert('Erro ao adicionar o produto ao carrinho.');
                }
            });
        }

        function updateCart() {
            // Função para atualizar e exibir os itens no carrinho
            $.ajax({
                type: 'GET',
                url: 'obter_carrinho.php',
                success: function(response) {
                    $('#carrinho-itens').html(response);
                },
                error: function() {
                    alert('Erro ao obter o carrinho.');
                }
            });
        }
        
        // Atualize o carrinho quando a página for carregada
        $(document).ready(function() {
            updateCart();
        });
    </script>


</body>
</html>
