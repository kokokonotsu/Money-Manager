<?php
if(isset($_POST["balance-submit"])){
  $initialBalance = $_POST["initialBalance"];
  $setBalanceQuery = "REPLACE INTO balance VALUES (1, '$initialBalance')";
  $setBalanceResult = mysqli_query($link, $setBalanceQuery);
  if(!$setBalanceResult){
    echo mysqli_error();
  }
}
?>