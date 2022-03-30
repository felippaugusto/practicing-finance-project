<?php
// db connection
include_once 'php-action/db_connect.php';
// header
include_once 'includes/includes-default/header.php';
// message
include_once 'includes/message.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM usuarios WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
}
else {
    header('Location: index.php');
}

?>

<a href="finance.php" class="back-to-page-index"><?php $_SESSION['logado'] = true ?>Voltar</a>

<div class="container-center">
        <div class="container-left">
            <h1 class="header"><p>EDITANDO SUA CONTA</p></h1>
            <div class="box-astronauta">
                <img src="images/astrounata.png" alt="astronauta" class="astronauta">
            </div>
        </div>

        <form action="php-action/update.php" class="form register" method="POST">
            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
            <label for="name">Primeiro Nome</label>
            <input type="text" name="name" id="name" title="Seu nome, por favor..." value="<?php echo $dados['nome']; ?>">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" title="Seu email, por favor..." value="<?php echo $dados['email']; ?>">
            <label for="login">Login</label>
            <input type="text" name="login" id="login" title="Digite seu login de entrada" value="<?php echo $dados['login'] ?>">
            <!-- <label for="password">password</label>
            <input type="password" name="password" id="password" value="<?php // echo $dados['password']; ?>"> 
            retirar o md5 e usar o password hash -->
            <button type="submit" class="submit-btn register" name="edit-btn">Editando</button>
        </form>
    </div>
<?php
// footer
include_once 'includes/includes-default/footer.php';
?>