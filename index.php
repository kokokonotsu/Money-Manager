<?php require("db_connect.php");?>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>To-Do Task List</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
      crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" media="screen" href="Assets/styles.css" />
</head>
<body class="grid-index">
  <div id="expense-modal" class="modal">
    <div class="modal-content">
      <h1>Add Expense Form</h1>
      <form action="" method="post">
        <input type="text" name="expenseTitle" id="expenseTitleInput">
        <input type="text-area" name="expenseDescription" id="expenseDescriptionInput">
        <input type="text" name="expenseTotal" id="expenseTotalInput">
        <input type="time" name="expenseTime" id="expenseTimeInput">
        <input type="date" name="expenseDate" id="expenseDateInput">
        <input type="submit" name="expense-submit" id="expense-submit-button">
      </form>
    </div>
  </div>
  <header>
    <h1>Money Manager</h1>
  </header>
<main class="main-container main-grid">
<input type="button" name="create-expense-modal-button" id="create-expense-modal-button" value="Add Expense">
<?php
//Call for Database Connection
db();
//Assign returned connection variable to global variable instance
global $link;
$query = "SELECT id, expenseTitle, expenseDescription, expenseTime, expenseDate, balanceAfterExpense FROM expense";
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
</main>
<main class="main-done">
<p>Tasks Completed</p>
<?php
  if(isset($_POST['cross-out-button'])){
    $query_complete_insert = "INSERT INTO complete (todoTitle, todoDescription, time, date) SELECT todoTitle, todoDescription, time, date FROM todo";
    $result_complete_insert = mysqli_query($link, $query_complete_insert);
  }
?>

<?php
  $query_complete_select = "SELECT id, todoTitle, todoDescription, time, date FROM complete";
  $result_complete_select = mysqli_query($link, $query_complete_select);
  if(mysqli_num_rows($result_complete_select) >= 1){
    while($row = mysqli_fetch_array($result_complete_select)){
      $id_complete =$row["id"];
      $title_complete = $row["todoTitle"];
      $time_complete = $row["time"];
      $date_complete = $row["date"];
      ?>
      <ul>
        <li>
        <a href="detail.php?id=<?php echo $id_complete?>" class="task-title"><?php echo "$title_complete "?></a>
        <span><?php echo "[ $time_complete ]" ?></span>
        <span><?php echo "[[ $date_complete ]]";?></span>
        </li>
      </ul>
    <?php
  }
}
?>
</main>
</body>
<script src="main.js"></script>
<script>
if(window.history.replaceState){
  window.history.replaceState(null, null, window.location.href);
}
</script>
</html>


