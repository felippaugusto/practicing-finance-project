<?php
session_start();

if(!isset($_SESSION['logado'])){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Systen</title>
    <link rel="stylesheet" href="CSS/finance.css">
</head>
<body>
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
            <tr>
                <td>Gasolina</td>
                <td>12/04/2022</td>
                <td>R$ 150.54</td>
                <td class="buttons-edit-delete"><img src="images/btn-editar.svg" alt="button-editar" class="btn-edit"> <img src="images/btn-excluir.svg" alt="button-excluir" class="btn-delete"></td>
            </tr>
        </tbody>
    </table>
    <a href="logout.php" class="leave-page">Logout</a>
    <script src="JS/script.js"></script>
</body>
</html>