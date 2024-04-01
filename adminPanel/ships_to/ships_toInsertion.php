<?php 

include "config.php"; 
if (!empty($_POST['aid']) && !empty($_POST['oid'])){ 

    $aid = $_POST['aid']; 
    $oid = $_POST['oid']; 
 

    $sql_statement = "INSERT INTO Ships_to ( aid , oid) VALUES ('$aid','$oid')"; 


    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
} 
else 
{
    echo "You did not enter one of the inputs!";
}

?>
