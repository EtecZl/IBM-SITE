<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $descricao = $_POST["descricao"];
    $moveis = $_POST["moveis"];
    $medidas = isset($_POST["medidas"]) ? $_POST["medidas"] : "Não especificadas";
    $cores = isset($_POST["cores"]) ? $_POST["cores"] : "Não especificadas";

    // Endereço de email do administrador
    $admin_email = "admin@example.com";

    // Assunto do email
    $assunto = "Solicitação de Orçamento de $nome";

    // Mensagem do email
    $mensagem = "Nome: $nome\n";
    $mensagem .= "Email: $email\n";
    $mensagem .= "Descrição do Serviço:\n$descricao\n";
    $mensagem .= "Móveis Desejados: $moveis\n";
    $mensagem .= "Medidas: $medidas\n";
    $mensagem .= "Cores: $cores";

    // Enviar o email
    if (mail($admin_email, $assunto, $mensagem)) {
        echo "Seu pedido de orçamento foi enviado com sucesso. O administrador entrará em contato em breve.";
    } else {
        echo "Ocorreu um erro ao enviar o pedido de orçamento. Tente novamente mais tarde.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Solicitar Orçamento</title>
</head>
<body>
    <h2>Solicitar Orçamento de Móveis</h2>
    <form action="" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="descricao">Descrição do Serviço:</label>
        <textarea id="descricao" name="descricao" rows="4" required></textarea><br>

        <label for="moveis">Móveis desejados:</label>
        <input type="text" id="moveis" name="moveis" required><br>

        <label for="medidas">Medidas (opcional):</label>
        <input type="text" id="medidas" name="medidas"><br>

        <label for="cores">Cores (opcional):</label>
        <input type="text" id="cores" name="cores"><br>

        <input type="submit" value="Enviar Orçamento">
    </form>
</body>
</html>
