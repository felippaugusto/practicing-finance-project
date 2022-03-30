<?php
// db connection
include_once 'db_connect.php';

// starts sessions
session_start();

// checking inputs
function cleanInputs($input) {
    global $connect;
    // escape caracters specials
    $escapeString = mysqli_escape_string($connect, $input);
    // XSS
    $escapeScripts = htmlspecialchars($escapeString);
    
    return $escapeScripts;

}

if(isset($_POST['register-btn'])){
    $erros = array();

    // values inputs
    $name = cleanInputs($_POST['name']);
    $email = cleanInputs(($_POST['email']));
    $login = cleanInputs($_POST['login']);
    $password = cleanInputs($_POST['password']);

    // regular expressions
    $removedCharsSpecialsEmail = "/^[a-z0-9.\-\_]+@[a-z0-9.\-\_]+\.(com|br|com.br)$/i";
    $removedCharsSpecialsName = "/^[a-zA-ZÀ-Úà-ú ]+$/i";

    if(empty($name) || empty($login) || empty($password)){
        $_SESSION['message'] = "Preencha os campos importantes!";
        header('Location: ../register.php');
    }
    else if(!preg_match($removedCharsSpecialsEmail, $email) || !preg_match($removedCharsSpecialsName, $name)){
        $_SESSION['message'] = "Nome ou EMAIL incorreto!";
        header('Location: ../register.php');
    }
    else {
        // first letter uppercase
        $name = ucfirst($name);
        // encrypting password
        $password = md5($password);
        // registered user
        $sql = "INSERT INTO usuarios (nome, email, login, password) VALUES ('$name', '$email', '$login', '$password')";

        if(mysqli_query($connect, $sql)){
            $_SESSION['message'] = "Cadastrado com sucesso!";
            header('Location: ../index.php');
        }
        else {
            $_SESSION['message'] = "Erro ao cadastrar!";
            header('Location: ../index.php');
        }
    }

}