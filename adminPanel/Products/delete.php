<?php

include "config.php";

if(!empty($_POST['ids']))
{
    $pid = $_POST['ids'];
    $sql_statement = "DELETE FROM Products WHERE pid = $pid";
    $sql_statement2 = "DELETE FROM imported_from WHERE pid = $pid";
    $sql_statement3 = "DELETE FROM belongs_to WHERE pid = $pid";
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is " . $result;
}

?>