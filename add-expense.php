<?php 
  if(isset($_POST['expense-submit'])){
    $expenseTitle = $_POST["expenseTitle"];
    $expenseDescription = $_POST["expenseDescription"];
    $expenseTotal = $_POST["expenseTotal"];
    $expenseTime = $_POST["expenseTime"];
    $expenseDate = $_POST["expenseDate"];
    function check($string){
      $string  = htmlspecialchars($string);
      $string = strip_tags($string);
      $string = trim($string);
      $string = stripslashes($string);
      return $string;
    }
    if(empty($expenseTitle)){
      $error = true;
      $expenseTitleErrorMessage = "Must include an Expense Title";
    }
    if(empty($expenseTotal)){
      $error = true;
      $expenseTotalErrorMessage = "Must include an Expense Amount";
    }
    db();
    global $link;
    $query_expense = "INSERT INTO expense(expenseTitle, expenseDescription, expenseTime, expenseDate, expenseTotal) VALUES('$expenseTitle', '$expenseDescription', '$expenseTime', '$expenseDate', '$expenseTotal')";
    $result_expense = mysqli_query($link, $query_expense);
    if(!$result_expense){
      echo mysqli_error();
    }
    $balanceExpenseQuery = "SELECT TotalBalance FROM balance";
    $balanceExpenseResult = mysqli_query($link, $balanceExpenseQuery);
    $balanceExpenseRow = mysqli_fetch_array($balanceExpenseResult);
    $balanceExpenseAmount = $balanceExpenseRow["TotalBalance"];
    $balance_expense = $balanceExpenseAmount - $expenseTotal;
    $insertBalanceExpense = "REPLACE INTO balance VALUES (1, '$balance_expense')";
    $insertBalanceExpenseResult = mysqli_query($link, $insertBalanceExpense);
    if(!$insertBalanceExpenseResult){
      echo("No Balance Result");
    }
  }
?>