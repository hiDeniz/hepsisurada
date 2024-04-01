<?php

include "config.php";

if(!empty($_POST['ids']))
{
    $cid = $_POST['ids'];
    $sql_statement = "DELETE FROM Categories WHERE cid = $cid";
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is " . $result;
}

?>