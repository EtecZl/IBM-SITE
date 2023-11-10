<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprovaçao de Orçamento</title>
    <!-- Adicione o link para o Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'header2.php'; ?>


<div class="container">
    <div class="row justify-content-center align-items-center"> <!-- Adicione as classes justify-content-center e align-items-center para centralizar os cards -->
        <?php

        // Conexão com o banco de dados usando PDO
        try {
            $conn = new PDO("mysql:host=localhost;dbname=completlar", "root", ""); 
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Consulta para obter orçamentos pendentes
            $sql = "SELECT * FROM orcamentos";
            $result = $conn->query($sql);

            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    // Início do card HTML
                    echo '<div class="card" style="width: 18rem;">';
                    // Decodifica os dados base64 e exibe a imagem com tamanho 200x250 pixels
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['caminho_imagem']) . '" class="card-img-top" alt="Imagem do Orçamento" style="width: 200px; height: 250px;">';
                    echo '<div class="card-body">';
                    echo '<p class="card-text">Nome: ' . $row["nome"] . '</p>';
                    echo '<p class="card-text">Tipo de Trabalho: ' . $row["tipoTrabalho"] . '</p>';
                    echo '<p class="card-text">Proprietário: ' . $row["ownership"] . '</p>';
                    echo '<p class="card-text">Data de Início: ' . $row["startDate"] . '</p>';
                    echo '<p class="card-text">E-mail: ' . $row["email"] . '</p>';

                    
                    echo '<form action="process_aprovar_orcamento.php" method="post">';
                    echo '<input type="hidden" name="orcamento_id" value="' . $row["id"] . '">';

                    // Adicione um campo de seleção para o novo status
                    echo '<label for="status">Alterar Status: </label>';
                    echo '<select class="form-control" id="status" name="status">';
                    echo '<option value="Pendente">Pendente</option>';
                    echo '<option value="Aprovado">Aprovado</option>';
                    echo '<option value="Rejeitado">Rejeitado</option>';
                    echo '</select>';

                    echo '<div class="card-body d-flex justify-content-between">';
                    echo '<button type="submit" class="btn btn-primary">Enviar</button>';
                    echo '</div>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';

                }
            } else {
                echo 'Nenhum orçamento pendente.';
            }
        } catch (PDOException $e) {
            echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
        }

        $conn = null;
        ?>
    </div> <!-- Fim da linha que agrupa os cards -->
</div>

<!-- Adicione o link para o Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php include 'footer.php'; ?>

</body>
</html>
