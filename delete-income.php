<?php
    $query = "DELETE FROM income WHERE id = $deleteId";
    $delete = mysqli_query($link, $query);
?>