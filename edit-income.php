<?php
    $newIncomeTotal = $_POST["edit-income-total"];
    $newIncomeTime = $_POST["edit-income-time"];
    $newIncomeDate = $_POST["edit-income-date"];
    $oldIncomeTotal = $_POST["edit-income-form-hidden-total"];
    $editIncomeFormHiddenId = $_POST["edit-income-form-hidden-id"];
    $newBalanceTotal;
    $getBalanceQuery = "SELECT TotalBalance FROM balance";
    $getBalanceQueryResult = mysqli_query($link, $getBalanceQuery);
    $currentBalanceRow = mysqli_fetch_array($getBalanceQueryResult);
    $currentBalance = $currentBalanceRow["TotalBalance"];
    if($newIncomeTotal > $oldIncomeTotal){
        $newBalanceTotalSubtract = ($newIncomeTotal - $oldIncomeTotal);
        $newBalanceTotal = ($currentBalance - $newBalanceTotalSubtract);
        $newBalanceSubtractQuery = "UPDATE balance SET TotalBalance = '$newBalanceTotal' WHERE id = 1";
        $newBalanceSubtractQueryResult = mysqli_query($link, $newBalanceSubtractQuery);
        if(!$newBalanceSubtractQueryResult){
            echo mysqli_error();
        }
    } else if($newIncomeTotal < $oldIncomeTotal){
        $newBalanceTotalAdd = ($oldIncomeTotal - $newIncomeTotal);
        $newBalanceTotal = ($currentBalance + $newBalanceTotalAdd);
        $newBalanceAddQuery = "UPDATE balance SET TotalBalance = '$newBalanceTotal' WHERE id = 1";
        $newBalanceAddQueryResult = mysqli_query($link, $newBalanceAddQuery);
        if(!$newBalanceAddQueryResult){
            echo mysqli_error();
        }
    }
    $updateIncomeQuery = "UPDATE income 
    SET incomeTotal = '$newIncomeTotal',
    incomeTime = '$newIncomeTime',
    incomeDate = '$newIncomeDate'
    WHERE id = $editIncomeFormHiddenId";
    $updateIncomeResult = mysqli_query($link, $updateIncomeQuery);
    if(!$updateIncomeResult){
        echo mysqli_error();
    }
?>