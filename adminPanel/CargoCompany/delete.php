<?php

include "config.php";

if(!empty($_POST['ids']))
{
    $ccid = $_POST['ids'];
    $sql_statement = "DELETE FROM CargoCompany WHERE ccid = $ccid";
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is " . $result;
}

?>