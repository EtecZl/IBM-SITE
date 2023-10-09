<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Completlar - Sua Casa, Seu Estilo.</title>
  <link lr rel="shortcut icon" href="assets/Imagens/Home/icons/logo.ico" type="image/x-icon" />
  <!-- Google fonts Lato -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet" />
  <!-- CSS Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
  <!-- CSS do projeto -->
  <link rel="stylesheet" href="assets/CSS/atualizar.css" />

  <!-- JavaScript Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</head>

<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  
<?php include 'includes/header.php'; ?>



  <!-- Main Content -->
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <?php 
                    if(isset($_SESSION['status']))
                    {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                ?>
                    <br>
                 <h1>Atualize seus dados com responsabilidade</h1>
                
                <div class="card mt-5">
                    <div class="card-header">
                        <h5>Obs: Se não quiser atualizar algo reescreva de novo</h5>
                    </div>
                    <div class="card-body">

                        <form action="code.php" method="POST">

                            <div class="form-group mb-3">
                                <label >Nome</label>
                                <input type="text" name="nome" class="form-control" placeholder="Coloque seu nome cadastrado para pode atualizar" >
                            </div>
                            <div class="form-group mb-3">
                                <label >Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Digie seu email">
                            </div>
                            <div class="form-group mb-3">
                                <label >Cep</label>
                                <input type="text" name="cep" class="form-control" placeholder="Digie seu cep">
                            </div>
                            <div class="form-group mb-3">
                                <label >Senha</label>
                                <input type="text" name="senha" class="form-control" placeholder="Digie sua senha">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="update_stud_data" class="button">Atualizar</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
  <br>
  <?php include 'includes/footer.php'; ?>

</body>

</html>
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>