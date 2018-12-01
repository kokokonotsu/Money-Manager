<?php
    $newExpenseTitle = $_POST["edit-expense-title"];
    $newExpenseDescription = $_POST["edit-expense-description"];
    $newExpenseTotal = $_POST["edit-expense-total"];
    $newExpenseTime = $_POST["edit-expense-time"];
    $newExpenseDate = $_POST["edit-expense-date"];
    $oldExpenseTotal = $_POST["edit-expense-form-hidden-total"];
    $editExpenseFormHiddenId = $_POST["edit-expense-form-hidden-id"];
    $newBalanceTotal;
    $getBalanceQuery = "SELECT TotalBalance FROM balance";
    $getBalanceQueryResult = mysqli_query($link, $getBalanceQuery);
    $currentBalanceRow = mysqli_fetch_array($getBalanceQueryResult);
    $currentBalance = $currentBalanceRow["TotalBalance"];
    if($newExpenseTotal > $oldExpenseTotal){
        $newBalanceTotalSubtract = ($newExpenseTotal - $oldExpenseTotal);
        $newBalanceTotal = ($currentBalance - $newBalanceTotalSubtract);
        $newBalanceSubtractQuery = "UPDATE balance SET TotalBalance = '$newBalanceTotal' WHERE id = 1";
        $newBalanceSubtractQueryResult = mysqli_query($link, $newBalanceSubtractQuery);
        if(!$newBalanceSubtractQueryResult){
            echo mysqli_error();
        }
    } else if($newExpenseTotal < $oldExpenseTotal){
        $newBalanceTotalAdd = ($oldExpenseTotal - $newExpenseTotal);
        $newBalanceTotal = ($currentBalance + $newBalanceTotalAdd);
        $newBalanceAddQuery = "UPDATE balance SET TotalBalance = '$newBalanceTotal' WHERE id = 1";
        $newBalanceAddQueryResult = mysqli_query($link, $newBalanceAddQuery);
        if(!$newBalanceAddQueryResult){
            echo mysqli_error();
        }
    }
    $updateExpenseQuery = "UPDATE expense 
    SET expenseTitle = '$newExpenseTitle',
    expenseDescription = '$newExpenseDescription',
    expenseTime = '$newExpenseTime',
    expenseDate = '$newExpenseDate',
    expenseTotal = '$newExpenseTotal'
    WHERE id = $editExpenseFormHiddenId";
    $updateExpenseResult = mysqli_query($link, $updateExpenseQuery);
    if(!$updateExpenseResult){
        echo mysqli_error();
    }
?>