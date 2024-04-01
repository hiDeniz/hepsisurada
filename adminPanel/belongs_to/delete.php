<?php

include "config.php";

if(!empty($_POST['ids']))
{
    $rid = $_POST['ids'];
    $parts = explode("-", $rid);
    $pid = (int) $parts[0];
    $cid = (int) $parts[1];
    $sql_statement = "DELETE FROM belongs_to WHERE cid = $cid AND pid = $pid";
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is " . $result;
}

?>
