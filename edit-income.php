<?php
    $newIncomeTotal = $_POST["edit-income-total"];
    $newIncomeTime = $_POST["edit-income-time"];
    $newIncomeDate = $_POST["edit-income-date"];
    $editIncomeFormHiddenId = $_POST["edit-income-form-hidden-id"];
    $oldIncomeTotal = $_POST["edit-income-form-hidden-total"];
    $newBalanceIncomeTotal;
    $getBalanceQuery = "SELECT TotalBalance FROM balance";
    $getBalanceQueryResult = mysqli_query($link, $getBalanceQuery);
    $currentBalanceRow = mysqli_fetch_array($getBalanceQueryResult);
    $currentBalanceIncome = $currentBalanceRow["TotalBalance"];
    if($newIncomeTotal > $oldIncomeTotal){
        $newBalanceTotalSubtract = ($newIncomeTotal - $oldIncomeTotal);
        $newBalanceIncomeTotal = ($currentBalanceIncome + $newBalanceTotalSubtract);
        $newBalanceSubtractQuery = "UPDATE balance SET TotalBalance = '$newBalanceIncomeTotal' WHERE id = 1";
        $newBalanceSubtractQueryResult = mysqli_query($link, $newBalanceSubtractQuery);
        if(!$newBalanceSubtractQueryResult){
            echo mysqli_error();
        }
    } else if($newIncomeTotal < $oldIncomeTotal){
        $newBalanceTotalAdd = ($oldIncomeTotal - $newIncomeTotal);
        $newBalanceIncomeTotal = ($currentBalanceIncome - $newBalanceTotalAdd);
        $newBalanceAddQuery = "UPDATE balance SET TotalBalance = '$newBalanceIncomeTotal' WHERE id = 1";
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