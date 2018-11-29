<?php
        db();
        global $link;
        global $balance;
        $query = "SELECT * FROM balance";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
        $balance = $row["TotalBalance"];
        echo "$balance";
?>
<!-- <script type="text/javascript">
    var balance = document.getElementById("balance");
    var incomeButton = document.getElementById("income-submit-button");
    var expenseButton = document.getElementById("expense-submit-button");
    function balanceCheck() {
        balance.innerHTML = "&lt;?php db(); global $link; $query = 'SELECT TotalBalance FROM balance'; $result = mysqli_query($link, $query); $row = mysqli_fetch_array($result); $balance = $row['TotalBalance']; \?&gt;";
    }
    window.addEventListener("load", balanceCheck);
    incomeButton.addEventListener("click", balanceCheck);
    expenseButton.addEventListener("click", balanceCheck);
</script> -->