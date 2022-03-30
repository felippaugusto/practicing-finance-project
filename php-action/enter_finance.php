<?php
include_once 'db_connect.php';
session_start();

// verifica se foi clicado o button submit
if(isset($_POST['submit-btn'])){
    // pegando o login e senha dos inputs
    $login = mysqli_escape_string($connect, $_POST['login']);
    $password = mysqli_escape_string($connect, $_POST['password']);

    // verificando se estão vazios
    if(empty($login) || empty($password)){
        $_SESSION['message'] = "Por favor preencher todos os campos !";
        header('Location: ../index.php');
    }
    else if($login === 'admin' && $password === 'admin') {
        $_SESSION['logadoAdmin'] = true;
        header('Location: ../admin.php');
    }
    else {
        $sql = "SELECT login FROM usuarios WHERE login = '$login'";
        // consultando o banco de dados
        $resultado = mysqli_query($connect, $sql);

        if(mysqli_num_rows($resultado) > 0){
            // senha criptografada
            $password = md5($password);

            // pegando todos os dados
            $sql = "SELECT * FROM usuarios WHERE password = '$password' AND login = '$login'";
            $resultado = mysqli_query($connect, $sql);

            // se for maior do que zero é por que existe algum registro 
            if(mysqli_num_rows($resultado) == 1){
                $dados = mysqli_fetch_array($resultado);
                mysqli_close($connect);

                // sessões criadas
                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] = $dados['id'];
                // redirecionando....
                header('Location: ../finance.php');
            }
            else {
               $_SESSION['message'] = "Senha incorreta!";
               header('Location: ../index.php');
            }
        }
        else {
            $_SESSION['message'] = "Login incorreto!";
            header('Location: ../index.php');
        }
    }
}
?>