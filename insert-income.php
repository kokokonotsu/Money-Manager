$balanceQuery = "SELECT TotalBalance FROM balance";
$balanceResult = mysqli_query($link, $balanceQuery);
$balanceRow = mysqli_fetch_array($balanceResult);
$balanceAmount = $balanceRow["TotalBalance"];
$balance = $balanceAmount + $incomeTotal;
$insertBalance = "REPLACE INTO balance VALUES (1, '$balance')";
mysqli_query($link, $insertBalance);