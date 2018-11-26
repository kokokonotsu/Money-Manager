<?php
function db(){
    global $link;
    $link = mysqli_connect("localhost", "root", "", "money_manager");
    return link;
}
if(db()){
    print "Connection Successful";
} else {
    print "Connection Unsuccessful";
}
?>