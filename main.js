var expenseModal = document.getElementById("expense-modal");
var expenseModalButton = document.getElementById("create-expense-modal-button");
var expenseClose = document.getElementById("expense-close");
var incomeModal = document.getElementById("income-modal");
var incomeModalButton = document.getElementById("create-income-modal-button");
var incomeClose = document.getElementById("income-close");
var balanceModal = document.getElementById("balance-modal");
var balanceModalButton = document.getElementById("set-balance-modal-button");
var balanceClose = document.getElementById("balance-close");
// var balance = document.getElementById("balance");
// var incomeButton = document.getElementById("income-submit-button");
// var expenseButton = document.getElementById("expense-submit-button");
// function balanceCheck() {
//     balance.innerHTML = "&lt;?php db(); global $link; $query = 'SELECT TotalBalance FROM balance'; $result = mysqli_query($link, $query); $row = mysqli_fetch_array($result); $balance = $row['TotalBalance']; \?&gt;";
// }
// window.addEventListener("load", balanceCheck);
// incomeButton.addEventListener("click", balanceCheck);
// expenseButton.addEventListener("click", balanceCheck);

//Add Event Listener for whenever user clicks "Add Expense" button
expenseModalButton.addEventListener("click", () => { expenseModal.style.display = "block"; });
//Add Event Listener for whenever user clicks the close button
expenseClose.addEventListener("click", () => {expenseModal.style.display = "none"; });
//Add Event Listener for whenever user clicks outside of the modal content to close modal
window.addEventListener("click", (event) => { if(event.target == expenseModal){ expenseModal.style.display = "none"; }; });

//Add Event Listener for whenever user clicks "Add Income" button
incomeModalButton.addEventListener("click", () => { incomeModal.style.display = "block"; });
//Add Event Listener for whenever user clicks the close button
incomeClose.addEventListener("click", () => {incomeModal.style.display = "none"; });
//Add Event Listener for whenever user clicks outside of the modal content to close modal
window.addEventListener("click", (event) => { if(event.target == incomeModal){ incomeModal.style.display = "none"; }; });

//Add Event Listener for whenever user clicks "Set Balance" button
balanceModalButton.addEventListener("click", () => { balanceModal.style.display = "block"; });
//Add Event Listener for whenever user clicks the close button
balanceClose.addEventListener("click", () => {balanceModal.style.display = "none"; });
//Add Event Listener for whenever user clicks outside of the modal content to close modal
window.addEventListener("click", (event) => { if(event.target == balanceModal){ balanceModal.style.display = "none"; }; });