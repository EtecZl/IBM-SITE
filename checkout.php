<!DOCTYPE html>
<html>
<head>
    <title>Página de Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Checkout</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
                <label for="nome_cliente">Nome:</label>
                <input type="text" class="form-control" name="nome_cliente" required>
            </div>
            <!-- Adicione outros campos, como email, endereço, itens do carrinho, etc. -->

            <button type="submit" class="btn btn-primary">Finalizar Pedido</button>
        </form>
    </div>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        include 'includes/conexao.php';
        $con = Conectar::getInstance(); // Obter uma instância da classe Conectar

 // Minha Conta
session_start();
$_SESSION['email'] = 
$_SESSION['endereco'] = 


        // Insira os dados no banco de dados usando uma declaração preparada
        $stmt = $con->prepare("INSERT INTO pedidos (nome_cliente, email, endereco, total) VALUES (?, ?, ?, ?)");

        $stmt->execute([$nome_cliente, $email, $endereco, $total]);

        echo "Pedido processado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao processar o pedido: " . $e->getMessage();
    }
}
?>

</body>
</html>
