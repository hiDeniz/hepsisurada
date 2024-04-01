<?php

include "config.php";

if(!empty($_POST['ids']))
{
    $rid = $_POST['ids'];
    $parts = explode("-", $rid);
    $ccid = (int) $parts[0];
    $oid = (int) $parts[1];
    $sql_statement = "DELETE FROM Ships_with WHERE ccid = $ccid AND oid = $oid";
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is " . $result;
}

?>
