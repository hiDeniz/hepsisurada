<?php

include "config.php";

if(!empty($_POST['ids']))
{
    $uid = $_POST['ids'];
    $sql_statement = "DELETE FROM users WHERE uid = $uid";
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is " . $result;
}

?>