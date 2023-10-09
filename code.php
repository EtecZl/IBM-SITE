<?php
session_start();
$con = mysqli_connect("localhost","root","","funvildevendas");

if(isset($_POST['update_stud_data']))
{
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cep = $_POST['cep'];
    $senha = $_POST['senha'];

    $query = "UPDATE usuarios SET  email='$email', cep='$cep', senha='$senha' WHERE nome='$nome' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Data Updated Successfully";
        header("Location: Atualizar.php");
    }
    else
    {
        $_SESSION['status'] = "Not Updated";
        header("Location: Atualizar.php");
    }
}

?>