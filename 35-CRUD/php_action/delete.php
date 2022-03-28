<?php
// conexão com o banco de dados
require_once 'db_connect.php';

// iniciando sessão
session_start();

if(isset($_POST['btn-deletar'])){
    // aqui ele está pegando o id do input hidden
    $id = mysqli_escape_string($connect, $_POST['id']);
    
    $sql = "DELETE FROM clientes WHERE id = '$id'";

    if(mysqli_query($connect, $sql)){
        $_SESSION['mensagem'] = "Registro deletado com sucesso!";
        header('Location: ../index.php');
    }
    else {
        $_SESSION['mensagem'] = "Erro ao Deletar o registro!";
        header('Location: ../index.php');
    }
}
?>