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
  <div class="balance-container"><h1 id="balance"><?php require("balance.php"); ?></h1></div>
<main class="main-container main-grid">
<div class="main-button-container">
  <input type="button" name="create-expense-modal-button" id="create-expense-modal-button" value="Add Expense">
  <input type="button" name="create-income-modal-button" id="create-income-modal-button" value="Add Income">
</div>
<?php
//Call for Database Connection
db();
//Assign returned connection variable to global variable instance
global $link;
$query = "SELECT id, expenseTitle, expenseDescription, expenseTime, expenseDate, balanceAfterExpense FROM expense";
$result = mysqli_query($link, $query);
if(mysqli_num_rows($result) >= 1){
  while($row = mysqli_fetch_array($result)){
    $id =$row["id"];
    $title = $row["expenseTitle"];
    $time = $row["expenseTime"];
    $date = $row["expenseDate"];
    $expense = $row["balanceAfterExpense"];
    ?>
    <ul>
      <li>
      <a href="detail.php?id=<?php echo $id?>" class="task-title"><?php echo "$title"?></a>
      <span><?php echo "[$time]";?></span>
      <span><?php echo "[$date]";?></span>
      <span><?php echo "\$$expense";?>
      <button type="button" class="edit-button"><a href="update.php?id=<?php echo $id?>"><i class="fas fa-pen"></i></a></button>
      <button type="button"><a href="delete.php?id=<?php echo $id?>"><i class="fas fa-times"></i></a></button>
      </li>
    </ul>
    <?php
  }
}
?>
<!-- </main>
<main class="main-done">
<p>Invoices</p>
</main> -->
</body>
<script src="main.js"></script>
<script>
if(window.history.replaceState){
  window.history.replaceState(null, null, window.location.href);
}
</script>
</html>


