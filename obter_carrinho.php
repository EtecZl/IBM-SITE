
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

<?php include 'includes/header.php'; ?>

<div class="container mt-5">
    <h2>Seu Carrinho de Compras</h2>

    <div class="row">
        <?php
        // Verifique se o carrinho não está vazio
        if (isset($_SESSION['cart_product_ids']) && !empty($_SESSION['cart_product_ids'])) {
            echo '<table class="table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th scope="col">Produto</th>';
            echo '<th scope="col">Preço</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            // Loop pelos produtos no carrinho
            foreach ($_SESSION['cart_product_ids'] as $key => $product_id) {
                $product_name = $_SESSION['cart_product_names'][$key];
                $product_price = $_SESSION['cart_product_prices'][$key];

                // Exibir informações do produto no carrinho em uma tabela
                echo '<tr>';
                echo '<td>' . $product_name . '</td>';
                echo '<td>R$ ' . $product_price . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo "O carrinho está vazio.";
        }
        ?>
    </div>
</div>


    <!-- Adicione um botão para continuar comprando ou finalizar a compra, se necessário -->
    
    <?php include 'includes/footer.php'; ?>

    <!-- Adicione seu JavaScript personalizado aqui, se necessário -->

</body>
</html>
