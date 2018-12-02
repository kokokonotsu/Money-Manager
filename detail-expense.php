<?php
$query = "SELECT expenseTitle, expenseDescription, expenseTime, expenseDate, expenseTotal FROM expense WHERE id = $detailId";
$result = mysqli_query($link, $query);
if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_array($result);
    if($row){
        $detailExpenseTitle = $row["expenseTitle"];
        $detailExpenseDescription = $row["expenseDescription"];
        $detailExpenseTime = $row["expenseTime"];
        $detailExpenseDate = $row["expenseDate"];
        $detailExpenseTotal = $row["expenseTotal"];
echo '<div id="detail-modal" class="detail-modal">
        <div class="modal-content">
          <div class="modal-header">
            <i class="material-icons close" id="detail-close">clear</i>
            <h1>Details for Expense: [' . $detailId . ']</h1>
          </div>
          <div class="modal-body">
            <div class="expense-detail-container">
                <div class="expense-detail"><p class="modal-prompt">Entry ID: <div class="expense-detail-value">' . $detailId . '</div></p></div>
                <div class="expense-detail"><p class="modal-prompt">Entry Title: <div class="expense-detail-value">' . $detailExpenseTitle . '</div></p></div>
                <div class="expense-detail"><p class="modal-prompt">Entry Description: <div class="expense-detail-value">' . $detailExpenseDescription . '</div></p></div>
                <div class="expense-detail"><p class="modal-prompt">Entry Time: <div class="expense-detail-value">' . $detailExpenseTime . '</div></p></div>
                <div class="expense-detail"><p class="modal-prompt">Entry Date: <div class="expense-detail-value">' . $detailExpenseDate . '</div></p></div>
                <div class="expense-detail"><p class="modal-prompt">Entry Total: <div class="expense-detail-value">' . $detailExpenseTotal . '</div></p></div>
            </div>
        </div>
        </div>
      </div>
  </div>';
    } else {
        echo "No Entry Found";
    }
}
?>