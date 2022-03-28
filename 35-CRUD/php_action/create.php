<?php
// conexão com o banco de dados
require_once 'db_connect.php';

// iniciando sessão
session_start();

if(isset($_POST['btn-cadastrar'])){
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $idade = mysqli_escape_string($connect, $_POST['idade']);
    
    // inserir na tabela clientes nos campos nome, sobrenome, email e idade, os valores das variáveis $nome, $sobrenome, $email, $idade
    $sql = "INSERT INTO clientes (nome, sobrenome, email, idade) VALUES ('$nome', '$sobrenome', '$email', '$idade')";

    // aqui ele executa a função de consulta com o banco de dados e se der true ele adiciona uma coluna ao banco de dados com nome, sobrenome, email e idade e ele redireciona para index.php aparecendo um sucesso na url também
    if(mysqli_query($connect, $sql)){
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('Location: ../index.php');
    }
    else {
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('Location: ../index.php');
    }
}
?>