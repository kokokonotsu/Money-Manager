<?php
//Call for Database Connection
db();
//Assign returned connection variable to global variable instance
global $link;
$query = "SELECT expenseTitle, expenseDescription, expenseTime, expenseDate, balanceAfterExpense FROM expense";
$result = mysqli_query($link, $query);
if(mysqli_num_rows($result) >= 1){
  while($row = mysqli_fetch_array($result)){
    $id =$row["id"];
    $title = $row["expenseTitle"];
    $time = $row["expenseTime"];
    $date = $row["expenseDate"];
    $expense = $row["balanceAfterExpense"];
    ?>
    <ul>
      <li>
      <a href="detail.php?id=<?php echo $id?>" class="task-title"><?php echo "$title"?></a>
      <span><?php echo "[$time]";?></span>
      <span><?php echo "[$date]";?></span>
      <span><?php echo "\$$expense";?>
      <button type="button" class="edit-button"><a href="update.php?id=<?php echo $id?>"><i class="fas fa-pen"></i></a></button>
      <button type="button"><a href="delete.php?id=<?php echo $id?>"><i class="fas fa-times"></i></a></button>
      </li>
    </ul>
    <?php
  }
}
?>