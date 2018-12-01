<?php
    $query = "SELECT incomeTotal, incomeTime, incomeDate FROM income WHERE id = $editIncomeId";
    $result = mysqli_query($link, $query);
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        if($row){
            $editIncomeTotal = $row["incomeTotal"];
            $editIncomeTime = $row["incomeTime"];
            $editIncomeDate = $row["incomeDate"];
            echo '
        <div id="edit-income-modal" class="income-modal">
          <div class="modal-content">
            <div class="modal-header">
              <i class="material-icons close" id="edit-income-close">clear</i>
              <h1>Edit Income Form</h1>
            </div>
            <div class="modal-body">
              <form action="" method="post">
                <p class="modal-prompt">Income Entry ID: [' . $editIncomeId . ']</p>
                <p class="modal-prompt">Edit Income Total:</p>
                <input type="text" name="edit-income-total" id="edit-income-total" value=' . $editIncomeTotal . '>
                <p class="modal-prompt">Edit Income Time:</p>
                <input type="time" name="edit-income-time" id="edit-income-time" value=' . $editIncomeTime. '>
                <p class="modal-prompt">Edit Income Date:</p>
                <input type="date" name="edit-income-date" id="edit-income-date" value=' . $editIncomeDate . '>
                <input type="hidden" name="edit-income-form-hidden-id" id="edit-income-form-hidden-id" value="' . $editIncomeId . '">
                <input type="hidden" name="edit-income-form-hidden-total" id="edit-income-form-hidden-total" value="' . $editIncomeTotal. '">
                <input type="submit" name="edit-income-submit" id="edit-income-button" value="Edit Income">
              </form>
            </div>
          </div>
        </div>';
        } else {
            echo "No Expense Found";
        }
    }
?>