<?php
    $query = "SELECT expenseTitle, expenseDescription, expenseTime, expenseDate, expenseTotal FROM expense WHERE id = $editId";
    $result = mysqli_query($link, $query);
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        if($row){
            $editExpenseTitle = $row["expenseTitle"];
            $editExpenseDescription = $row["expenseDescription"];
            $editExpenseTime = $row["expenseTime"];
            $editExpenseDate = $row["expenseDate"];
            $editExpenseTotal = $row["expenseTotal"];
            echo '
            <div id="edit-expense-modal" class="expense-modal">
            <div class="modal-content">
            <div class="modal-header">
              <i class="material-icons close" id="edit-expense-close">clear</i>
              <h1>Edit Expense Form</h1>
            </div>
            <div class="modal-body">
              <form action="" method="post">
                <p class="modal-prompt">Expense Entry ID: [' . $editId . ']</p>
                <p class="modal-prompt">Edit Expense Title:</p>
                <input type="text" name="edit-expense-title" id="edit-expense-title" value="' . $editExpenseTitle . '">
                <p class="modal-prompt">Edit Expense Description:</p>
                <input type="text" name="edit-expense-description" id="edit-expense-description" value="' . $editExpenseDescription . '">
                <p class="modal-prompt">Edit Expense Total:</p>
                <input type="text" name="edit-expense-total" id="edit-expense-total" value="' . $editExpenseTotal . '">
                <p class="modal-prompt">Edit Expense Time:</p>
                <input type="time" name="edit-expense-time" id="edit-expense-time" value="' . $editExpenseTime . '">
                <p class="modal-prompt">Edit Expense Date:</p>
                <input type="date" name="edit-expense-date" id="edit-expense-date" value="' . $editExpenseDate . '">
                <input type="hidden" name="edit-expense-form-hidden-id" id="edit-expense-form-hidden-id" value="' . $editId . '">
                <input type="hidden" name="edit-expense-form-hidden-total" id="edit-expense-form-hidden-total" value="' . $editExpenseTotal . '">
                <input type="submit" name="edit-expense-submit" id="edit-expense-button" value="Edit Expense">
              </form>
            </div>
          </div>
        </div>';
        } else {
            echo "No Expense Found";
        }
    }
?>