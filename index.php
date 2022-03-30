<?php
// db conection
include_once 'php-action/db_connect.php';
// header
include_once 'includes/includes-default/header.php';
// message
include_once 'includes/message.php';
?>
<body>
    <a href="register.php" class="button-cadastrar">Não se cadastrou ainda? Clique aqui!</a>
    <div class="container-center">
        <div class="container-left">
            <h1 class="header"><p>Bem vindo ao seu sistema financeiro</p></h1>
            <div class="box-astronauta">
                <img src="images/astrounata.png" alt="astronauta" class="astronauta">
            </div>
        </div>
        <form action="php-action/enter_finance.php" method="post" class="form">
            <label for="login">Login</label>
            <input type="text" name="login" id="login" title="Seu login, por favor...">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" title="Sua senha, por favor...">
            <button type="submit" class="submit-btn" name="submit-btn">Entrar</button>
        </form>
    </div>
<?php
?>

<?php
// footer
include_once 'includes/includes-default/footer.php'
?>

