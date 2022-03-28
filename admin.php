<?php
include_once 'php-action/db_connect.php';
include_once 'includes/includes-admin/header.php';

session_start();

if(!isset($_SESSION['logado'])){
    header('Location: index.php');
}
?>
<a href="logout.php" class="back-to-page-index">VOLTAR</a>

    <h1>LISTA DE CLIENTES</h1>

<table>
    <thead>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>LOGIN</th>
        <th>ID</th>
    </thead>
    <tbody>
        <?php
            $sql = "SELECT * FROM usuarios";
            $resultado = mysqli_query($connect, $sql);

            if(mysqli_num_rows($resultado) > 0):

                while($dados = mysqli_fetch_array($resultado)):
        ?>
    <tr>
        <td><?php echo $dados['nome']; ?></td>
        <td><?php echo $dados['email']; ?></td>
        <td><?php echo $dados['login']; ?></td>
        <td><?php echo $dados['id']; ?></td>
    </tr>

    <?php 
    endwhile;
    else:
    ?>
    <tr>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
    </tr>
    <?php endif; ?>
    </tbody>
</table>
<?php
include_once 'includes/includes-default/footer.php';
?>