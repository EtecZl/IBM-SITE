<?php
session_start();

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

if (isset($_POST['produto_nome']) && isset($_POST['produto_preco'])) {
    $produtoNome = $_POST['produto_nome'];
    $produtoPreco = $_POST['produto_preco'];
    $carrinhoItem = ['nome' => $produtoNome, 'preco' => $produtoPreco];
    $_SESSION['carrinho'][] = $carrinhoItem;
}
?>
