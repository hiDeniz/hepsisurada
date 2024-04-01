<?php

include "config.php";

if(!empty($_POST['ids']))
{
    $rid = $_POST['ids'];
    $parts = explode("-", $rid);
    $pid = (int) $parts[0];
    $pcid = (int) $parts[1];
    $sql_statement = "DELETE FROM imported_from WHERE pid = $pid AND pcid = $pcid";
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is " . $result;
}

?>
