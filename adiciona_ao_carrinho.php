<?php
session_start();

// Verifique se o formulário foi enviado
if (isset($_POST['add_to_cart'])) {
    // Obtenha os detalhes do produto a partir do formulário
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    // Certifique-se de que as sessões do carrinho já estão inicializadas (isso pode ser feito em outro lugar)
    if (!isset($_SESSION['cart_product_ids'])) {
        $_SESSION['cart_product_ids'] = array();
        $_SESSION['cart_product_names'] = array();
        $_SESSION['cart_product_prices'] = array();
    }

    // Adicione o produto ao carrinho
    $_SESSION['cart_product_ids'][] = $product_id;
    $_SESSION['cart_product_names'][] = $product_name;
    $_SESSION['cart_product_prices'][] = $product_price;

    // Redirecione de volta para a página de produtos ou para o carrinho
    header('Location: produtos.php'); // Substitua "produtos.php" pela página de produtos real
}
?>
