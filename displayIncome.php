<?php
//Call for Database Connection
db();
//Assign returned connection variable to global variable instance
global $link;
$query = "SELECT * FROM income";
$result = mysqli_query($link, $query);
if(mysqli_num_rows($result) >= 1){
  while($row = mysqli_fetch_array($result)){
    $id =$row["id"];
    $title = $row["incomeTitle"];
    $time = $row["incomeTime"];
    $date = $row["incomeDate"];
    $income = $row["incomeTotal"];
    ?>
    <ul>
      <li class="li-invoice">
        <a href="detail.php?id=<?php echo $id?>" class="task-title"><?php echo "$title"?></a>
        <div class="li-invoice-span-div">
          <span><?php echo "\$$income";?></span>
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