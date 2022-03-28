<?php
include_once 'includes/header.php';
include_once 'php_action/db_connect.php';

// aqui como o id passado é por url usaremos o get para pegar o id
if(isset($_GET['id'])){
    $id = mysqli_escape_string($connect, $_GET['id']);

    // ele vai pegar todos os campos do id clicado
    $sql = "SELECT * FROM clientes WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
}
?>

<!-- Adicionando clientes -->
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Editar cliente</h3>
        
        <form action="php_action/update.php" method="POST">
            <!-- usando esse input conseguimos mandar o id do usuário para update para ser usado no banco de dados-->
            <input type="hidden" value="<?php echo $dados['id']; ?>" name="id">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="<?php echo $dados['nome']; ?>">
                <label for="nome">Nome: </label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="sobrenome" id="sobrenome" value="<?php echo $dados['sobrenome']; ?>">
                <label for="sobrenome">Sobrenome: </label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="email" id="email" value="<?php echo $dados['email']; ?>">
                <label for="email">Email: </label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="idade" id="idade" value="<?php echo $dados['idade']; ?>">
                <label for="idade">Idade: </label>
            </div>

            <button type="submit" class="btn" name="btn-editar"> Atualizar </button>
            <a href="index.php" class="btn green"> Lista de Clientes</a>
        </form>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>
