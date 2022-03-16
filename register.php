<?php
include_once 'includes/includes-index-and-register/header.php';
include_once 'php-action/db_connect.php';

if(isset($_POST['register-btn'])){
    $erros = array();

    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $login = mysqli_real_escape_string($connect, $_POST['login']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    if(empty($name) || empty($login) || empty($password)){
        $erros[] = "Preencha todos os campos importantes!";
    }
    else {
        $password = md5($password);
        $sql = "INSERT INTO usuarios (nome, email, login, password) VALUES ('$name', '$email', '$login', '$password')";

        if(mysqli_query($connect, $sql)){
        header('Location: index.php');
        }
        else {
        $erros[] = "Não foi possível cadastrar!";
        }
    }

}

if(!empty($erros)){
    foreach($erros as $erro){
        echo '<div class="container-modal active">
        <div class="modal">
           <p class="paragraph-modal">',$erro,'</p>
           <button class="btn-okay">Tentar novamente</button>
        </div>
    </div>';
    }
}

?>

<a href="index.php" class="back-to-page-index">Voltar</a>

<div class="container-center">
        <div class="container-left">
            <h1 class="header"><p>Por favor, seja um de nossos clientes</p></h1>
            <div class="box-astronauta">
                <img src="images/astrounata.png" alt="astronauta" class="astronauta">
            </div>
        </div>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form register" method="POST">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" title="Seu nome, por favor...">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" title="Seu email, por favor...">
            <label for="login">Login</label>
            <input type="text" name="login" id="login" title="Digite seu login de entrada">
            <label for="password">password</label>
            <input type="password" name="password" id="password">
            <button type="submit" class="submit-btn register" name="register-btn">Cadastrar</button>
        </form>
    </div>
<?php
include_once 'includes/includes-index-and-register/footer.php';
?>