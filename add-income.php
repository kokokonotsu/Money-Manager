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
  $balanceIncomeQuery= "SELECT TotalBalance FROM balance";
  $balanceIncomeResult = mysqli_query($link, $balanceIncomeQuery);
  $balanceIncomeRow = mysqli_fetch_array($balanceIncomeResult);
  $balanceIncomeAmount = $balanceIncomeRow["TotalBalance"];
  $balance_income = $balanceIncomeAmount + $incomeTotal;
  $insertBalanceIncome = "REPLACE INTO balance VALUES (1, '$balance_income')";
  $insertBalanceIncomeResult = mysqli_query($link, $insertBalanceIncome);
  if(!$insertBalanceIncomeResult){
    echo("No Balance Result");
  }
}
?>