<?php
//Call for Database Connection
db();
//Assign returned connection variable to global variable instance
global $link;
$query = "SELECT * FROM income";
$result = mysqli_query($link, $query);
if(mysqli_num_rows($result) >= 1){
  while($row = mysqli_fetch_array($result)){
    $incomeId =$row["id"];
    $income = $row["incomeTotal"];
    $time = $row["incomeTime"];
    $date = $row["incomeDate"];
    ?>
    <ul class="income-ul">
      <li class="li-invoice">
        <div class="li-invoice-span-div">
          <span><?php echo "\$$income";?></span>
          <span><?php echo "[$time]";?></span>
          <span><?php echo "[$date]";?></span>
        </div>
        </li>
        <div class="ul-form-container">
          <form class="income-edit-form" action="" method="post">
            <input type="hidden" name="income-edit-hidden-id" id="income-edit-hidden-id" value="<?php echo $incomeId ?>">
            <input type="submit" name="income-edit-button" class="income-edit-submit-button" value="&#xf304;">
          </form>
          <form class="income-delete-form" action="" method="post">
            <input type="hidden" name="income-delete-hidden-id" id="income-delete-hidden-id" value="<?php echo $incomeId ?>">
            <input type="submit" name="income-delete-button" class="income-delete-submit-button" value="&#xf00d;">
          </form>
        </div>
    </ul>
    <?php
  }
} else if(mysqli_num_rows($result) == 0){
  $resetAiQuery = "ALTER TABLE income AUTO_INCREMENT = 1";
  $resultAiQuery = mysqli_query($link, $resetAiQuery);
}
?>
<?php
if(isset($_POST["income-delete-button"])){
  $deleteId = $_POST["income-delete-hidden-id"];
  require("delete-income.php");
}
?>