<?php 

include "config.php"; 
if (!empty($_POST['cid']) && !empty($_POST['pid'])){ 

    $cid = $_POST['cid']; 
    $pid = $_POST['pid']; 
 

    $sql_statement = "INSERT INTO belongs_to ( cid , pid) VALUES ('$cid','$pid')"; 


    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
} 
else 
{
    echo "You did not enter one of the inputs!";
}

?>
