<?php

include "config.php";

if(!empty($_POST['ids']))
{
    $rid = $_POST['ids'];
    $parts = explode("-", $rid);
    $pid = (int) $parts[0];
    $uid = (int) $parts[1];
    $sql_statement = "DELETE FROM make_Reviews WHERE uid = $uid AND pid = $pid";
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is " . $result;
}

?>
