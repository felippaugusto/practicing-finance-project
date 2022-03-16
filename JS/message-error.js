// container modal close with erros 
const btnOkay = document.querySelector(".btn-okay")

btnOkay.addEventListener("click", function() {
    const containerModal = document.querySelector(".container-modal")

    containerModal.classList.remove("active")
})