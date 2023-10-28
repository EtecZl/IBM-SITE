<?php
session_start();

if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {
    foreach ($_SESSION['carrinho'] as $item) {
        echo "<tr>";
        echo "<td>{$item['nome']}</td>";
        echo "<td>R$ {$item['preco']}</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='2'>Nenhum item no carrinho</td></tr>";
}
?>
