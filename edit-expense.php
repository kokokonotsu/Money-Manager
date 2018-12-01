<?php
    $newExpenseTitle = $_POST["edit-expense-title"];
    $newExpenseDescription = $_POST["edit-expense-description"];
    $newExpenseTotal = $_POST["edit-expense-total"];
    $newExpenseTime = $_POST["edit-expense-time"];
    $newExpenseDate = $_POST["edit-expense-date"];
    $updateExpenseQuery = "UPDATE expense 
    SET expenseTitle = '$newExpenseTitle',
    expenseDescription = '$newExpenseDescription',
    expenseTime = '$newExpenseTime',
    expenseDate = '$newExpenseDate',
    expenseTotal = '$newExpenseTotal'
    WHERE id = $editId";
    $updateExpenseResult = mysqli_query($link, $updateExpenseQuery);
?>