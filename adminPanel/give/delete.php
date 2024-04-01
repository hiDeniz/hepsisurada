<?php

include "config.php";

if(!empty($_POST['ids']))
{
    $rid = $_POST['ids'];
    $parts = explode("-", $rid);
    $oid = (int) $parts[0];
    $uid = (int) $parts[1];
    $sql_statement = "DELETE FROM give WHERE oid = $oid AND uid = $uid";
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is " . $result;
}

?>
