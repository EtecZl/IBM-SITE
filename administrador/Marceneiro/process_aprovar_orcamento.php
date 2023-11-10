<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orcamentoId = $_POST['orcamento_id'];
    $novoStatus = $_POST['status'];

    try {
        $conn = new PDO("mysql:host=localhost;dbname=completlar", "root", ""); 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE orcamentos SET status = :status WHERE id = :orcamento_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':status', $novoStatus);
        $stmt->bindParam(':orcamento_id', $orcamentoId);
        $stmt->execute();

        // Redireciona de volta para a página anterior após a atualização
        header("Location: marceneiro.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    }

    $conn = null;
}
?>
