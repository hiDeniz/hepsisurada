<?php

include "config.php";

if(!empty($_POST['ids']))
{
    $oid = $_POST['ids'];
    $sql_statement = "DELETE FROM Orders WHERE oid = $oid ";
    $sql_statement2 = "DELETE FROM Ships_to WHERE oid = $oid";
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is " . $result;
}

?>
