<?php
session_start();

// Certifique-se de que o usuário esteja logado
if (isset($_SESSION['username'])) {
    // Conecte-se ao banco de dados
    require_once "includes/conexao.php";
    $pdo = new Conectar();
    
    // Selecione as informações do usuário
    $sql = "SELECT username, email, cep, telefone FROM loginclientes WHERE username = :username";
    
    if ($stmt = $pdo->prepare($sql)) {
        $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
        $param_username = $_SESSION['username'];
        
        if ($stmt->execute()) {
            if ($stmt->rowCount() == 1) {
                $row = $stmt->fetch();
                $username = $row['username'];
                $email = $row['email'];
                $cep = $row['cep'];
                $telefone = $row['telefone'];
            }
        }
        
        unset($stmt);
    }
    
    unset($pdo);
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Minha Conta</title>
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

<!-- NAVBAR -->
<?php include 'includes/header.php';?>

<h1 class="my-5">Oi, <b><?php echo htmlspecialchars($username); ?></b>. Bem-vindo ao CompletLar.</h1>

<p>
    <strong>Nome de Usuário:</strong> <?php echo htmlspecialchars($username); ?><br>
    <strong>Email:</strong> <?php echo htmlspecialchars($email); ?><br>
    <strong>CEP:</strong> <?php echo htmlspecialchars($cep); ?><br>
    <strong>Telefone:</strong> <?php echo htmlspecialchars($telefone); ?><br>
</p>


<p>
	<a href="reset_password.php" class="btn btn-warning">Redefina sua senha</a>
	<a href="logout.php" class="btn btn-danger ml-3">Sair da conta</a>
</p>
</body>
</html>