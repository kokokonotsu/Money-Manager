<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Money Manager
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" media="screen" href="Assets/styles.css" />
</head>
<body class="grid-index">
  <footer>
    <?php require("db_connect.php"); ?>
  </footer>
  <div class="error-modal-container">
    <?php require("add-expense.php"); ?>
    <?php require("add-income.php"); ?>
    <?php require("set-balance.php"); ?>
  </div>
  <div class="detail-modal-container">
    <?php if(isset($_POST["expense-detail-submit"])){
      $detailId = $_POST["expense-detail-hidden-id"];
      require("detail-expense.php");
    }
    ?>
  </div>
  <div id="expense-modal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <i class="material-icons close" id="expense-close">clear</i>
        <h1>Add Expense Form</h1>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <p class="modal-prompt">Expense Title:</p>
          <input type="text" name="expenseTitle" id="expenseTitleInput">
          <p class="modal-prompt">Expense Description:</p>
          <input type="text-area" name="expenseDescription" id="expenseDescriptionInput">
          <p class="modal-prompt">Total Expense:</p>
          <input type="text" name="expenseTotal" id="expenseTotalInput">
          <p class="modal-prompt">Time of Expense:</p>
          <input type="time" name="expenseTime" id="expenseTimeInput">
          <p class="modal-prompt">Date of Expense:</p>
          <input type="date" name="expenseDate" id="expenseDateInput">
          <input type="submit" name="expense-submit" id="expense-submit-button" value="Add Expense">
        </form>
      </div>
    </div>
  </div>
  <div id="income-modal" class="modal">
      <div class="modal-content">
        <div class="modal-header">
          <i class="material-icons close" id="income-close">clear</i>
          <h1>Add Income Form</h1>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <p class="modal-prompt">Total Income:</p>
            <input type="text" name="incomeTotal" id="incomeTotalInput">
            <p class="modal-prompt">Time of Income:</p>
            <input type="time" name="incomeTime" id="incomeTimeInput">
            <p class="modal-prompt">Date of Income:</p>
            <input type="date" name="incomeDate" id="incomeDateInput">
            <input type="submit" name="income-submit" id="income-submit-button" value="Add Income">
          </form>
        </div>
      </div>
    </div>
  <div id="balance-modal" class="modal">
        <div class="modal-content">
          <div class="modal-header">
            <i class="material-icons close" id="balance-close">clear</i>
            <h1>Set Initial Balance Form</h1>
          </div>
          <div class="modal-body">
            <form action="" method="post">
              <p class="modal-prompt">Initial Balance:</p>
              <input type="text" name="initialBalance" id="initialBalance">
              <input type="submit" name="balance-submit" id="balance-submit-button" value="Set Balance">
            </form>
          </div>
        </div>
      </div>
<div class="edit-expense-modal-container">
<?php 
if(isset($_POST["expense-edit-button"])){
  $editId = $_POST["expense-edit-hidden-id"];
  require("edit-expense-form.php");}
if(isset($_POST["edit-expense-submit"])){
  require("edit-expense.php");
}
?>
</div>
<div class="edit-income-modal-container">
<?php
if(isset($_POST["income-edit-button"])){
  $editIncomeId = $_POST["income-edit-hidden-id"];
  require("edit-income-form.php");}
if(isset($_POST["edit-income-submit"])){
  require("edit-income.php");
}

?> 
</div>
  <header>
    <h1>Money Manager</h1>
  </header>
  <div class="balance-container"><h1 id="balance">Balance: [<?php require("balance.php"); ?>]</h1></div>
  <div class="main-button-container">
    <input type="button" name="create-income-modal-button" id="create-income-modal-button" value="Add Income">
    <input type="button" name="set-balance-modal-button" id="set-balance-modal-button" value="Set Initial Balance">
    <input type="button" name="create-expense-modal-button" id="create-expense-modal-button" value="Add Expense">
  </div>
<main class="main-container main-expense">
<p class="main-title">Expenses</p>
  <?php require("display-expense.php"); ?>
</main>
<main class="main-container main-income">
<p class="main-title">Income</p>
  <?php require("display-income.php"); ?>
</main>
</body>
<script src="main.js"></script>
<script>
if(window.history.replaceState){
  window.history.replaceState(null, null, window.location.href);
}
</script>
</html>


