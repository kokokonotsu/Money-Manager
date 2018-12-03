<?php
//Call for Database Connection
db();
//Assign returned connection variable to global variable instance
global $link;
$query = "SELECT * FROM expense";
$result = mysqli_query($link, $query);
if(mysqli_num_rows($result) >= 1){
  while($row = mysqli_fetch_array($result)){
    $id =$row["id"];
    $title = $row["expenseTitle"];
    $time = $row["expenseTime"];
    $date = $row["expenseDate"];
    $expense = $row["expenseTotal"];
    ?>
    <ul>
      <li class="li-invoice">
        <form class="list-item-title-form" action="" method="post">
          <input type="hidden" name="expense-detail-hidden-id" id="expense-detail-hidden-id" value="<?php echo $id ?>">
          <input type="submit" class="list-item-title-button" name="expense-detail-submit" id="expense-detail-submit-button" value="<?php echo "$title"?>">
        </form>
        <div class="li-invoice-span-div">
          <span><?php echo "\$$expense";?></span>
          <span><?php echo "[$time]";?></span>
          <span><?php echo "[$date]";?></span>
        </div> 
        <form class="expense-edit-form" action="" method="post">
          <input type="hidden" name="expense-edit-hidden-id" id="expense-edit-hidden-id" value="<?php echo $id ?>">
          <input type="submit" name="expense-edit-button" class="expense-edit-submit-button" value="&#xf304;">
        </form>
        <form class="expense-delete-form" action="" method="post">
          <input type="hidden" name="expense-delete-hidden-id" id="expense-delete-hidden-id" value="<?php echo $id ?>">
          <input type="submit" name="expense-delete-button" class="expense-delete-submit-button" value="&#xf00d;">
        </form>
      </li>
    </ul>
    <?php
  }
} else if(mysqli_num_rows($result) == 0){
  $resetAiQuery = "ALTER TABLE expense AUTO_INCREMENT = 1";
  $resultAiQuery = mysqli_query($link, $resetAiQuery);
}
?>
<?php 
if(isset($_POST["expense-delete-button"])){
  $deleteId = $_POST["expense-delete-hidden-id"];
  require("delete-expense.php");
}
?>