<?php
    $query = "DELETE FROM expense WHERE id = $deleteId";
    $delete = mysqli_query($link, $query);
?>