<?php
// Conexão com o banco de dados usando PDO
$conn = new PDO("mysql:host=localhost;dbname=completlar", "root", "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Consulta para obter orçamentos pendentes
$sql = "SELECT * FROM orcamentos WHERE status = 'Pendente'";
$result = $conn->query($sql);

if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        // Exibir informações do orçamento e opções para aprovar ou rejeitar
        echo "ID: " . $row["id"] . "<br>";
        echo "Tipo de Trabalho: " . $row["tipoTrabalho"] . "<br>";
        echo "CEP: " . $row["cep"] . "<br>";
        echo "Orçamento: " . $row["budget"] . "<br>";
        echo "Proprietário: " . $row["ownership"] . "<br>";
        echo "Data de Início: " . $row["startDate"] . "<br>";
        echo "Detalhes Adicionais: " . $row["additionalDetails"] . "<br>";
        echo "Nome: " . $row["name"] . "<br>";
        echo "E-mail: " . $row["email"] . "<br>";
        echo "Telefone: " . $row["phone"] . "<br>";

        // Botões de aprovação e rejeição
        echo "<form method='post' action='process_aprovar_orcamento.php'>";
        echo "<input type='hidden' name='orcamento_id' value='" . $row["id"] . "'>";
        echo "<input type='submit' name='aprovar' value='Aprovar'>";
        echo "<input type='submit' name='rejeitar' value='Rejeitar'>";
        echo "</form>";
    }
} else {
    echo "Nenhum orçamento pendente.";
}

$conn = null;
?>
