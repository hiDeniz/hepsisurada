<?php 

include "config.php"; 
if (!empty($_POST['ccid']) && !empty($_POST['oid'])){ 

    $ccid = $_POST['ccid']; 
    $oid = $_POST['oid']; 
 

    $sql_statement = "INSERT INTO Ships_with ( ccid , oid) VALUES ('$ccid','$oid')"; 


    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
} 
else 
{
    echo "You did not enter one of the inputs!";
}

?>
