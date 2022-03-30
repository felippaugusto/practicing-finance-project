<?php
// header
include_once 'includes/includes-finance/header.php';
session_start();
// segurança
if(!isset($_SESSION['logado'])){
    header('Location: index.php');
}

?>

    <header>
        <h1>Financial Systen</h1>
        <div class="container-results">
            <div class="incomes">
                <p id="incomes">R$ 0.00</p>
                <img src="images/income.svg" alt="image-incomes" class="image-incomes">
            </div>
            <div class="expenses">
                <p id="expenses">R$ 0.00</p>
                <img src="images/expense.svg" alt="image-expenses" class="image-expenses">
            </div>
            <div class="total">
                <p id="total">R$ 0.00</p>
                <img src="images/total.svg" alt="">
            </div>
        </div>
    </header>

    <p class="add-transection">Adicionar transição +</p>

    <div class="container-modal">
        <div class="modal">
            <form action="">
                <label for="name">Nome </label>
                <input type="text" id="name" placeholder="Digite o nome aqui" name="name" required title="Luz, Gasolina, Salário ....">
                <label for="date">Date </label>
                <input type="date" name="date" id="date" required>
                <label for="value">Value </label>
                <input type="text" name="value" id="value" placeholder="Valor da sua receita/despesa" required>
                
                <div class="container-buttons">
                    <button type="submit" class="btn-submit" name="btn-submit">Enviar</button>
                    <a class="btn-cancel">Cancelar</a>
                </div>

            </form>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th class="name">Nome</th>
                <th>Data</th>
                <th>Valor</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="tbody">
        </tbody>
    </table>
    <a href="edit.php?id=<?php echo $_SESSION['id_usuario']; ?>" class="edit-account">Editar sua conta</a>
    <a href="logout.php" class="leave-page">Logout</a>
<?php
include_once 'includes/includes-finance/footer.php';
?>