// get values
const resultIncomes = document.querySelector("#incomes")
const resultExpenses = document.querySelector("#expenses")
const resultTotal = document.querySelector("#total")
const form = document.querySelector("form")
const inputName = document.querySelector("#name")
const inputDate = document.querySelector("#date")
const inputValue = document.querySelector("#value")
const tbody = document.querySelector("#tbody")
const addTransection = document.querySelector(".add-transection")
const containerModal = document.querySelector(".container-modal")
const btnCancel = document.querySelector(".btn-cancel")
// variables created
let formatValues;
let formatDate;

// adding form
addTransection.addEventListener("click", function() {
    const containerModal = document.querySelector(".container-modal")

    containerModal.classList.add("active")
})

// add submit
form.addEventListener("submit", function(e) {
    e.preventDefault()
    if(!isNaN(inputValue.value)){
    // get values inside inputs 
    const valueName = inputName.value
    const valueDate  = inputDate.value
    const valueTransection = Number(inputValue.value)

    const tr = document.createElement("tr")

    // adding in table
    tr.innerHTML = `<td>${valueName}</td>
                    <td>${utils.formatDate(valueDate)}</td>
                    <td>${utils.formatValues(valueTransection)}</td>
                    <td class="buttons-edit-delete"><img src="images/btn-editar.svg" alt="button-editar" class="btn-edit"> <img src="images/btn-excluir.svg" alt="button-excluir" class="btn-delete"></td>`
    tbody.appendChild(tr)

    incomesExpensesTotal(valueTransection)

    // clear inputs
    inputName.value = ""
    inputDate.value = ""
    inputValue.value = ""

    // remove class active
    containerModal.classList.remove("active")
    }
})

// functions formats
const utils = {
    formatValues(value){
        value = Number(value)
        formatValues = value.toLocaleString("pt-br", {style: 'currency', currency: 'BRL'})

        return formatValues
        
    },
    formatDate(valueDate) {
        formatDate = valueDate.split("-")

        return `${formatDate[2]}/${formatDate[1]}/${formatDate[0]}` 
    }// formats in value and date
}

// btn cancel transection
btnCancel.addEventListener("click", function() {
    containerModal.classList.remove("active")
    inputName.value = ""
    inputDate.value = ""
    inputValue.value = ""
})

// adding incomes, expenses and totals
let incomes = 0;
let expenses = 0;
let total = 0;
function incomesExpensesTotal(value) {
    
    if(value > 0) {
        incomes += value
        incomes.toFixed(2)
        resultIncomes.innerHTML = `${utils.formatValues(incomes)}`
    }
    else {
        expenses += value
        expenses.toFixed(2)
        resultExpenses.innerHTML = `${utils.formatValues(expenses)}`
    }

    total = incomes + expenses
    resultTotal.innerHTML = `${utils.formatValues(total)}`

    const boxOfTotal = document.querySelector(".total")

    if(total < 0){
        boxOfTotal.style.backgroundColor = "rgb(238, 127, 127)"
    }
    else if(total == 0){
        boxOfTotal.style.backgroundColor = "rgb(47, 155, 190)"
    }
    else {
        boxOfTotal.style.backgroundColor = "rgb(81, 190, 81)"
    }
}





