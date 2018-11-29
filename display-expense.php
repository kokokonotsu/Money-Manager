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
      <li class="li-expense">
        <a href="detail.php?id=<?php echo $id?>" class="task-title"><?php echo "$title"?></a>
        <div class="li-expense-span-div">
          <span><?php echo "\$$expense";?></span>
          <span><?php echo "[$time]";?></span>
          <span><?php echo "[$date]";?></span>
        </div>
        <button type="button" class="edit-button"><a href="update.php?id=<?php echo $id?>"><i class="fas fa-pen"></i></a></button>
        <button type="button"><a href="delete.php?id=<?php echo $id?>"><i class="fas fa-times"></i></a></button>
      </li>
    </ul>
    <?php
  }
}
?>