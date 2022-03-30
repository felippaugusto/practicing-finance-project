<?php
// db connection
include_once 'db_connect.php';

// start sessions
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

if(isset($_POST['edit-btn'])){
    // values inputs
    $name = cleanInputs($_POST['name']);
    $email = cleanInputs(($_POST['email']));
    $login = cleanInputs($_POST['login']);

    $id = cleanInputs($_POST['id']);

    // regular expressions
    $removedCharsSpecialsEmail = "/^[a-z0-9.\-\_]+@[a-z0-9.\-\_]+\.(com|br|com.br)$/i";
    $removedCharsSpecialsName = "/^[a-zA-ZÀ-Úà-ú ]+$/i";


    if(empty($name) || empty($login)){
        $_SESSION['message'] = "Preencha os campos importantes!";
        header('Location: ../edit.php');
    }
    else if(!preg_match($removedCharsSpecialsEmail, $email)){
        $_SESSION['message'] = "EMAIL incorreto!";
        header('Location: ../edit.php');
    }
    else if(!preg_match($removedCharsSpecialsName, $name)){
        $_SESSION['message'] = "Nome incorreto!";
        header('Location: ../edit.php');
    }
    else {
        // first letter uppercase
        $name = ucfirst($name);
        // encrypting password
        $sql = "UPDATE usuarios SET nome = '$name', email = '$email', login = '$login' WHERE id = '$id'";

        if(mysqli_query($connect, $sql)){
            $_SESSION['message'] = "Atualizado com sucesso!";
            header('Location: ../index.php');
        }
        else {
            $_SESSION['message'] = "Erro ao atualizar!";
            header('Location: ../index.php');
        }
    }

}