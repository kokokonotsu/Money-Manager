<?php
function db(){
    global $link;
    $link = mysqli_connect("localhost", "root", "", "money_manager");
    return $link;
}
if(db()){
    echo "Connection Successful";
} else {
    echo "Connection Unsuccessful";
}
?>