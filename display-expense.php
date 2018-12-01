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
        <a href="detail.php?id=<?php echo $id?>" class="task-title"><?php echo "$title"?></a>
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
}
?>
<?php 
if(isset($_POST["expense-delete-button"])){
  $deleteId = $_POST["expense-delete-hidden-id"];
  require("delete-expense.php");
}
?>