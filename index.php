<?php
include_once 'php-action/db_connect.php';
include_once 'includes/includes-index/header.php';

session_start();

// verifica se foi clicado o button submit
if(isset($_POST['submit-btn'])){
    // criando a variável de erros
    $erros = array();

    // pegando o login e senha dos inputs
    $login = mysqli_escape_string($connect, $_POST['login']);
    $password = mysqli_escape_string($connect, $_POST['password']);

    // verificando se estão vazios
    if(empty($login) || empty($password)){
        $erros[] = "Por favor preencher todos os campos !";
        // aqui para mostrar, usar um script que mostre em uma caixa flutuante a mensagem
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
                header('Location: finance.php');
            }
            else {
               $erros[] = "Senha incorreta!";
            }
        }
        else {
            $erros[] = "Login incorreto!";
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
<body>

    <a href="cadastrar.php" class="button-cadastrar">Não se cadastrou ainda? Clique aqui!</a>
    <div class="container-center">
        <div class="container-left">
            <h1 class="header"><p>Bem vindo ao seu sistema financeiro</p></h1>
            <div class="box-astronauta">
                <img src="images/astrounata.png" alt="astronauta" class="astronauta">
            </div>
        </div>
        <form method="post" class="form">
            <label for="login">Login</label>
            <input type="text" name="login" id="login" title="Seu login, por favor...">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" title="Sua senha, por favor...">
            <button type="submit" class="submit-btn" name="submit-btn">Entrar</button>
        </form>
    </div>
<?php
if(!empty($erros)){
    foreach($erros as $erro){
        echo "";
    }
}
?>

<?php
include_once 'includes/includes-index/footer.php'
?>

