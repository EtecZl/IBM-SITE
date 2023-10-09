<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  
  <nav class="navbar navbar-expand-lg navbar-dark"> 
  <div class="container-fluid">
    <a class="navbar-brand">
      <img src="assets/Imagens/Home/logo.png" alt="Logo" width="60" height="30" class="d-inline-block align-text-top">
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
                        <a class="dropdown-item" href="#"> Orçamento</a>
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
                    <a class="nav-link" href="perfil_foto.php"><i class="bi bi-person"></i> Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php"><i class="bi bi-cart"></i> Carrinho</a>
                </li>
            </ul>
            
        </div>
        
    </div>
  </div>
</nav>



