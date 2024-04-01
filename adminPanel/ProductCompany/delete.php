<?php

include "config.php";

if(!empty($_POST['ids']))
{
    $pcid = $_POST['ids'];
    $sql_statement = "DELETE FROM ProductCompany WHERE pcid = $pcid";
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is " . $result;
}

?>