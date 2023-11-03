<?php
session_start();

require_once "includes/conexao.php";

$pdo = new Conectar();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    echo "A chave 'user_id' não está definida na sessão.";
}

$sql = "SELECT username, email, cep, telefone FROM loginclientes WHERE id = :user_id";
if ($stmt = $pdo->prepare($sql)) {
    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
    if ($stmt->execute()) {
        $row = $stmt->fetch();
        if ($row) {
            $username = $row['username'];
            $email = $row['email'];
            $cep = $row['cep'];
            $telefone = $row['telefone'];
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $_POST['new_username'];
    $new_email = $_POST['new_email'];
    $new_cep = $_POST['new_cep'];
    $new_telefone = $_POST['new_telefone'];

    // Valide os dados, por exemplo, verifique se o email é válido, o CEP está no formato correto, etc.

    // Atualize as informações no banco de dados
    $update_sql = "UPDATE loginclientes SET username = :new_username, email = :new_email, cep = :new_cep, telefone = :new_telefone WHERE id = :user_id";
    if ($update_stmt = $pdo->prepare($update_sql)) {
        $update_stmt->bindParam(":new_username", $new_username, PDO::PARAM_STR);
        $update_stmt->bindParam(":new_email", $new_email, PDO::PARAM_STR);
        $update_stmt->bindParam(":new_cep", $new_cep, PDO::PARAM_STR);
        $update_stmt->bindParam(":new_telefone", $new_telefone, PDO::PARAM_STR);
        $update_stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);

        if ($update_stmt->execute()) {
            // Redirecione o usuário para a página de perfil ou exiba uma mensagem de sucesso
            header("location: MinhaConta.php");
        } else {
            echo "Erro ao atualizar informações no banco de dados.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Informações</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h2>Atualizar Informações</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Nome de Usuário</label>
                <input type="text" name="new_username" class="form-control" value="<?php echo $username; ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="new_email" class="form-control" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <label>CEP</label>
                <input type="text" name="new_cep" class="form-control" value="<?php echo $cep; ?>">
            </div>
            <div class="form-group">
                <label>Telefone</label>
                <input type="text" name="new_telefone" class="form-control" value="<?php echo $telefone; ?>">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Atualizar">
            </div>
        </form>
    </div>
</body>
</html>
