var expenseModal = document.getElementById("expense-modal");
var expenseModalButton = document.getElementById("create-expense-modal-button");
var expenseClose = document.getElementById("expense-close");

//Add Event Listener for whenever user clicks "Add Expense" button
expenseModalButton.addEventListener("click", () => { expenseModal.style.display = "block"; });
//Add Event Listener for whenever user clicks the close button
expenseClose.addEventListener("click", () => {expenseModal.style.display = "none"; });
//Add Event Listener for whenever user clicks outside of the modal content to close modal
window.addEventListener("click", (event) => { if(event.target == expenseModal){ expenseModal.style.display = "none"; }; });

var incomeModal = document.getElementById("income-modal");
var incomeModalButton = document.getElementById("create-income-modal-button");
var incomeClose = document.getElementById("income-close");