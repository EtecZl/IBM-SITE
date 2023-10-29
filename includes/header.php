





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
         <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar produtos" aria-label="Pesquisar" name="pesquisar">
      <button class="btn btn-dark" type="submit" >Pesquisar</button>


    </form>

    
            <ul class="navbar-nav">
                <li class="nav-item">

                    <a class="nav-link" href="login.php"><i class="bi bi-person"></i> login/cadastro </a>
                </li>
                <a class="nav-link" href="obter_carrinho.php">
                    <i class="fa fa-shopping-cart cart-icon" data-count="0"></i> Carrinho

                
                </a>

             
            </ul>
            
        </div>
        
    </div>
  </div>
</nav>

</body>
</html>

