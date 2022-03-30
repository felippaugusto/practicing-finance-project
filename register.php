<?php
// header
include_once 'includes/includes-default/header.php';
include_once 'includes/message.php';
?>

<a href="index.php" class="back-to-page-index">Voltar</a>

<div class="container-center">
        <div class="container-left">
            <h1 class="header"><p>Por favor, seja um de nossos clientes</p></h1>
            <div class="box-astronauta">
                <img src="images/astrounata.png" alt="astronauta" class="astronauta">
            </div>
        </div>

        <form action="php-action/create.php" class="form register" method="POST">
            <label for="name">Primeiro Nome</label>
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
// footer
include_once 'includes/includes-default/footer.php';
?>