<?php require("db_connect.php"); ?>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>To-Do Task List</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" media="screen" href="Assets/styles.css" />
</head>
<body class="grid-index">
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
          <input type="submit" name="expense-submit" id="expense-submit-button">
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
            <input type="submit" name="income-submit" id="income-submit-button">
          </form>
        </div>
      </div>
    </div>
  <header>
    <h1>Money Manager</h1>
  </header>
  <div class="balance-container"><h1 id="balance">Balance: [<?php require("balance.php"); ?>]</h1></div>
  <div class="main-button-container">
    <input type="button" name="create-expense-modal-button" id="create-expense-modal-button" value="Add Expense">
    <input type="button" name="create-income-modal-button" id="create-income-modal-button" value="Add Income">
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
<?php 
  if(isset($_POST['expense-submit'])){
    $expenseTitle = $_POST["expenseTitle"];
    $expenseDescription = $_POST["expenseDescription"];
    $expenseTotal = $_POST["expenseTotal"];
    $expenseTime = $_POST["expenseTime"];
    $expenseDate = $_POST["expenseDate"];
    db();
    global $link;
    $query_expense = "INSERT INTO expense(expenseTitle, expenseDescription, expenseTime, expenseDate) VALUES('$expenseTitle', '$expenseDescription', '$expenseTotal', '$expenseTime', '$expenseDate')";
    $result_expense = mysqli_query($link, $query_expense);
    if(!$result_expense){
      echo mysqli_error();
    }
    $balanceQuery = "SELECT TotalBalance FROM balance";
    $balanceResult = mysqli_query($link, $balanceQuery);
    $balanceRow = mysqli_fetch_array($balanceResult);
    $balanceAmount = $balanceRow["TotalBalance"];
    $balance_expense = $balanceAmount - $;
    $insertBalanceExpense = "REPLACE INTO balance VALUES (1, '$balance')";
    $insertBalanceExpenseResult = mysqli_query($link, $insertBalanceExpense);
    if(!$insertBalanceExpenseResult){
      echo("No Balance Result");
    }
  }
?>
<?php
if(isset($_POST["income-submit"])){
  $incomeTotal = $_POST["incomeTotal"];
  $incomeTime = $_POST["incomeTime"];
  $incomeDate = $_POST["incomeDate"];
  $query_income = "INSERT INTO income(incomeTotal, incomeTime, incomeDate) VALUES ('$incomeTotal', '$incomeTime', '$incomeDate')";
  $result_income = mysqli_query($link, $query_income);
  if(!$result_income){
    echo mysqli_error();
  }
  $balance = $balanceAmount + $incomeTotal;
  $insertBalanceIncome = "REPLACE INTO balance VALUES (1, '$balance')";
  $insertBalanceIncomeResult = mysqli_query($link, $insertBalanceIncome);
  if(!$insertBalanceIncomeResult){
    echo("No Balance Result");
  }
}
?>
<script src="main.js"></script>
<script>
if(window.history.replaceState){
  window.history.replaceState(null, null, window.location.href);
}
</script>
</html>


