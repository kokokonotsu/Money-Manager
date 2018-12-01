<?php
    $newExpenseTitle = $_POST["edit-expense-title"];
    $newExpenseDescription = $_POST["edit-expense-description"];
    $newExpenseTotal = $_POST["edit-expense-total"];
    $newExpenseTime = $_POST["edit-expense-time"];
    $newExpenseDate = $_POST["edit-expense-date"];
    $editExpenseFormHiddenId = $_POST["edit-expense-form-hidden-id"];
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